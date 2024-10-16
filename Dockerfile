# Utiliser l'image officielle de PHP comme base
FROM php:8.1-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql

# Définir le répertoire de travail
WORKDIR /var/www

# Copier les fichiers de l'application dans le conteneur
COPY . .

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP de Laravel
RUN composer install --optimize-autoloader --no-dev

# Ajouter cette ligne à ton Dockerfile
EXPOSE 80

# Commande à exécuter lorsque le conteneur démarre
CMD ["php-fpm"]
