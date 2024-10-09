@extends('layout.admin')
@section('title', 'Nouveau Membre')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-12 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ asset('images/logo.png') }}" alt="logo">
                        </div>
                        <h4>Inscription</h4>
                        <h6 class="font-weight-light">Fiche d'adhésion</h6>
                        <form class="forms-sample" method="POST" action="{{ route('auth.inscription') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom(s)</label>
                                        <input type="text" name="nom" class="form-control" required />
                                        @error('nom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prénoms</label>
                                        <input type="text" name="prenoms" class="form-control" required />
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
                                        <input type="date" name="dtn" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Genre</label>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" name="genre" class="form-check-input" id="genreHomme" value="Homme" checked>
                                                    Homme
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" name="genre" class="form-check-input" id="genreFemme" value="Femme">
                                                    Femme
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">Contact</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input type="tel" name="contact" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input type="text" name="adresse" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">Section :</p>
                            <div class="row">
                                @foreach($sections as $section)
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="section" class="form-check-input" id="section{{ $section->id_section }}" value="{{ $section->id_section }}">
                                                {{ $section->nom_section }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked id="accord">
                                        Je déclare d'adhérer aux statuts de l'Association MIRANANDRO (MADAGASCAR), m'engage à respecter le règlement et à payer la cotisation annuelle.
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">S'Inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
