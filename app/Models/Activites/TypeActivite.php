<?php

namespace App\Models\Activites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeActivite extends Model
{
    protected $table = 'type_activite';

    protected $primaryKey = 'id_type_activite';
    
    public $timestamps = false;

    protected $fillable = [
        'nom_activite',
    ];

    public static function listeTypeActivite()
    {
        return self::all();
    }

}
