<?php

namespace App\Models\Logistique;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MouvementLogistique extends Model
{
    protected $table = 'mouvement_logistique';

    protected $primaryKey = 'id_mouvement';

    public $timestamps = false;

    protected $fillable = [
        'id_logistique',
        'id_type_mouvement',
        'quantite',
        'date_mouvement',
        'description',
    ];

    public static function logistiqueDisponible()
    {
        return DB::table('vue_logistique_disponible')->paginate(7); 
    }

    public static function verifierStockDisponible($idLogistique, $quantiteSortie)
    {
        $stockDisponible = DB::table('vue_logistique_disponible')
            ->where('logistique_id', $idLogistique)
            ->value('quantite_disponible');
        
        if ($stockDisponible < $quantiteSortie) {
            return false; 
        }

        return true;
    }

    public static function insererMouvementLogistique(array $data)
    {
        if ($data['id_type_mouvement'] == 2) { 
            if (!self::verifierStockDisponible($data['id_logistique'], $data['quantite'])) {
                throw new \Exception('Quantité en stock insuffisante pour effectuer cette sortie.');
            }
        }

        return self::create($data);
    }



}
