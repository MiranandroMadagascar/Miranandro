<?php

use App\Http\Controllers\Activite\ActiviteController;
use App\Http\Controllers\Activite\FicheTechniqueController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Caisse\CaisseController;
use App\Http\Controllers\Cotisation\CotisationController;
use App\Http\Controllers\Dasbord\DashbordController;
use App\Http\Controllers\Depense\DepenseController;
use App\Http\Controllers\Depense\DepensePrevisionnelController;
use App\Http\Controllers\Facture\FactureController;
use App\Http\Controllers\Import\ImportControlleur;
use App\Http\Controllers\Logistique\LogistiqueController;
use App\Http\Controllers\Membre\MembreAdherentController;
use App\Http\Controllers\Membre\MembreEnfantController;
use App\Http\Controllers\Membre\MembreParentController;
use App\Http\Controllers\Presence\PresenceController;
use App\Http\Controllers\Reunion\ReunionController;
use App\Models\Membres\MembresParents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication Routes
Route::get('/', [LoginController::class, 'showLoginFormStaff'])->name('login.staffmada');
Route::post('/staffmada/login', [LoginController::class, 'loginStaffMadagascar'])->name('authentification.staffmada');

Route::get('/staffnice/login/L54682tbjhdegfexds85164584', [LoginController::class, 'showLoginFormStaffnice'])->name('login.staffnice');
Route::post('/staffnice/login', [LoginController::class, 'loginStaffNice'])->name('authentification.staffnice');

Route::get('/logoutstaffnice', [LoginController::class, 'logoutstaffnice'])->name('deconnexionstaffnice');
Route::get('/logoutstaffmada', [LoginController::class, 'logoutstaffmada'])->name('deconnexionstaffmada');


// Routes for Staff Madagascar
Route::middleware(['auth:staffmada'])->group(function () {
    Route::get('/staffmada/accueil', [DashbordController::class, 'accueil'])->name('dashbord.accueil');
    
    Route::get('/staffmada/activite', [ActiviteController::class, 'afficherFormulaireActivite'])->name('activite.formulaire');
    Route::post('/staffmada/activite/insertion', [ActiviteController::class, 'insererActivite'])->name('activite.inserer');
    Route::get('/staffmada/activites/refusees', [ActiviteController::class, 'activitesRefusees'])->name('activite.refusees');
    Route::get('/staffmada/activite/{id}/details', [ActiviteController::class, 'detailsActiviteRefusee'])->name('activite.details');
    Route::get('/staffmada/activite/reaccepter/{id}', [ActiviteController::class, 'reAccepter'])->name('activite.reAccepter');

    Route::get('/staffmada/depense/{id_activite}/create', [DepenseController::class, 'create'])->name('depense.create');
    Route::post('/staffmada/depense/{id_activite}/store', [DepenseController::class, 'store'])->name('depense.store');

    Route::get('/staffmada/activites/incomplet', [ActiviteController::class, 'incomplet'])->name('activites.incomplet');
    Route::get('/staffmada/activites/incomplet/{id}/edit', [ActiviteController::class, 'edit'])->name('activites.incomplet.edit');
    Route::put('/staffmada/activites/incomplet/{id}', [ActiviteController::class, 'update'])->name('activites.incomplet.update');
    Route::post('/staffmada/activites/incomplet/ficheTechnique/inserer', [ActiviteController::class, 'insererFicheTechnique'])->name('ficheTechnique.inserer');

    Route::get('/staffmada/fiche-technique/{id_activite}', [FicheTechniqueController::class, 'afficherFormulaireFiche'])->name('fiche_technique.formulaire');
    Route::post('/staffmada/fiche-technique/{id_activite}/insertion', [FicheTechniqueController::class, 'insererFicheTechnique'])->name('fiche_technique.inserer');

    Route::get('/staffmada/depensePrevisonnelle/{id_fiche_technique}', [DepensePrevisionnelController::class, 'afficherFormulaireDepenses'])->name('depensesPrevisionnels.formulaire');
    Route::post('/staffmada/depensePrevisonnelle/{id_fiche_technique}/insertion', [DepensePrevisionnelController::class, 'insererDepensesPrevisionnelles'])->name('depensesPrevisionnels.inserer');
   
    Route::get('/staffmada/membres-adherents', [MembreAdherentController::class, 'afficherMembresAdherents'])->name('membres.adherents');
    Route::put('/staffmada/membres-adherents/modifer/{id}', [MembreAdherentController::class, 'update'])->name('membres.update');
    Route::get('/staffmada/membres-adherents/membre/nouveau', [MembreAdherentController::class, 'create'])->name('membre.create');
    Route::post('/staffmada/membres-adherents/nouveau', [MembreAdherentController::class, 'store'])->name('auth.inscription');

    Route::get('/staffmada/membres-enfants', [MembreEnfantController::class, 'afficherMembresEnfants'])->name('membres.enfants');
    Route::post('/staffmada/membres-enfants/nouveau', [MembreParentController::class, 'insertEnfant'])->name('membres.enfants.nouveau');
    Route::put('/staffmada/membres-enfants/{id}', [MembreEnfantController::class, 'updateEnfant'])->name('membres.enfants.update');
    Route::get('/staffmada/membres-beneficiaire', [MembreEnfantController::class, 'membreBeneficiaire'])->name('membres.beneficiaires');
    Route::post('/staffmada/membres-beneficiaire/nouveau', [MembreEnfantController::class, 'insertEnfant'])->name('membres.beneficiaires.nouveau');
    Route::get('/staffmada/membres-parents', [MembreParentController::class, 'afficherMembresParents'])->name('membres.parents');
    Route::get('/staffmada/parents/search', [CotisationController::class, 'rechercherParent'])->name('parents.search');
    Route::get('/staffmada/membres/search', [CotisationController::class, 'rechercherMembre'])->name('membres.search');
    
    Route::get('/staffmada/membres-enfants/examens-reussis', [MembreEnfantController::class, 'examensReussis'])->name('membres_enfants.examens_reussis');

    Route::get('/staffmada/cotisation', [CotisationController::class, 'index'])->name('cotisation.index');
    Route::put('/staffmada/cotisation/{id}', [CotisationController::class, 'update'])->name('cotisation.update');
    
    Route::get('/staffmada/cotisations/retard', [CotisationController::class, 'cotisationsEnRetard'])->name('cotisations.retard');
    Route::post('/staffmada/cotisations/paiement-retard', [CotisationController::class, 'payerCotisation'])->name('paiement.cotisation');
    
    Route::get('/staffmada/caisse', [CaisseController::class, 'index'])->name('caisse.index');
    Route::post('/staffmada/caisse/entree', [CaisseController::class, 'inserer'])->name('caisse.inserer');

    Route::get('/staffmada/presence', [PresenceController::class, 'index'])->name('presence');
    Route::get('/staffmada/pointage/activite/{id_activite}', [PresenceController::class, 'pointage'])->name('presence.pointage');
    Route::post('/staffmada/pointage/activite/{id_activite}/enregistrer', [PresenceController::class, 'enregistrerPresence'])->name('presence.enregistrer');
    Route::get('/staffmada/presence/filtrer/{activite}/{section}', [PresenceController::class, 'filtrerParSection'])->name('presence.filtrer');
    Route::get('/staffmada/presence/suivi', [PresenceController::class, 'suivi'])->name('presence.suivi');
    Route::get('/staffmada/presence/{id}/fiche', [PresenceController::class, 'show'])->name('presence.show');
    Route::get('/staffmada/presence/{id}/fiche', [PresenceController::class, 'show'])->name('presence.show');

    Route::get('/staffmada/reunions', [ReunionController::class, 'index'])->name('reunion.index');
    Route::get('/staffmada/reunion/rapport/{id_activite}', [ReunionController::class, 'creerRapport'])->name('reunion.rapport');
    Route::post('/staffmada/reunion/soumettreRapport/{id_activite}', [ReunionController::class, 'soumettreRapport'])->name('reunion.soumettreRapport');

    Route::get('/staffmada/archive', [ReunionController::class, 'archive'])->name('reunion.archive');
    Route::get('/staffmada/archive/{id_activite}', [ReunionController::class, 'afficherRapport'])->name('reunion.afficherRapport');
    Route::get('/staffmada/archive/{id}/export-pdf', [ReunionController::class, 'exportPdf'])->name('rapports.export.pdf');

    Route::get('/staffmada/logistique', [LogistiqueController::class, 'afficherFormulaire'])->name('logistique.formulaire');
    Route::post('/staffmada/logistique/inserer', [LogistiqueController::class, 'insererLogistique'])->name('logistique.inserer');
    Route::get('/staffmada/logistique/mouvement', [LogistiqueController::class, 'afficherMouvement'])->name('mouvement.afficher');
    Route::post('/staffmada/logistique/mouvement/inserer', [LogistiqueController::class, 'insererMouvement'])->name('mouvement.inserer');

    Route::get('/staffmada/activite/enattente', [ActiviteController::class, 'enAttente'])->name('activite.enAttente');
    Route::get('/staffmada/activite/enattente/detail/{id_activite}', [ActiviteController::class, 'afficherDetailActivite'])->name('activite.detail');
    Route::post('/staffmada/activite/modifier/{id}', [ActiviteController::class, 'modifierActivite'])->name('activite.modifier');

    Route::get('/activite/enattente/{id}/valider', [ActiviteController::class, 'valider1'])->name('activite.valider');
    Route::post('/activite/enattente/{id}/refuser', [ActiviteController::class, 'refuser1'])->name('activite.refuser');
    Route::get('/staffmada/export2-fiche-technique/{id}', [ActiviteController::class, 'exportFicheTechniquePDF2'])->name('activite.export.pdf2');

    Route::get('/staffmada/activites/calendrier', [ActiviteController::class, 'calendrier'])->name('activite.calendrier');
    Route::get('/staffmada/activites/calendrier/details/{id_activite}', [ActiviteController::class, 'details'])->name('activite.calendrier.details');
    Route::get('/staffmada/activites/calendrier/details/export/{id_activite}', [ActiviteController::class, 'exportdetail'])->name('activite.export.pdf');

    Route::get('/staffmada/activites/proches', [ActiviteController::class, 'activitesProches'])->name('activites.proches');
    Route::post('/staffmada/activite/{id_activite}/ajouter-piece-jointe', [ActiviteController::class, 'ajouterPieceJointe'])->name('activite.ajouterPieceJointe');

    Route::get('/staffmada/facture/create/{id_activite}', [FactureController::class, 'create'])->name('facture.create');
    Route::post('/staffmada/facture/store', [FactureController::class, 'store'])->name('facture.store');
    Route::get('/staffmada/facture/{id}', [FactureController::class, 'show'])->name('facture.show');
    Route::get('/staffmada/facture/{factureId}/export-pdf', [FactureController::class, 'exportFacturePDF'])->name('facture.export');
    Route::get('/staffmada/factures/pieces-comptables', [FactureController::class, 'pieceComptable'])->name('factures.piecesComptables');
    Route::get('/staffmada/factures/activite/{id_activite}', [FactureController::class, 'facturesParActivite'])->name('factures.activite');

    Route::get('/staffmada/dashboard/solde', [DashbordController::class, 'solde'])->name('dashboard.solde');
    Route::get('/staffmada/dashbord/comparaison-depenses', [DashbordController::class, 'comparaisonDepenses'])->name('depenses.comparaison');
    Route::get('/staffmada/depenses/details/{id}', [DashbordController::class, 'detailsDepenses'])->name('depenses.details');
    Route::get('/staffmada/dashbord/historique-caisse', [DashbordController::class, 'historiqueCaisse'])->name('dashbord.historiqueCaisse');
    Route::get('/staffmada/dashbord/revenus-mensuels', [DashbordController::class, 'revenusMensuels'])->name('dashbord.revenusMensuels');
    Route::get('/staffmada/dashboard/categorie-depenses', [DashbordController::class, 'depensesParCategorie'])->name('depenses.par.categorie');
    Route::get('/staffmada/dashboard/depenses-mensuelles', [DashbordController::class, 'depensesMensuelles'])->name('depenses.mensuelles');
    Route::get('/staffmada/dashbord/suivi-logistique', [DashbordController::class, 'suiviLogistique'])->name('dashbord.suiviLogistique');


    Route::get('/staffmada/import/membres', [ImportControlleur::class, 'showImportForm'])->name('import.membres');
});


// Routes for Staff Nice
Route::middleware(['auth.staffnice'])->group(function () {
    Route::get('/staffnice/accueil', [DashbordController::class, 'accueilDirector'])->name('dashbord.director.accueil');
    
    Route::get('/staffnice/activite/validation', [ActiviteController::class, 'validationDirector'])->name('activite.validation');
    Route::get('/staffnice/activite/validation/fiche/{id_activite}', [ActiviteController::class, 'ficheDirector'])->name('activite.fiche');
    Route::get('/staffnice/activite/validation/{id}', [ActiviteController::class, 'validerDirector'])->name('activite.valider2');
    Route::post('/staffnice/activite/validation/{id}/refuser', [ActiviteController::class, 'refuserDiretcor'])->name('activite.refuser2');
    Route::get('/staffnice/exportation-fiche-technique/{id}', [ActiviteController::class, 'exportFicheTechniquePDFDirector'])->name('activite.export.pdf3');

    Route::get('/staffnice/dashboard/solde', [DashbordController::class, 'soldeDirector'])->name('dashboard.director.solde');
    Route::get('/staffnice/dashbord/comparaison-depenses', [DashbordController::class, 'comparaisonDepensesDirector'])->name('depenses.director.comparaison');
    Route::get('/staffnice/depenses/details/{id}', [DashbordController::class, 'detailsDepensesDirector'])->name('depenses.director.details');
    Route::get('/staffnice/dashbord/historique-caisse', [DashbordController::class, 'historiqueCaisseDirector'])->name('dashbord.director.historiqueCaisse');
    Route::get('/staffnice/dashbord/revenus-mensuels', [DashbordController::class, 'revenusMensuelsDirector'])->name('dashbord.director.revenusMensuels');
    Route::get('/staffnice/dashboard/categorie-depenses', [DashbordController::class, 'depensesParCategorieDirector'])->name('depenses.director.categorie');
    Route::get('/staffnice/dashboard/depenses-mensuelles', [DashbordController::class, 'depensesMensuellesDirector'])->name('depenses.director.mensuelles');
    Route::get('/staffnice/dashbord/suivi-logistique', [DashbordController::class, 'suiviLogistiqueDirector'])->name('dashbord.director.suiviLogistique');

    Route::get('/staffnice/activites/calendrier', [ActiviteController::class, 'calendrierDirector'])->name('activite.director.calendrier');
    Route::get('/staffnice/activites/calendrier/details/{id_activite}', [ActiviteController::class, 'detailsDirector'])->name('activite.calendrier.director.details');
    Route::get('/staffnice/activites/calendrier/details/export/{id_activite}', [ActiviteController::class, 'exportdetailDirector'])->name('activite.director.export.pdf');

});

// Routes for Membres
Route::middleware(['auth.membre'])->group(function () {

});

