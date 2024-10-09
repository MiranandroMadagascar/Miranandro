<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>S'Inscrire</title>
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
              </div>
              <h3>Inscription</h3>
              <h6 class="font-weight-light">Fiche d' adhésion</h6>
              <form class="forms-sample" method="POST" action="{{ route('auth.inscription') }}">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nom(s)</label>
                      <input type="text" name="nom" class="form-control" />
                      @error('nom')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Prénoms</label>
                      <input type="text" name="prenoms" class="form-control" />
                      @error('prenoms')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date de naissance</label>
                      <input type="date" name="dtn" class="form-control"/>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Genre</label>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" name="genre" class="form-check-input"  id="genre" value="" checked>
                            Homme
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" name="genre" class="form-check-input"  id="genre" value="">
                            Femme
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <h4>Contact</h4>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Téléphone</label>
                      <input type="tel" name="contact" class="form-control" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Adresse</label>
                      <input type="text" name="adresse" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" />
                      @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Mot de passe</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                          @error('password')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Confirmation</label>
                          <input type="password" name="password_confirmation" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6">
                      <p class="mb-2">Exigences pour le mot de passe</p>
                      <p class="small text-muted mb-2"> Pour créer un nouveau mot de passe, vous devez respecter toutes les exigences suivantes : </p>
                      <ul class="small text-muted pl-4 mb-0">
                          <li>Minimum 8 caractères</li>
                          <li>Au moins un caractère spécial</li>
                          <li>Au moins un chiffre</li>
                          <li>Ne peut pas être identique à un mot de passe précédent</li>
                      </ul>
                    </div>
                </div>

                <h4>Section : </h4>
                <div class="row">
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="section" class="form-check-input" id="section">
                          Social
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="section" class="form-check-input" id="section">
                          Social
                        </label>
                      </div>
                    </div>
                </div>

                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked id="accord">
                      Je déclare d'adhérer aux statut de l'Association MIRANANDRO(MADAGASCAR), m'engage à respecter le règlement et à payer la cotisation annuelle
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.html">S'Inscrire</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Vous avez déjà une compte ? <a href="{{ route('login.equipe') }}" class="text-primary">Connexion</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  <script src="{{ asset('js/todolist.js') }}"></script>
</body>

</html>
