<?php

namespace App\Models\Membres;

use App\Models\Relations\RelationsParentales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MembresParents extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'membres_parents_tuteurs';

    protected $primaryKey = 'id_parent_tuteur';

    protected $fillable = [
        'numero',
        'nom',
        'prenoms',
        'date_naissance',
        'genre',
        'id_relation',
        'profession',
        'contact',
        'adresse',
        'date_adhesion',
    ];

    public function relationParentale()
    {
        return $this->belongsTo(RelationsParentales::class, 'id_relation');
    }

    public function enfantsCommePere()
    {
        return $this->hasMany(MembresEnfants::class, 'id_pere');
    }

    public function enfantsCommeMere()
    {
        return $this->hasMany(MembresEnfants::class, 'id_mere');
    }

    public function enfantsCommeTuteur()
    {
        return $this->hasMany(MembresEnfants::class, 'id_tuteur');
    }

    ///////////////////////////////////////////////

    public static function parentParId($idParentTuteur)
    {
        return self::where('id_parent_tuteur', $idParentTuteur)
            ->firstOrFail();
    }

    public static function insertParentTuteur($data)
    {
        $numeroParent = DB::select("SELECT 'MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0') AS numero")[0]->numero;
        $data['numero'] = $numeroParent;

        return self::create($data);
    }

 
    public static function updateParentTuteur($id, $data)
    {
        $parentTuteur = self::findOrFail($id);
        $parentTuteur->update($data);
        return $parentTuteur;
    }
 
    public static function deleteParentTuteur($id)
    {
        $parentTuteur = self::findOrFail($id);
        return $parentTuteur->delete();
    }

    public static function listeCouples($recherchePere = null, $rechercheMere = null, $rechercheTuteur = null, $sort = 'nom', $order = 'asc')
    {
        $query = DB::table('vue_couples_parents_tuteurs')->orderBy($sort, $order);

        if (!empty($recherchePere)) {
            $query->where(function($query) use ($recherchePere) {
                $query->where('nom_pere', 'ILIKE', "%$recherchePere%")
                    ->orWhere('prenom_pere', 'ILIKE', "%$recherchePere%");
            });
        }

        if (!empty($rechercheMere)) {
            $query->where(function($query) use ($rechercheMere) {
                $query->where('nom_mere', 'ILIKE', "%$rechercheMere%")
                    ->orWhere('prenom_mere', 'ILIKE', "%$rechercheMere%");
            });
        }

        if (!empty($rechercheTuteur)) {
            $query->where(function($query) use ($rechercheTuteur) {
                $query->where('nom_tuteur', 'ILIKE', "%$rechercheTuteur%")
                    ->orWhere('prenom_tuteur', 'ILIKE', "%$rechercheTuteur%");
            });
        }

        return $query->paginate(5);
    }
    
}
