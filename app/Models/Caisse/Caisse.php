<?php

namespace App\Models\Caisse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Caisse extends Model
{
    protected $table = 'caisse';

    protected $primaryKey = 'id_caisse';

    public $timestamps = false;

    protected $fillable = [
        'id_categorie_caisse',
        'montant',
        'date_entree',
    ];

    public static function insererCaisse($data)
    {
        return self::create($data);
    }

    public static function budgetGlobal()
    {
        return DB::table('vue_budget_global')->first();
    }

    public static function revenusMensuels()
    {
        return DB::table('vue_revenus_mensuels')->get();
    }


    public static function mouvementsParAnnee($annee)
    {
        return DB::table('vue_mouvements_caisse_mensuels')
            ->whereYear('date_mouvement', $annee)
            ->orderBy('mois', 'asc')
            ->get();
    }
    
    public static function getSoldeAnnuel($annee)
    {
        return DB::table('vue_solde_annuel')
            ->where('annee', $annee)
            ->first();
    }

}
