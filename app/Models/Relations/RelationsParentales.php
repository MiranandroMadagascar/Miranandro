<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationsParentales extends Model
{
    protected $table = 'relations_parentales';

    protected $primaryKey = 'id_relation';

    public $timestamps = false;

    protected $fillable = [
        'nom_relation',
    ];

    public static function listeRelationParentale()
    {
        return self::all();
    }
}