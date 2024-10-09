<?php

namespace App\Models\Volets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volet extends Model
{
    protected $table = 'volet';

    protected $primaryKey = 'id_volet';

    public $timestamps = false;

    protected $fillable = [
        'nom_volet',
    ];

    public static function listeVolet()
    {
        return self::all();
    }
}
