<?php

namespace App\Models\Staff;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $table = 'poste';
    
    protected $primaryKey = 'id_poste';

    public $timestamps = false;

    protected $fillable = [
        'nom_poste',
    ];

}
