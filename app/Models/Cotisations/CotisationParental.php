<?php

namespace App\Models\Cotisations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CotisationParental extends Model
{
    protected $table = 'cotisation_parental';

    protected $primaryKey = 'id_cotisation_parental';

    public $timestamps = false;
    
    protected $fillable = [
        'id_parent_tuteur',
        'date_payement',
        'montant',
    ];

    public static function insererCotisationParental($data)
    {
        return self::create($data);
    }

    public static function cotisationsParentalEnRetard()
    {
        return DB::table('vue_cotisations_parental_en_retard')->paginate(5);
    }

}
