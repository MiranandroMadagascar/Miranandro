<?php

namespace App\Http\Controllers\Activite;

use App\Http\Controllers\Controller;
use App\Models\Activites\Activite;
use App\Models\Activites\ActiviteValide;
use App\Models\Activites\FicheTechnique;
use App\Models\Activites\TypeActivite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class ActiviteController extends Controller
{
    public function afficherFormulaireActivite()
    {
        $typesActivites = TypeActivite::listeTypeActivite();

        return view('staffmada.activite.activite', compact('typesActivites'));
    }


    public function insererActivite(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'id_type_activite' => 'required|exists:type_activite,id_type_activite',
            'date_activite' => 'required|date',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'lieu' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'titre',
            'id_type_activite',
            'date_activite',
            'heure_debut',
            'heure_fin',
            'lieu',
        ]);

        $data['id_section'] = Session::get('id_section');

        $activite = Activite::insertActivite($data);

        if ($request->has('ajouter_fiche_technique')) {
            return redirect()->route('fiche_technique.formulaire', ['id_activite' => $activite->id_activite])
                            ->with('success', 'Activité créée, veuillez ajouter une fiche technique.');
        }

        return redirect()->route('activite.formulaire')->with('success', 'Activité créée avec succès.');
    }

    ////
    public function incomplet()
    {
        $activitesSansFiche = Activite::activitesSansFiche();
        $typesActivites = TypeActivite::all();

        $id_activite = null; 

        return view('staffmada.activite.incomplet', compact('activitesSansFiche','typesActivites','id_activite'));
    }

    public function edit($id)
    {
        $activite = Activite::activiteParId($id);
        return response()->json($activite);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'id_type_activite' => 'required|integer',
            'date_activite' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'lieu' => 'required|string|max:255',
        ]);

        $activite = Activite::updateActiviteParId($id, $data);
        return response()->json($activite);
    }

    public function insererFicheTechnique(Request $request)
    {
        $validatedData = $request->validate([
            'id_activite' => 'required|integer',
            'objectif' => 'required|string',
            'methodologie' => 'required|string',
            'participants' => 'required|string',
            'justifications' => 'required|string',
        ]);

        $ficheTechnique = FicheTechnique::insererFicheTechnique($validatedData);

        return redirect()->route('depensesPrevisionnels.formulaire', ['id_fiche_technique' => $ficheTechnique->id_fiche_technique])
                        ->with('success', 'Fiche technique ajoutée, veuillez ajouter des dépenses prévisionnelles.');
    }

    ////
    public function enAttente()
    {
        $activites = ActiviteValide::getActivitesValidation1();

        return view('staffmada.activite.enattente', compact('activites'));
    }

    public function afficherDetailActivite($id)
    {
        $activite = DB::table('vue_activites_validation_1_details')
            ->where('id_activite', $id)
            ->select(
                'id_activite',
                'titre_activite',
                'type_activite',
                'nom_section',
                'date_activite',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'statut_activite',
                'objectif',
                'methodologie',
                'participants',
                'justifications',
                DB::raw('SUM(montant_total_depense) as budget_previsionnel_total')
            )
            ->groupBy(
                'id_activite',
                'titre_activite',
                'type_activite',
                'date_activite',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'statut_activite',
                'objectif',
                'methodologie',
                'participants',
                'nom_section',
                'justifications'
            )
            ->first();

        $depenses = DB::table('vue_activites_validation_1_details')
            ->where('id_activite', $id)
            ->select(
                'designation_depense',
                'quantite_depense',
                'prix_unitaire_depense',
                'montant_total_depense'
            )
            ->get();

        $activite->depenses = $depenses;

        return view('staffmada.activite.detail', compact('activite'));
    }

    public function modifierActivite(Request $request, $id)
    {
        $request->validate([
            'objectif' => 'required|string',
            'methodologie' => 'required|string',
            'participants' => 'required|string',
            'depenses.*.designation' => 'required|string',
            'depenses.*.prix_unitaire' => 'required|numeric',
            'depenses.*.quantite' => 'required|integer',
        ]);

        DB::table('fiche_technique')
            ->where('id_activite', $id)
            ->update([
                'objectif' => $request->input('objectif'),
                'methodologie' => $request->input('methodologie'),
                'participants' => $request->input('participants'),
                'justifications' => $request->input('justifications') 
            ]);

        // Mettre à jour les dépenses
        foreach ($request->input('depenses') as $depense) {
            DB::table('depenses_previsionnel')
                ->where('id_depense', $depense['id_depense']) // Assurez-vous d'avoir l'ID de la dépense
                ->update([
                    'designation' => $depense['designation'],
                    'quantite' => $depense['quantite'],
                    'prix_unitaire' => $depense['prix_unitaire'],
                    'montant_total' => $depense['prix_unitaire'] * $depense['quantite'] // Calculez le montant total
                ]);
        }

        // Rediriger ou afficher un message de succès
        return redirect()->route('activite.enAttente')->with('success', 'Activité mise à jour avec succès.');
    }


    public function valider1($id)
    {
        $activite = Activite::findOrFail($id);
        $activite->valider1(); 

        return redirect()->route('activite.enAttente', ['id' => $id])
                        ->with('success', 'L\'activité a été validée avec succès.');
    }

    public function refuser1(Request $request, $id)
    {
        $request->validate([
            'commentaire' => 'required|string|max:1000', 
        ]);

        $activite = Activite::findOrFail($id);
        $activite->refuser($request->commentaire); 

        return redirect()->route('activite.enAttente')
                        ->with('success', 'L\'activité a été refusée avec succès.');
    }

    public function reAccepter($id)
    {
        $activite = Activite::findOrFail($id);

        $activite->statut = 5;
        $activite->save();

        DB::table('activite_refuse')->where('id_activite', $id)->delete();

        return redirect()->route('activite.refusees', ['id' => $id])
                        ->with('success', 'L\'activité a été ré-acceptée avec succès.');
    }



    //// staff nice
    public function validationDirector()
    {
        $activites = ActiviteValide::getActivitesValidation2();

        return view('staffnice.activite.validation', compact('activites'));
    }

    public function ficheDirector($id)
    {
        $activite = DB::table('vue_activites_validation_2_details')
            ->where('id_activite', $id)
            ->select(
                'id_activite',
                'titre_activite',
                'type_activite',
                'nom_section',
                'date_activite',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'statut_activite',
                'objectif',
                'methodologie',
                'participants',
                'justifications',
                DB::raw('SUM(montant_total_depense) as budget_previsionnel_total')
            )
            ->groupBy(
                'id_activite',
                'titre_activite',
                'type_activite',
                'date_activite',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'statut_activite',
                'objectif',
                'methodologie',
                'nom_section',
                'participants',
                'justifications'
            )
            ->first();

        // Récupérer les dépenses associées
        $depenses = DB::table('vue_activites_validation_2_details')
            ->where('id_activite', $id)
            ->select(
                'designation_depense',
                'quantite_depense',
                'prix_unitaire_depense',
                'montant_total_depense'
            )
            ->get();

        // Associer les dépenses à l'activité
        $activite->depenses = $depenses;

        return view('staffnice.activite.fiche', compact('activite'));
    }

    public function validerDirector($id)
    {
        $activite = Activite::findOrFail($id);
        $activite->valider2(); 

        return redirect()->route('activite.validation')->with('success', 'Activité validée avec succès !');
    }

    public function refuserDiretcor(Request $request,$id)
    {
        $request->validate([
            'commentaire' => 'required|string|max:1000', 
        ]);

        $activite = Activite::findOrFail($id);
        $activite->refuser($request->commentaire); 

        return redirect()->route('activite.validation', ['id' => $id])
                        ->with('success', 'L\'activité a été refusée.');
    }

    public function exportFicheTechniquePDFDirector($id)
    {
        $activite = DB::table('vue_activites_validation_2_details')
                    ->where('id_activite', $id)
                    ->get();

        $pdf = Pdf::loadView('staffnice.activite.pdf', compact('activite'));

        return $pdf->download('fiche_technique_en_attente' . $activite[0]->titre_activite . '.pdf');
    }

    ////
    public function calendrier(Request $request)
    {
        $year = $request->get('year');
        
        $activitesValidees = ActiviteValide::getActivitesValidees($year);

        $activitesParMois = [];
        foreach ($activitesValidees as $activite) {
            $month = \Carbon\Carbon::parse($activite->date_activite)->format('F Y');
            if (!isset($activitesParMois[$month])) {
                $activitesParMois[$month] = [];
            }
            $activitesParMois[$month][] = $activite;
        }

        uksort($activitesParMois, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });

        return view('staffmada.activite.calendrier', compact('activitesParMois', 'year'));
    }

    public function calendrierDirector(Request $request)
    {
        $year = $request->get('year');
        
        $activitesValidees = ActiviteValide::getActivitesValidees($year);

        $activitesParMois = [];
        foreach ($activitesValidees as $activite) {
            $month = \Carbon\Carbon::parse($activite->date_activite)->format('F Y');
            if (!isset($activitesParMois[$month])) {
                $activitesParMois[$month] = [];
            }
            $activitesParMois[$month][] = $activite;
        }

        uksort($activitesParMois, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });

        return view('staffnice.activite.calendrier', compact('activitesParMois', 'year'));
    }

    public function details($id)
    {
        $activite = DB::table('vue_activites_validees_details')
            ->where('id_activite', $id)
            ->select(
                'id_activite',
                'titre_activite',
                'type_activite',
                'date_activite',
                'date_envoie',
                'nom_section',
                'date_validation',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'objectif',
                'methodologie',
                'participants',
                'justifications',
                DB::raw('SUM(montant_total_depense) as budget_previsionnel_total')
            )
            ->groupBy(
                'id_activite',
                'titre_activite',
                'type_activite',
                'nom_section',
                'date_activite',
                'date_envoie',
                'date_validation',
                'date_activite',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'objectif',
                'methodologie',
                'participants',
                'justifications'
            )
            ->first();

        $depenses = DB::table('vue_activites_validees_details')
            ->where('id_activite', $id)
            ->select(
                'designation_depense',
                'quantite_depense',
                'prix_unitaire_depense',
                'montant_total_depense'
            )
            ->get();

        // Associer les dépenses à l'activité
        $activite->depenses = $depenses;
        
        return view('staffmada.activite.details', compact('activite'));
    }

    public function detailsDirector($id)
    {
        $activite = DB::table('vue_activites_validees_details')
            ->where('id_activite', $id)
            ->select(
                'id_activite',
                'titre_activite',
                'type_activite',
                'date_activite',
                'date_envoie',
                'nom_section',
                'date_validation',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'objectif',
                'methodologie',
                'participants',
                'justifications',
                DB::raw('SUM(montant_total_depense) as budget_previsionnel_total')
            )
            ->groupBy(
                'id_activite',
                'titre_activite',
                'type_activite',
                'date_activite',
                'date_envoie',
                'nom_section',
                'date_validation',
                'date_activite',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'objectif',
                'methodologie',
                'participants',
                'justifications'
            )
            ->first();

        // Récupérer les dépenses associées
        $depenses = DB::table('vue_activites_validees_details')
            ->where('id_activite', $id)
            ->select(
                'designation_depense',
                'quantite_depense',
                'prix_unitaire_depense',
                'montant_total_depense'
            )
            ->get();

        // Associer les dépenses à l'activité
        $activite->depenses = $depenses;
        
        return view('staffnice.activite.details', compact('activite'));
    }

    public function exportdetail($id_activite)
    {
        $activite = DB::table('vue_activites_validees_details')
                    ->where('id_activite', $id_activite)
                    ->get();

        $pdf = Pdf::loadView('staffmada.activite.pdfDetail', compact('activite'));

        return $pdf->download('fiche_technique_valide_' . $activite[0]->titre_activite . '.pdf');
    }

    public function exportdetailDirector($id_activite)
    {
        $activite = DB::table('vue_activites_validees_details')
                    ->where('id_activite', $id_activite)
                    ->get();

        $pdf = Pdf::loadView('staffnice.activite.pdfDetail', compact('activite'));

        return $pdf->download('fiche_technique_valide_' . $activite[0]->titre_activite . '.pdf');
    }


    /////
    public function activitesProches()
    {
        $activites = ActiviteValide::getActivitesProches();

        return view('staffmada.activite.activiteproche', compact('activites'));
    }

    public function ajouterPieceJointe(Request $request, $id_activite)
    {
        if ($request->hasFile('piece_jointe')) {
            $file = $request->file('piece_jointe');
            $path = $file->store('pieces_jointes');
        }

        return back()->with('success', 'Pièce jointe ajoutée avec succès');
    }

    public function exportFicheTechniquePDF1($id)
    {
        $activite = DB::table('vue_activites_validees_details')
                    ->where('id_activite', $id)
                    ->get();

        $pdf = Pdf::loadView('staffmada.activite.pdf', compact('activite'));

        return $pdf->download('fiche_technique_' . $activite[0]->titre_activite . '.pdf');
    }

    public function exportFicheTechniquePDF2($id)
    {
        $activite = DB::table('vue_activites_validation_1_details')
                    ->where('id_activite', $id)
                    ->get();

        $pdf = Pdf::loadView('staffmada.activite.pdf2', compact('activite'));

        return $pdf->download('fiche_technique_en_Attente' . $activite[0]->titre_activite . '.pdf');
    }

    ////
    public function activitesRefusees()
    {
        $activites = DB::table('vue_activites_refuses')
            ->select('id_activite', 'titre_activite', 'type_activite', 'date_activite', 'heure_debut', 'heure_fin', 'lieu_activite', 'statut_activite')
            ->groupBy('id_activite', 'titre_activite', 'type_activite', 'date_activite', 'heure_debut', 'heure_fin', 'lieu_activite', 'statut_activite')
            ->paginate(10);


        return view('staffmada.activite.refus', compact('activites'));
    }


    public function detailsActiviteRefusee($id)
    {
        $activite = DB::table('vue_activites_refuses')->where('id_activite', $id)->first();

        $depenses = DB::table('vue_activites_refuses')
            ->where('id_activite', $id)
            ->select(
                'designation_depense',
                'quantite_depense',
                'prix_unitaire_depense',
                'montant_total_depense'
            )
            ->get();

        $commentaire = DB::table('activite_refuse')
            ->where('id_activite', $id)
            ->select('commentaire')
            ->first();

        // Associer les dépenses à l'activité
        $activite->depenses = $depenses;

        // Redirection vers la page de révision de l'activité avec le commentaire inclus
        return view('staffmada.activite.revision', compact('activite', 'commentaire'));
    }

}
