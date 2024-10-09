<?php

namespace App\Models\Membres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presence extends Model
{
    protected $table = 'presence';

    protected $primaryKey = 'id_presence';

    public $timestamps = false;

    protected $fillable = [
        'id_activite',
        'id_membre_adherent',
    ];

    public static function insererPresence(array $presences)
    {
        foreach ($presences as $data) {
            self::create($data);
        }
    }

    public static function activitesSansPresences()
    {
        return DB::table('vue_activites_validees_proches_sans_presences')->paginate(5);
    }

    public static function presencesParActivite()
    {
        return DB::table('vue_presences_activite')
                ->select('id_activite', 'titre_activite', 'section_responsable','lieu_activite','date_activite','heure_debut','heure_fin')
                ->groupBy('id_activite', 'titre_activite', 'section_responsable','lieu_activite','date_activite','heure_debut','heure_fin');
    }

    public static function activiteAvecPresences($idActivite)
    {
        return DB::table('vue_presences_activite')
                ->where('id_activite', $idActivite)
                ->select('id_activite', 'titre_activite', 'section_responsable')
                ->first();
    }

    public static function presencesPourActivite($idActivite)
    {
        return DB::table('vue_presences_activite')
                ->where('id_activite', $idActivite)
                ->select('nom', 'prenoms')
                ->get();
    }

}
