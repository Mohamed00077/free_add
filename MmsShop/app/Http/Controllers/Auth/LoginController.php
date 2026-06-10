<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Afficher le formulaire de connexion
    public function index(){
        return view ('auth.login');
    }

    //traiter le formiulaire de connexion
    public function store (Request $request){
        //Validation des champs

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //auth()->attempt() laravel verifie si l'email et mdp coreespondent à un user dans la bd
        //request->only('email', 'password') signifie qu'on prend uniquement email et mdp du formulaire pour la verifiaction
        // true si ça corresspond, false dans le cas contraire
        if(auth()->attempt($request->only('email', 'password'))) {

            //régénérer l'id de session après la connexion. mesure de sécurité contre les voleurs d'identifiant de session avant la connexion du user pour accéder à son compte 
            $request->session()->regenerate();

            // Vérifier si l'utilisateur est un administrateur
            // (Assurez-vous d'avoir une colonne 'role' ou 'is_admin' dans votre table users)
            if (auth()->user()->role === 'admin') {
                return redirect('/admin');
            }

            return redirect('/dashboard');
        }

        //back() retourne sur la page de login
        //withErrors() envoie un message d'erreur

        return back()->withErrors([
            'email' => 'Ces identifiants ne correspondent pas.',
        ]);
    }

    public function logout(Request $request){
        //deconnecter l'utilisateur. laravel supprime ses informations de la session.
        //represente session_unset() en php pur
        auth()->logout();

        //Détruire complètement la session de l'utilisateur
        //réprésente session_destroy() en php pur
        $request->session()->invalidate();

        //régénère le token CSRF, code secret que Laravel génère pour chaque formulaire pour éviter les attaques
        //réprésente session_reset() en php pur
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
