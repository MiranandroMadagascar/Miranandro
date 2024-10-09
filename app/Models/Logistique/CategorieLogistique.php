<?php

namespace App\Models\Logistique;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieLogistique extends Model
{
    protected $table = 'categorie_logistique';

    protected $primaryKey = 'id_categorie_logistique';

    public $timestamps = false;

    protected $fillable = [
        'nom_categorie',
    ];

    public static function listeCategorieLogistique()
    {
        return self::all();
    }

}
