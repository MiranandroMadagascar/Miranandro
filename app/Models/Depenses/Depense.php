<?php

namespace App\Models\Depenses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Depense extends Model
{
    protected $table = 'depenses';

    protected $primaryKey = 'id_depense';

    public $timestamps = false;

    protected $fillable = [
        'id_activite',
        'designation',
        'date_depense',
        'id_type_depense',
        'quantite',
        'prix_unitaire',
        'montant_total',
    ];
    
    public static function insererDepenses(array $depenses)
    {
        foreach ($depenses as $data) {
            self::create($data);
        }
    }

    public static function depensesDetailsParIdActivite($idActivite)
    {
        return DB::table('vue_depenses_details')
            ->where('id_activite', $idActivite)
            ->get();
    }

    public static function depensesComparaison()
    {
        return DB::table('vue_depenses_comparaison')->paginate(5);
    }

    public static function depensesMensuelles()
    {
        return DB::table('vue_depenses_mensuelles')->get();
    }

    public static function depensesParCategorie()
    {
        return DB::table('vue_depenses_par_categorie')->paginate(6);
    }

    public static function depensesReellesParActivite($idActivite)
    {
        return DB::table('vue_depenses_comparaison')
            ->where('type_depense', 'reel')
            ->where('id_activite', $idActivite)
            ->get(); 
    }

    public static function detailsDepenses($id_activite)
    {
        return DB::table('vue_depenses_details')
            ->where('id_activite', $id_activite)
            ->get();
    }

    public static function depensesComparaisonParId($id_activite)
    {
        return DB::table('vue_depenses_comparaison')
            ->where('id_activite', $id_activite)  
            ->first(); 
    }


}
