<?php

namespace App\Models\Activites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActiviteValide extends Model
{
    protected $table = 'activite_valide';

    protected $primaryKey = 'id_actvite_valide';

    public $timestamps = false;

    protected $fillable = [
        'id_activite',
        'date_validation',
    ];

    public static function insertActiviteValide($data)
    {
        return self::create($data);
    }

    public static function getActivitesValidation1()
    {
        return DB::table('vue_activites_validation_1')->paginate(7);
    }

    public static function getActivitesValidation1details()
    {
        return DB::table('vue_activites_validation_1_details')->paginate(7);
    }

    public static function getActivitesValidation2()
    {
        return DB::table('vue_activites_validation_2')->paginate(7);
    }

    public static function getActivitesValidees($year = null)
    {
        $query = DB::table('vue_activites_validees');

        if ($year) {
            $query->whereYear('date_activite', $year);
        }

        return $query->orderBy('date_activite', 'asc')->get();
    }

    public static function getActivitesValideesDetails($id)
    {
        return DB::table('vue_activites_validees_details')
            ->where('id_activite', $id)
            ->first();
    }

    public static function getActivitesProches()
    {
        return DB::table('vue_activites_proches')
            ->select(
                'id_activite',
                'titre_activite',
                'type_activite',
                'date_activite',
                'heure_debut',
                'heure_fin',
                'lieu_activite',
                'nom_section',
                'budget_previsionnel_total'
            )
            ->paginate(5);
    }



}
