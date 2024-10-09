<?php

namespace App\Models\Caisse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieCaisse extends Model
{
    protected $table = 'categorie_caisse';

    protected $primaryKey = 'id_categorie_caisse';
    
    public $timestamps = false;

    protected $fillable = [
        'nom_categorie',
    ];

    public static function listeCategorieCaisse()
    {
        return self::all();
    }

}