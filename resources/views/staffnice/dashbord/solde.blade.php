@extends('layout.director')
@section('title', 'Solde')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Suivi Budgétaire</h3>
                    <h6 class="font-weight-normal mb-0"> 
                        <span class="text-primary">Solde actuel, budget total, total des dépenses, total des revenus</span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Solde Actuel</p>
                            <p class="fs-30 mb-2">{{ number_format($budgetGlobal->solde_actuel, 2, '.', ',') }} AR</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total des dépenses</p>
                            <p class="fs-30 mb-2">{{ number_format($budgetGlobal->total_depenses, 2, '.', ',') }} AR</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Total des revenus</p>
                            <p class="fs-30 mb-2">{{ number_format($budgetGlobal->total_revenus, 2, '.', ',') }} AR</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
