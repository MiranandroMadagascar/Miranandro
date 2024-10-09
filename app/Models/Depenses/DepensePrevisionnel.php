<?php

namespace App\Models\Depenses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepensePrevisionnel extends Model
{
    protected $table = 'depenses_previsionnel';

    protected $primaryKey = 'id_depense';

    public $timestamps = false;

    protected $fillable = [
        'id_fiche_technique',
        'designation',
        'quantite',
        'prix_unitaire',
        'montant_total',
    ];

    public static function insererDepensesPrevisionnelles(array $depenses)
    {
        foreach ($depenses as $data) {
            self::create($data);
        }
    }
}
