<?php

namespace App\Models\Logistique;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistique extends Model
{
    protected $table = 'logistique';

    protected $primaryKey = 'id_logistique';

    public $timestamps = false;

    protected $fillable = [
        'nom_article',
        'id_categorie_logistique',
        'description',
    ];

    public static function insererLogistique(array $data)
    {
        return self::create($data);
    }


}