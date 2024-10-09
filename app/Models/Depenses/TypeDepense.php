<?php

namespace App\Models\Depenses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDepense extends Model
{
    protected $table = 'type_depense';

    protected $primaryKey = 'id_type_depense';

    public $timestamps = false;

    protected $fillable = [
        'nom_depense',
    ];

    public static function listeTypeDepense()
    {
        return self::all();
    }

}