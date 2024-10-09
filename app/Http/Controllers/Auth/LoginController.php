<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Membres\MembresAdherents;
use App\Models\Roles;
use App\Models\Staff\StaffMadagascar;
use App\Models\Staff\Staffnice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginFormStaff()
    {
        return view('auth.staffmada');
    }

    public function showLoginFormStaffnice()
    {
        return view('auth.staffnice');
    }

    public function showLoginFormEquipe()
    {
        return view('auth.equipe');
    }

    public function showInscriptionFormEquipe()
    {
        return view('auth.inscription');
    }

    public function loginStaffMadagascar(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'mdp' => 'required|string',
        ]);

        $user = StaffMadagascar::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'L\'adresse e-mail fournie ne correspond à aucun utilisateur.',
            ])->withInput(); 
        }

        if ($credentials['mdp'] !== $user->mot_de_passe) {
            return back()->withErrors([
                'mdp' => 'Le mot de passe fourni est incorrect.',
            ])->withInput(); 
        }

        Auth::guard('staffmada')->login($user); 

        $roleMapping = [
            'President(e)' => Roles::PRESIDENT,
            'Vice-president(e)' => Roles::VICE_PRESIDENT,
            'Tresorier(e)' => Roles::TRESORIER,
            'Tresorier(e) adjoint(e)' => Roles::TRESORIER_ADJOINT,
            'Conseiller(e)' => Roles::CONSEILLER,
            'Conseiller(e) adjoint(e)' => Roles::CONSEILLER_ADJOINT,
            'Secretaire' => Roles::SECRETAIRE,
            'Secretaire adjoint(e)' => Roles::SECRETAIRE_ADJOINT,
            'CS Social' => Roles::CHEF_SECTION,
            'CS Citoyennete' => Roles::CHEF_SECTION,
            'CS education' => Roles::CHEF_SECTION,
            'CS Soutien aux Parents' => Roles::CHEF_SECTION,
            'CS Hygiene' => Roles::CHEF_SECTION,
            'CS Environnement' => Roles::CHEF_SECTION,
        ];

        if (array_key_exists($user->poste, $roleMapping)) {
            $user->role = $roleMapping[$user->poste]; 
            Log::info('Rôle de l\'utilisateur : ' . $user->role); 
        }
        
        Session::put('id_section', $user->id_section);
        session()->save();

        return redirect()->intended('/staffmada/accueil');
    }
    
    public function loginStaffNice(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'mdp' => 'required|string',
        ]);

        $user = Staffnice::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'L\'adresse e-mail fournie ne correspond à aucun utilisateur.',
            ])->withInput(); 
        }

        if ($credentials['mdp'] !== $user->mot_de_passe) {
            return back()->withErrors([
                'mdp' => 'Le mot de passe fourni est incorrect.',
            ])->withInput();
        }

        Auth::guard('staffnice')->login($user);

        // Assigner un rôle selon le poste
        // if ($user->id_poste == 1) {
        //     $user->assignRole('president_honneur');
        // }

        Session::put('id_staff', $user->id_staff);
        session()->save();

        return redirect()->intended('/staffnice/accueil'); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'dtn' => 'required|date',
            'genre' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:membres_adherents,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
        ], [
            'nom.required' => 'Le champ nom est requis.',
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'L\'adresse email doit être une adresse email valide.',
            'email.unique' => 'Cet email est déjà associé à un compte.',
            'password.regex' => 'Le mot de passe doit comporter au moins 8 caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.',
            'password.required' => 'Le champ mot de passe est requis.',
            'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        MembresAdherents::create([
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'date_naissance' => $request->dtn,
            'genre' => $request->genre,
            'adresse' => $request->adresse,
            'contact' => $request->contact,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
        ]);

        Session::flash('success', 'Votre compte a été créé avec succès. Veuillez vous connecter.');

        return redirect()->route('login.membre');
    }

    public function logoutstaffmada(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logoutstaffnice(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/staffnice/login/L54682tbjhdegfexds85164584');
    }
}

