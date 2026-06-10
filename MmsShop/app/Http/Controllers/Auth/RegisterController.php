<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    //Afficher le formulaire d'inscription
     public function index(){
         return view ('auth.register');
      }

    // Traiter le formulaire d'inscription 
    public function store (Request $request){

        //Validation des champs

        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|digits:10',
        ]);

        //créer l'utilisateur

        //on prend les données du formulaire ($request) et on les enregistre en bd
        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            //Hash::make permet d'hasher le mdp avant de le stocker en bd
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        /*Envoie de l'email de verification
        event () declenche un évènement
        Registered évènement laravel prévu pour l'inscription
        déclenche l'envoi automatique de l'email après l'inscription*/
        
        event(new Registered($user));

        //Connecter l'utilisateur créé directement au lieu de passer par la connex dab 
        auth()->login($user);

        return redirect('/dashboard');
    }
}
