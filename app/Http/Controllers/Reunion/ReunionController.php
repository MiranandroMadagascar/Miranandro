<?php

namespace App\Http\Controllers\Reunion;

use App\Http\Controllers\Controller;
use App\Models\Activites\Reunions;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReunionController extends Controller
{
    public function index()
    {
        $reunions = Reunions::reunionsSansRapport();

        return view('staffmada.reunion.reunion', compact('reunions'));
    }

    public function creerRapport($id_activite)
    {
        $reunion = Reunions::reunionsSansRapport()->where('id_activite', $id_activite)->first();
        
        return view('staffmada.reunion.rapportreunion', compact('reunion'));
    }

    public function soumettreRapport(Request $request, $id_activite)
    {
        $request->validate([
            'ordre_du_jour' => 'required',
            'proces_verbal' => 'required',
            'rapport' => 'required',
        ]);

        $data = [
            'id_activite' => $id_activite,
            'ordre_du_jour' => $request->ordre_du_jour,
            'proces_verbal' => $request->proces_verbal,
            'rapport' => $request->rapport,
        ];

        Reunions::insererReunion($data);

        return redirect()->route('reunion.index')->with('success', 'Rapport de réunion soumis avec succès.');
    }

    public function archive()
    {
        $reunions = Reunions::getReunions();

        return view('staffmada.reunion.archive', compact('reunions'));
    }

    public function afficherRapport($id_activite)
    {
        $rapport = Reunions::getRapportParActivite($id_activite)->first(); 
        
        if (!$rapport) {
            return redirect()->back()->with('error', 'Rapport introuvable.');
        }

        return view('staffmada.reunion.archivereunion', compact('rapport'));
    }

    public function exportPdf($id)
    {
        $rapport = Reunions::findOrFail($id);

        $pdf = PDF::loadView('staffmada.reunion.pdf', compact('rapport'));
        
        return $pdf->download('rapport_reunion_' . $rapport->id_activite  . '.pdf');

    }
}
