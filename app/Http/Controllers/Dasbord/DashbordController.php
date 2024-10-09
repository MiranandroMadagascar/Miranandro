<?php

namespace App\Http\Controllers\Dasbord;

use App\Http\Controllers\Controller;
use App\Models\Caisse\Caisse;
use App\Models\Depenses\Depense;
use App\Models\Logistique\MouvementLogistique;
use App\Models\Membres\MembresAdherents;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function accueil()
    {
        $totauxMembres = MembresAdherents::totauxMembres();

        return view('staffmada.dashbord.accueil', compact('totauxMembres'));
    }

    public function accueilDirector()
    {
        $totauxMembres = MembresAdherents::totauxMembres();

        return view('staffnice.dashbord.accueil', compact('totauxMembres'));
    }

    public function solde()
    {
        $totauxMembres = MembresAdherents::totauxMembres();

        $budgetGlobal = Caisse::budgetGlobal();

        return view('staffmada.dashbord.solde', compact('totauxMembres', 'budgetGlobal'));
    }

    public function soldeDirector()
    {
        $totauxMembres = MembresAdherents::totauxMembres();

        $budgetGlobal = Caisse::budgetGlobal();

        return view('staffnice.dashbord.solde', compact('totauxMembres', 'budgetGlobal'));
    }

    public function comparaisonDepenses()
    {
        $depenses = Depense::depensesComparaison(); 
        return view('staffmada.dashbord.comparaisonDepense', compact('depenses'));
    }

    public function comparaisonDepensesDirector()
    {
        $depenses = Depense::depensesComparaison(); 
        return view('staffnice.dashbord.comparaisonDepense', compact('depenses'));
    }

    public function detailsDepenses($id)
    {
        $details = Depense::detailsDepenses($id);

        $depense = Depense::depensesComparaisonParId($id);

        return view('staffmada.dashbord.detailDepense', compact('details', 'depense'));
    }

    public function detailsDepensesDirector($id)
    {
        $details = Depense::detailsDepenses($id);

        $depense = Depense::depensesComparaisonParId($id);

        return view('staffnice.dashbord.detailDepense', compact('details', 'depense'));
    }

    public function historiqueCaisse(Request $request)
    {
        $annee = $request->get('annee', date('Y'));
    
        $mouvements = Caisse::mouvementsParAnnee($annee);
    
        $soldes = Caisse::getSoldeAnnuel($annee);
    
        $solde_precedent = Caisse::getSoldeAnnuel($annee - 1)->solde_cumule ?? 0;
    
        return view('staffmada.dashbord.historiqueCaisse', compact('mouvements', 'annee', 'soldes', 'solde_precedent'));
    }

    public function historiqueCaisseDirector(Request $request)
    {
        $annee = $request->get('annee', date('Y'));
    
        $mouvements = Caisse::mouvementsParAnnee($annee);
    
        $soldes = Caisse::getSoldeAnnuel($annee);
    
        $solde_precedent = Caisse::getSoldeAnnuel($annee - 1)->solde_cumule ?? 0;
    
        return view('staffnice.dashbord.historiqueCaisse', compact('mouvements', 'annee', 'soldes', 'solde_precedent'));
    }

    public function revenusMensuels(Request $request)
    {
        $annee = $request->input('annee', date('Y'));

        $revenusMensuels = Caisse::revenusMensuels();

        $filteredRevenus = $revenusMensuels->filter(function ($item) use ($annee) {
            return substr($item->mois, 0, 4) == $annee;
        });

        $moisLabels = [
            "01" => "Janvier", "02" => "Février", "03" => "Mars", "04" => "Avril", "05" => "Mai", 
            "06" => "Juin", "07" => "Juillet", "08" => "Août", "09" => "Septembre", "10" => "Octobre", 
            "11" => "Novembre", "12" => "Décembre"
        ];

        $labels = [];
        $data = [];

        foreach ($filteredRevenus as $revenu) {
            $mois = substr($revenu->mois, 5, 2);
            $labels[] = $moisLabels[$mois]; 
            $data[] = $revenu->total_revenus; 
        }

        return view('staffmada.dashbord.revenumensuel', compact('labels', 'data', 'annee'));
    }

    public function revenusMensuelsDirector(Request $request)
    {
        $annee = $request->input('annee', date('Y'));

        $revenusMensuels = Caisse::revenusMensuels();

        $filteredRevenus = $revenusMensuels->filter(function ($item) use ($annee) {
            return substr($item->mois, 0, 4) == $annee;
        });

        $moisLabels = [
            "01" => "Janvier", "02" => "Février", "03" => "Mars", "04" => "Avril", "05" => "Mai", 
            "06" => "Juin", "07" => "Juillet", "08" => "Août", "09" => "Septembre", "10" => "Octobre", 
            "11" => "Novembre", "12" => "Décembre"
        ];

        $labels = [];
        $data = [];

        foreach ($filteredRevenus as $revenu) {
            $mois = substr($revenu->mois, 5, 2);
            $labels[] = $moisLabels[$mois]; 
            $data[] = $revenu->total_revenus; 
        }

        return view('staffnice.dashbord.revenumensuel', compact('labels', 'data', 'annee'));
    }



    public function depensesParCategorie()
    {
        $depenses = Depense::depensesParCategorie();

        $categories = $depenses->pluck('categorie_depense');
        $montants = $depenses->pluck('total_depenses');

        return view('staffmada.dashbord.categoriedepense', [
            'categories' => $categories,
            'montants' => $montants
        ]);
    }

    public function depensesParCategorieDirector()
    {
        $depenses = Depense::depensesParCategorie();

        $categories = $depenses->pluck('categorie_depense');
        $montants = $depenses->pluck('total_depenses');

        return view('staffnice.dashbord.categoriedepense', [
            'categories' => $categories,
            'montants' => $montants
        ]);
    }

    public function depensesMensuelles(Request $request)
    {
        $annee = $request->input('annee', date('Y'));

        $depensesMensuelles = Depense::depensesMensuelles();

        $filteredDepenses = $depensesMensuelles->filter(function ($item) use ($annee) {
            return substr($item->mois, 0, 4) == $annee;
        });

        $moisLabels = [
            "01" => "Janvier", "02" => "Février", "03" => "Mars", "04" => "Avril", "05" => "Mai", 
            "06" => "Juin", "07" => "Juillet", "08" => "Août", "09" => "Septembre", "10" => "Octobre", 
            "11" => "Novembre", "12" => "Décembre"
        ];

        $labels = [];
        $data = [];

        foreach ($filteredDepenses as $depense) {
            $mois = substr($depense->mois, 5, 2);
            $labels[] = $moisLabels[$mois]; 
            $data[] = $depense->total_depenses; 
        }

        return view('staffmada.dashbord.depensemensuel', compact('labels', 'data', 'annee'));
    }

    public function depensesMensuellesDirector(Request $request)
    {
        $annee = $request->input('annee', date('Y'));

        $depensesMensuelles = Depense::depensesMensuelles();

        $filteredDepenses = $depensesMensuelles->filter(function ($item) use ($annee) {
            return substr($item->mois, 0, 4) == $annee;
        });

        $moisLabels = [
            "01" => "Janvier", "02" => "Février", "03" => "Mars", "04" => "Avril", "05" => "Mai", 
            "06" => "Juin", "07" => "Juillet", "08" => "Août", "09" => "Septembre", "10" => "Octobre", 
            "11" => "Novembre", "12" => "Décembre"
        ];

        $labels = [];
        $data = [];

        foreach ($filteredDepenses as $depense) {
            $mois = substr($depense->mois, 5, 2);
            $labels[] = $moisLabels[$mois]; 
            $data[] = $depense->total_depenses;
        }

        // Passer les données à la vue
        return view('staffnice.dashbord.depensemensuel', compact('labels', 'data', 'annee'));
    }

    public function suiviLogistique()
    {
        $logistiques = MouvementLogistique::logistiqueDisponible();

        return view('staffmada.dashbord.suiviLogistique', compact('logistiques'));
    }

    public function suiviLogistiqueDirector()
    {
        $logistiques = MouvementLogistique::logistiqueDisponible();

        return view('staffnice.dashbord.suiviLogistique', compact('logistiques'));
    }



}
