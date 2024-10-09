<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Default Title')</title>

  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

  <link rel="stylesheet" href="{{ asset('css/horizontal-layout-light/style.min.css') }}">

  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

  @yield('head')
</head>
@yield('css')
<body>
  <div class="container-scroller">
    <!-- Navbar horizontale -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset('images/logo.png') }}" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logomini.png') }}" alt="logo" /></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <!-- Menu principal -->
        <ul class="navbar-nav mr-auto">
          <!-- Accueil -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashbord.director.accueil') }}">Accueil</a>
          </li>
          <!-- Activités -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="activitesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Activités
            </a>
            <div class="dropdown-menu" aria-labelledby="activitesDropdown">
              <a class="dropdown-item" href="{{ route('activite.validation') }}">En Attente</a>
            </div>
          </li>
          <!-- Calendrier -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('activite.director.calendrier') }}">Calendrier</a>
          </li>
          <!-- Graphiques Financiers -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="financeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Graphiques Financiers
            </a>
            <div class="dropdown-menu" aria-labelledby="financeDropdown">
              <a class="dropdown-item" href="{{ route('dashbord.director.revenusMensuels') }}">Revenus Mensuels</a>
              <a class="dropdown-item" href="{{ route('depenses.director.categorie') }}">Catégories de Dépenses</a>
              <a class="dropdown-item" href="{{ route('depenses.director.mensuelles') }}">Dépenses Mensuelles</a>
            </div>
          </li>
          <!-- Tableau de bord -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="tableauDeBordDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tableau de Bord
            </a>
            <div class="dropdown-menu" aria-labelledby="tableauDeBordDropdown">
              <a class="dropdown-item" href="{{ route('dashboard.director.solde') }}">Solde</a>
              <a class="dropdown-item" href="{{ route('depenses.director.comparaison') }}">Dépenses/Activités</a>
            </div>
          </li>
          <!-- Logistique -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashbord.director.suiviLogistique') }}">Logistique</a>
          </li>
          <!-- Caisse -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashbord.director.historiqueCaisse') }}">Caisse</a>
          </li>
        </ul>
        
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('images/faces/faceM.png') }}" alt="profile" class="profile-image"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
              <a class="dropdown-item"  href="{{ route('deconnexionstaffnice') }}">
                <i class="ti-power-off text-primary"></i>
                Déconnexion
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        </nav>

      <div class="main-panel">

        @yield('content')
        

        <!-- Footer -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. MIRANANDRO. Tous droits réservés.</span>
          </div>
        </footer>
        <!-- Fin du footer -->

      </div>
    </div>
  </div>



  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('vendors/js/vendor.bundle.base.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/off-canvas.min.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.min.js') }}"></script>
  <script src="{{ asset('js/template.min.js') }}"></script>
  <script src="{{ asset('js/settings.min.js') }}"></script>
  <script src="{{ asset('js/todolist.min.js') }}"></script>
  <script src="{{ asset('js/dashboard.min.js') }}"></script>
  <script src="{{ asset('js/Chart.roundedBarCharts.min.js') }}"></script>
  @stack('scripts')
  
</body>

</html>
