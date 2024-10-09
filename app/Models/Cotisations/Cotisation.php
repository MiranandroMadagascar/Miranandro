<?php

namespace App\Models\Cotisations;

use App\Models\Cotisations\TypeCotisation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cotisation extends Model
{
    protected $table = 'cotisation';

    protected $primaryKey = 'id_cotisation';

    public $timestamps = false;

    protected $fillable = [
        'id_type_cotisation',
        'montant',
    ];

    public static function insererCotisation($data)
    {
        return self::create($data);
    }

    public static function updateCotisation($id, $data)
    {
        $cotisation = self::findOrFail($id);

        if ($cotisation) {
            $cotisation->update($data);
            return $cotisation;
        }

        return null; 
    }

    public static function totalCotisationsParentalParAnnee($annee)
    {
        return DB::table('cotisation_parental')
            ->whereYear('date_payement', $annee)
            ->sum('montant');
    }

    public static function getTotalCotisationsActifParAnnee($annee)
    {
        return DB::table('cotisation_actif')
            ->whereYear('date_payement', $annee)
            ->sum('montant');
    }

    public static function getCotisationsWithType()
    {
        return DB::table('cotisation')
            ->join('type_cotisation', 'cotisation.id_type_cotisation', '=', 'type_cotisation.id_type_cotisation')
            ->select('cotisation.*', 'type_cotisation.nom_cotisation as type_cotisation_nom' , 'type_cotisation.id_type_cotisation')
            ->get();
    }

    public static function getCotisationsParentalesEnRetard()
    {
        return DB::table('vue_cotisations_parental_en_retard')
                ->select('id','nom', 'prenoms', 'annee_retard','numero')
                ->paginate(7);
    }

    public static function getCotisationsActivesEnRetard()
    {
        return DB::table('vue_cotisations_actif_en_retard') 
                ->select('id','nom', 'prenoms', 'annee_retard','numero')
                ->paginate(7);
    }


}
