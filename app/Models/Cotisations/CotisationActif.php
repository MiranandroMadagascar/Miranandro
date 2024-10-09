<?php

namespace App\Models\Cotisations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CotisationActif extends Model
{
    protected $table = 'cotisation_actif';

    protected $primaryKey = 'id_cotisation_actif';
    
    public $timestamps = false;

    protected $fillable = [
        'id_membre_adherent',
        'date_payement',
        'montant',
    ];

    public static function insererCotisationActif($data)
    {
        return self::create($data);
    }

    public static function cotisationsActifEnRetard()
    {
        return DB::table('vue_cotisations_actif_en_retard')->paginate(5);
    }

}