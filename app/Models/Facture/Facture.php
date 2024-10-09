<?php

namespace App\Models\Facture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Facture extends Model
{
    protected $table = 'facture';

    protected $primaryKey = 'id_facture';

    public $timestamps = false;

    protected $fillable = [
        'numero',
        'id_activite',
        'responsable',
        'nom_client',
        'date_facture',
        'montant_total',
    ];

    public static function factureParId($id)
    {
        return self::findOrFail($id);
    }

    public static function insererFactureAvecDetails($dataFacture, $details)
    {
        DB::beginTransaction();

        try {
            $numeroFacture = DB::select("SELECT 'FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0') AS numero")[0]->numero;
            $dataFacture['numero'] = $numeroFacture;

            $facture = self::create([
                'numero' => $dataFacture['numero'],
                'responsable' => $dataFacture['responsable'],
                'nom_client' => $dataFacture['nom_client'],
                'date_facture' => $dataFacture['date_facture'],
                'montant_total' => $dataFacture['montant_total'],
            ]);

            foreach ($details as $detail) {
                $detail['id_facture'] = $facture->id_facture;
                DetailFacture::create($detail);
            }

            DB::commit(); 
            return $facture; 

        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Erreur lors de l'insertion de la facture et des détails : " . $e->getMessage());
        }
    }

}
