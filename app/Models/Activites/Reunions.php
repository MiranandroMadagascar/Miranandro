<?php

namespace App\Models\Activites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reunions extends Model
{
    protected $table = 'reunions';

    protected $primaryKey = 'id_reunion';

    public $timestamps = false;

    protected $fillable = [
        'id_activite',
        'ordre_du_jour',
        'proces_verbal',
        'rapport',
    ];

    public static function getReunions()
    {
        return DB::table('vue_reunions')->paginate(7);
    }

    public static function insererReunion($data)
    {
        return self::create($data);
    }

    public static function reunionsSansRapport()
    {
        return DB::table('vue_reunions_sans_rapport')->paginate(10);
    }

    public static function getRapportParActivite($idActivite)
    {
        return DB::table('vue_rapports_reunions')
            ->where('id_activite', $idActivite)
            ->get(); 
    }


}
