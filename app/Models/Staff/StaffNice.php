<?php

namespace App\Models\Staff;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Staffnice extends Authenticatable
{
    use HasFactory, Notifiable ,HasRoles;

    protected $table = 'staff_nice';

    protected $primaryKey = 'id_staff';

    protected $fillable = [
        'nom',
        'prenoms',
        'date_naissance',
        'genre',
        'contact',
        'adresse',
        'id_poste',
        'date_adhesion',
        'email',
        'mot_de_passe',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    public function setMotDePasseAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
