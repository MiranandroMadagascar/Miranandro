<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Se Connecter</title>
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
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
              </div>
              <h4>Staff Madagascar</h4>
              <h6 class="font-weight-light">Connectez-vous por continuer.</h6>
              <form class="pt-3" method="POST" action="{{ route('authentification.staffmada') }}" >
                @csrf

                @if(Session::has('success'))
                <div id="successMessage" class="form-group">
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                </div>
                @endif

                @if ($errors->any())
                <div id="errorMessage" class="form-group">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                </div>
                @endif

                
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="example@mail.com">
                </div>
                <div class="form-group">
                  <input type="password" name="mdp" class="form-control form-control-lg" id="mdp" placeholder="Mot de Passe">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Se Connecter</button>
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
