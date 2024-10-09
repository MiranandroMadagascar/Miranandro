<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateRoles extends Command
{
    protected $signature = 'roles:create';
    protected $description = 'Créer les rôles prédéfinis';

    public function handle()
    {
        // Créer les rôles
        Role::create(['name' => 'president']);
        Role::create(['name' => 'vice_president']);
        Role::create(['name' => 'tresorier']);
        Role::create(['name' => 'tresorier_adjoint']);
        Role::create(['name' => 'secretaire']);
        Role::create(['name' => 'secretaire_adjointe']);
        Role::create(['name' => 'conseiller']);
        Role::create(['name' => 'connseiller_adjoint']);

        $this->info('Rôles créés avec succès !');
    }
}
