<?php

namespace App\Http\Controllers\Presence;

use App\Http\Controllers\Controller;
use App\Models\Activites\Activite;
use App\Models\Membres\MembresAdherents;
use App\Models\Membres\Presence;
use App\Models\Volets\Section;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        $activitesSansPresences = Presence::activitesSansPresences();

        return view('staffmada.presence.activitepointage', compact('activitesSansPresences'));
    }

    public function pointage($id_activite)
    {
        $activite = Activite::findOrFail($id_activite);
        $sections = Section::listeSections();  
        $membres = MembresAdherents::listeMembresAdherents();  

        return view('staffmada.presence.pointage', compact('activite', 'sections', 'membres'));
    }

    public function enregistrerPresence(Request $request, $id_activite)
    {
        $presences = $request->input('presences', []); 

        foreach ($presences as $id_membre => $presence) {
            Presence::create([
                'id_activite' => $id_activite,
                'id_membre_adherent' => $id_membre // Ici, id_membre correspond à l'identifiant du membre
            ]);
        }

        return redirect()->route('presence.pointage', ['id_activite' => $id_activite])
                        ->with('success', 'Présences enregistrées avec succès');
    }


    public function filtrerParSection($activiteId, $sectionId)
    {

        $activite = Activite::findOrFail($activiteId);

        if ($sectionId === 'all') {
            $membres = MembresAdherents::listeMembresAdherents(); 
        } else {
            $membres = MembresAdherents::listeMembresAdherentsFilter( $sectionId);
        }

        $sections = Section::listeSections();

        return view('staffmada.presence.pointage', compact('activite', 'membres', 'sections'));
    }

    ////
    public function suivi(Request $request)
    {
        // Récupérer le terme de recherche
        $search = $request->input('search');

        // Récupérer les activités avec des présences, et filtrer par titre si une recherche est faite
        $query = Presence::presencesParActivite();

        if ($search) {
            $query->where('titre_activite', 'ILIKE', '%' . $search . '%');
        }

        // Paginer les résultats
        $activites = $query->paginate(5);

        // Passer les données à la vue
        return view('staffmada.presence.suivi', compact('activites'));
    }

    public function show($id)
    {
        // Récupérer les informations de l'activité et les présences associées
        $activite = Presence::activiteAvecPresences($id);
        
        // Si aucune activité n'a été trouvée
        if (!$activite) {
            return redirect()->route('presence.suivi')->with('error', 'Activité non trouvée.');
        }

        // Récupérer les présences pour cette activité
        $presences = Presence::presencesPourActivite($id);
        
        // Passer les données à la vue
        return view('staffmada.presence.fiche', compact('activite', 'presences'));
    }



}
