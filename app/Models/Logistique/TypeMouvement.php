<?php

namespace App\Models\Logistique;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMouvement extends Model
{
    protected $table = 'type_mouvement';

    protected $primaryKey = 'id_type_mouvement';

    public $timestamps = false;

    protected $fillable = [
        'nom_type_mouvement',
    ];

    public static function listeTypeMouvement()
    {
        return self::all();
    }

}
