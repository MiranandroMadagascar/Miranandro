<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Default Title')</title>

  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.min.css') }}">
  
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.min.css') }}"> -->
  
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
  @yield('head')
</head>
@yield('css')
<body>
  
  <div class="container-scroller">

    <!-- navbar haut -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset('images/logo.png') }}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logomini.png') }}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('images/faces/faceM.png') }}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ route('deconnexionstaffmada') }}">
                <i class="ti-power-off text-primary"></i>
                Déconnexion
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">

      <!-- navbar menu côté -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashbord.accueil') }}">
              <i class="icon-sun menu-icon"></i>
              <span class="menu-title">Accueil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Activités</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('activite.formulaire') }}">Nouvelle Activité</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('activites.incomplet') }}">Sans Fiche</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('activite.enAttente') }}">En Attente</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('activite.calendrier') }}">Calendrier</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('activite.refusees') }}">Refusées</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Membres</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('membres.adherents') }}">Membres adhérents</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('membres.parents') }}">Membres Parents</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('membres.enfants') }}">Membres Enfants</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-tag menu-icon"></i>
              <span class="menu-title">Cotisation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('cotisation.index') }}">Mise à jour</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('cotisations.retard') }}">En retard</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('activites.proches') }}">
              <i class="icon-bag menu-icon"></i>
              <span class="menu-title">Dépenses</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Caisse</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('caisse.index') }}">Entrée en caisse</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('dashbord.historiqueCaisse') }}">Cumul en caisse</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Présence</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('presence') }}">Présence</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('presence.suivi') }}">Suivi de présence</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#log" aria-expanded="false" aria-controls="log">
              <i class="icon-anchor menu-icon"></i>
              <span class="menu-title">Logistique</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="log">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('logistique.formulaire') }}"> Logistique </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('mouvement.afficher') }}"> Mouvement </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('dashbord.suiviLogistique') }}"> Suivi </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-archive menu-icon"></i>
              <span class="menu-title">Rapport Réunion</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('reunion.index') }}"> Faire Rapport </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('reunion.archive') }}"> Archive </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tableau de Bord</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.solde') }}">Suivi Budgétaire</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('depenses.comparaison') }}">Dépenses/Activités</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dash" aria-expanded="false" aria-controls="dash">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Graphique Financière</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dash">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('dashbord.revenusMensuels') }}">Revenu Mensuel</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('depenses.par.categorie') }}">Secteur de Dépense</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('depenses.mensuelles') }}">Dépense Mensuel</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#delete" aria-expanded="false" aria-controls="delete">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Facture</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="delete">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('factures.piecesComptables') }}">Pièces comptables</a></li>
            </ul>
          </div>
         </li>

        </ul>
      </nav>


      <div class="main-panel">

        <!--Corps de l'application  --> 
        @yield('content')

        <!-- footer -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.</span>
          </div>
        </footer> 

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
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Fermer tous les menus déroulants au chargement de la page
      const dropdowns = document.querySelectorAll('.collapse');
      dropdowns.forEach(dropdown => {
        dropdown.classList.remove('show');
      });
    });
  </script>
  @stack('scripts')
</body>

</html>

