<?php

namespace App\Models\Cotisations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCotisation extends Model
{
    protected $table = 'type_cotisation';

    protected $primaryKey = 'id_type_cotisation';

    public $timestamps = false;

    protected $fillable = [
        'nom_cotisation',
    ];

    public static function listeTypeCotisation()
    {
        return self::all();
    }

    
}