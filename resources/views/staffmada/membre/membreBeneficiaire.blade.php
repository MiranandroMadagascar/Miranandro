@extends('layout.admin')
@section('title', 'Nouveaux membres Bénéficiaires')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fiche d'adhésion des AMIS (Ankizin'ny MIRANANDRO) et des Parents</h4>
                    
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-sample" action="{{ route('membres.beneficiaires.nouveau') }}" method="POST">
                    @csrf <!-- Pour la sécurité CSRF -->

                        <!-- Informations Personnelles de l'Enfant -->
                        <p class="card-description">Informations Personnelles</p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Noms(s)</label>
                                    <input type="text" name="nom" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Prénom(s)</label>
                                    <input type="text" name="prenoms" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date de Naissance</label>
                                    <input type="date" name="date_naissance" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                <label class="col-sm-8">Genre</label>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_enfant" class="form-check-input"  id="genre_enfant" value="H" checked>
                                        Homme
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_enfant" class="form-check-input"  id="genre_enfant" value="F">
                                        Femme
                                      </label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <!-- Scolarité -->
                        <p class="card-description">Scolarité</p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Ecole</label>
                                    <input type="text" name="ecole" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Classe</label>
                                    <select name="classe" class="form-control">
                                        <option value="Terminale">Terminale</option>
                                        <option value="Seconde">Seconde</option>
                                        <option value="Première">Première</option>
                                        <option value="3eme">3eme</option>
                                        <option value="4eme">4eme</option>
                                        <option value="5eme">5eme</option>
                                        <option value="6eme">6eme</option>
                                        <option value="7eme">7eme</option>
                                        <option value="8eme">8eme</option>
                                        <option value="9eme">9eme</option>
                                        <option value="10eme">10eme</option>
                                        <option value="11eme">11eme</option>
                                        <option value="12eme">12eme</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Année-Scolaire</label>
                                    <input type="text" name="annee_scolaire" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="tel" name="contact" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fratrie</label>
                                    <input type="number" name="fratrie" class="form-control" />
                                </div>
                            </div>
                        </div>


                        <!-- Informations des Parents -->
                        <p class="card-description">Informations des Parents</p>

                        <!-- Informations du Père -->
                        <h5>Père</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom_pere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Prénom(s)</label>
                                    <input type="text" name="prenoms_pere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date de Naissance</label>
                                    <input type="date" name="date_naissance_pere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                <label class="col-sm-8">Genre</label>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_pere" class="form-check-input"  id="genre_pere" value="H" checked>
                                        Homme
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_pere" class="form-check-input"  id="genre_pere" value="F">
                                        Femme
                                      </label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Profession</label>
                                    <input type="text" name="profession_pere" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="tel" name="contact_pere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse_pere" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <!-- Informations de la Mère -->
                        <h5>Mère</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom_mere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Prénom(s)</label>
                                    <input type="text" name="prenoms_mere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date de Naissance</label>
                                    <input type="date" name="date_naissance_mere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                <label class="col-sm-8">Genre</label>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_mere" class="form-check-input"  id="genre_mere" value="H" checked>
                                        Homme
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_mere" class="form-check-input"  id="genre_mere" value="F">
                                        Femme
                                      </label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Profession</label>
                                    <input type="text" name="profession_mere" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="tel" name="contact_mere" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse_mere" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <!-- Informations du Tuteur -->
                        <h5>Tuteur</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom_tuteur" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Prénom(s)</label>
                                    <input type="text" name="prenoms_tuteur" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date de Naissance</label>
                                    <input type="date" name="date_naissance_tuteur" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                <label class="col-sm-8">Genre</label>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_tuteur" class="form-check-input"  id="genre_tuteur" value="H" checked>
                                        Homme
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" name="genre_tuteur" class="form-check-input"  id="genre_tuteur" value="F">
                                        Femme
                                      </label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Profession</label>
                                    <input type="text" name="profession_tuteur" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="tel" name="contact_tuteur" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse_tuteur" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <button type="submit" class="btn btn-primary">Valider</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Fonction pour masquer les messages après 5 secondes (5000 millisecondes)
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successAlerts = document.querySelectorAll('.alert-success');
            var errorAlerts = document.querySelectorAll('.alert-danger');
            
            successAlerts.forEach(function(alert) {
                alert.style.display = 'none';
            });

            errorAlerts.forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 5000);
    });
</script>
@endpush