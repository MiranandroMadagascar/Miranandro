@extends('layout.director')
@section('title', 'Accueil')

@section('content') 
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenue à bord de l'application de MIRANANDRO</h3>
                  <h6 class="font-weight-normal mb-0"> <span class="text-primary">Explorer les fonctionnalités pour une gestion efficace et une coordination optimale</span></h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="{{ asset('images/dashboard/membres.jpg') }}" alt="people"><!--remplacena amn sarin'ny miranandro -->
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><sup></sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Vive MIRANANDRO!!!</h4>
                        <h6 class="font-weight-normal"></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Nombres total des membres enfants</p>
                        <p class="fs-30 mb-2">{{ $totauxMembres->total_membres_enfants }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Nombres total des membres adhérents</p>
                        <p class="fs-30 mb-2">{{ $totauxMembres->total_membres_adherents }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Membres parents/tuteurs</p>
                        <p class="fs-30 mb-2">{{ $totauxMembres->membres_parents_tuteurs }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Total des nouveaux inscrits ce mois-ci</p>
                        <p class="fs-30 mb-2">{{ $totauxMembres->total_nouveaux_inscrits_ce_mois_ci }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
