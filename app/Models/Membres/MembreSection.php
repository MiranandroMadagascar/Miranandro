<?php

namespace App\Models\Membres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MembreSection extends Model
{
    protected $table = 'membre_section';

    protected $primaryKey = 'id_membre_section';

    public $timestamps = false;

    protected $fillable = [
        'id_membre_adherent',
        'id_section',
    ];

    public static function listeMembresSections()
    {
        return DB::table('vue_membres_sections')->paginate(10);
    }

    public static function membresParSectionId($idSection)
    {
        return DB::table('vue_membres_sections')
            ->where('id_section', $idSection)
            ->paginate(10);
    }

}
