<?php

namespace App\Models\Activites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FicheTechnique extends Model
{
    protected $table = 'fiche_technique';

    protected $primaryKey = 'id_fiche_technique';

    public $timestamps = false;

    protected $fillable = [
        'id_activite',
        'objectif',
        'methodologie',
        'participants',
        'justifications',
    ];

    public static function insererFicheTechnique($data)
    {
        return self::create($data);
    }

    public static function ficheTechniqueParId($id_fiche_technique)
    {
        return self::findOrFail($id_fiche_technique);
    }


}
