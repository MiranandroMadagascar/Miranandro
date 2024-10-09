<?php

namespace App\Models\Membres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MembresEnfants extends Model
{
    use HasFactory;

    protected $table = 'membres_enfants';

    public $timestamps = false;

    protected $primaryKey = 'id_membre_beneficiaire';

    protected $fillable = [
        'numero',
        'nom',
        'prenoms',
        'date_naissance',
        'genre',
        'ecole',
        'classe',
        'annee_scolaire',
        'contact',
        'adresse',
        'nombre_fratrie',
        'date_adhesion',
        'id_pere',
        'id_mere',
        'id_tuteur',
    ];

    public function pere()
    {
        return $this->belongsTo(MembresParents::class, 'id_pere');
    }

    public function mere()
    {
        return $this->belongsTo(MembresParents::class, 'id_mere');
    }

    public function tuteur()
    {
        return $this->belongsTo(MembresParents::class, 'id_tuteur');
    }

    //////////////////////////////////////////

    public static function enfantParId($idEnfant)
    {
        return self::where('id_membre_beneficiaire', $idEnfant)
            ->firstOrFail();
    }

    public static function insertEnfant($data)
    {
        $numeroEnfant = DB::select("SELECT 'AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0') AS numero")[0]->numero;
        $data['numero'] = $numeroEnfant;

        return self::create($data);
    }


    public static function updateEnfant($id, $data)
    {
        $enfant = self::findOrFail($id);
        $enfant->update($data);
        return $enfant;
    }

    public static function deleteEnfant($id)
    {
        $enfant = self::findOrFail($id);
        return $enfant->delete();
    }

    public static function listeEnfantsEtParents($nom = null, $prenom = null, $sort = 'nom', $order = 'asc')
    {
        $query = DB::table('vue_enfants_parents_tuteurs')->orderBy($sort, $order);

        if (!empty($nom)) {
            $query->where('nom', 'ILIKE', "%$nom%");
        }

        if (!empty($prenom)) {
            $query->where('prenoms', 'ILIKE', "%$prenom%");
        }

        return $query->paginate(5);
    }

    public static function enfantsAyantReussiExamen($anneeScolaire)
    {
        return self::whereIn('classe', ['7eme', '3eme', 'Terminale'])
                    ->where('annee_scolaire', $anneeScolaire)
                    ->get();
    }


}
