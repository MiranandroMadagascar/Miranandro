<?php

namespace App\Models\Activites;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activite extends Model
{
    protected $table = 'activites';

    protected $primaryKey = 'id_activite';

    public $timestamps = false;

    protected $fillable = [
        'titre',
        'id_type_activite',
        'date_activite',
        'heure_debut',
        'heure_fin',
        'lieu',
        'id_section',
        'date_envoie',
        'statut',
    ];

    public static function insertActivite($data)
    {
        if (!isset($data['statut'])) {
            $data['statut'] = 1; 
        }

        if (!isset($data['date_envoie'])) {
            $data['date_envoie'] = Carbon::now(); 
        }

        return self::create($data);
    }

    public static function activiteParId($id)
    {
        return self::findOrFail($id);
    }

    public static function updateStatutParId($id, $statut)
    {
        $activite = self::findOrFail($id);
        $activite->statut = $statut;
        $activite->save();
        return $activite;
    }

    public static function updateActiviteParId($id, $data)
    {
        $activite = self::findOrFail($id);
        $activite->update($data);
        return $activite;
    }

    public static function activitesSansFiche()
    {
        return DB::table('vue_activites_sans_fiche')->paginate(7);
    }

    public static function activitesSansDepenses()
    {
        return DB::table('vue_activites_sans_depenses')->paginate(7);
    }

    public static function activitesSansDepensesPrevisionnelles()
    {
        return DB::table('vue_activites_sans_depenses_previsionnelles')->paginate(7);
    }

    public function valider1()
    {
        $this->statut = 5;
        $this->save();
    }

    public function refuser($commentaire)
    {
        $this->statut = 0;
        $this->save();

        DB::table('activite_refuse')->insert([
            'id_activite' => $this->id_activite,
            'date_refus' => now(), 
            'commentaire' => $commentaire,
        ]);
    }


    public function valider2()
    {
        $this->statut = 10; 
        $this->save();

        $validatedActivity = new ActiviteValide();
        $validatedActivity->id_activite = $this->id_activite;
        $validatedActivity->date_validation = Carbon::now(); 
        $validatedActivity->save();
    }


    public static function getActivitesRefusees()
    {
        return DB::table('vue_activites_refuses')->paginate(7);
    }
}
