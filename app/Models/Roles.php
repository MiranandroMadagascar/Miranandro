<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles
{
    const PRESIDENT = 'president';
    const VICE_PRESIDENT = 'vice_president';
    const TRESORIER = 'tresorier';
    const TRESORIER_ADJOINT = 'tresorier_adjoint';
    const CONSEILLER = 'conseiller';
    const CONSEILLER_ADJOINT = 'conseiller_adjoint';
    const SECRETAIRE = 'secretaire';
    const SECRETAIRE_ADJOINT = 'secretaire_adjointe';
    const CHEF_SECTION = 'chef_section';
}
