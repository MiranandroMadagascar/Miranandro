<?php

namespace App\Models\Volets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Section extends Model
{
    protected $table = 'section';

    protected $primaryKey = 'id_section';

    public $timestamps = false;
    
    protected $fillable = [
        'nom_section',
        'id_volet',
    ];

    public function volet()
    {
        return $this->belongsTo(Volet::class, 'id_volet');
    }

    public static function listeSection()
    {
        return self::all();
    }

    public static function listeSections()
    {
        return DB::table('vue_membres_sections')
                 ->select('id_section', 'section')
                 ->distinct()
                 ->get();
    }
}
