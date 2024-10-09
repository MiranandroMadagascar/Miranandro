<?php

namespace App\Models\Membres;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class MembresAdherents extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'membres_adherents';

    protected $primaryKey = 'id_membre_adherent';

    protected $fillable = [
        'numero',
        'nom',
        'prenoms',
        'date_naissance',
        'genre',
        'contact',
        'adresse',
        'date_adhesion',
        'id_section',
        'email',
    ];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasseAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }

    //////////////////////////////////////////

    public static function membreParId($idMembre)
    {
        return self::where('id_membre_adherent', $idMembre)
            ->firstOrFail();
    }

    public static function updateMembre($id, $data)
    {
        $membre = self::findOrFail($id);
        $membre->update($data);
        return $membre;
    }

    public static function deleteMembre($id)
    {
        $membre = self::findOrFail($id);
        return $membre->delete();
    }

    public static function totauxMembres()
    {
        return DB::table('vue_totaux_membres')->first();
    }

    public static function listeMembresAdherents()
    {
        return DB::table('vue_membres_sections')->paginate(7);
            
    }

    public static function listeMembresAdherentsFilter($sectionId)
    {
        return DB::table('vue_membres_sections')
            ->where('id_section', $sectionId)
            ->paginate(7); 
    }

    public static function rechercherMembres($nom, $prenoms, $sectionId, $sort = 'nom_membre', $order = 'asc')
    {
        $query = DB::table('vue_membres_sections')->orderBy($sort, $order);

        if (!empty($nom)) {
            $query->where('nom_membre', 'ILIKE', "%$nom%");
        }

        if (!empty($prenoms)) {
            $query->where('prenoms_membre', 'ILIKE', "%$prenoms%");
        }

        if (!empty($sectionId)) { 
            $query->where('id_section', $sectionId);
        }

        return $query->paginate(5);
    }


}
