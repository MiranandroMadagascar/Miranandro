<?php

namespace App\Models\Staff;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class StaffMadagascar extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'vue_staff_madagascar';

    public $timestamps = false;

    protected $primaryKey = 'staff_id';

    public $incrementing = false;

    public $role;

    protected $fillable = [
        'staff_id',
        'id_section',
        'numero',
        'nom',
        'prenoms',
        'date_naissance',
        'genre',
        'contact',
        'adresse',
        'email',
        'nom_section',
        'nom_poste',
        'mot_de_passe',
    ];

    protected $hidden = [
        'mot_de_passe', 
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasseAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }
}
