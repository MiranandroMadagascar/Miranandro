<?php

namespace App\Models\Facture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFacture extends Model
{
    protected $table = 'detail_facture';

    public $timestamps = false;

    protected $primaryKey = 'id_detail_facture';

    protected $fillable = [
        'id_facture',
        'designation',
        'quantite',
        'prix_unitaire',
        'montant_total',
    ];

    


}
