<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Notifications\TestNotif;
use App\Http\Requests\articleForm;
use App\Http\Requests\loginRequest;
use App\Http\Requests\validateForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function register(User $user,validateForm $request){
        $verif=$request;
        if($verif){
            $user->name=$request->nom.' '.$request->prenom;
            $user->email=$request->email;
            $user->password=Hash::make($request->motdepasse);
            $user->save();
            // User::create([
            //     'name'=>$request->nom.' '.$request->prenom,
            //     'email'=>$request->email,
            //     'password'=>$request->motdepasse,
            // ]);
            $user->notify(new TestNotif());
            return redirect('/login')->with('success','Inscription effectuee avec succes!!');
        }else{
            return redirect()->back();
        }
    }
    public function showLoginForm()
    {
        // Si l'utilisateur est connecté, le déconnecter
        if (Auth::check()) {
            Auth::logout();
            // Régénérer la session pour éviter la fixation de session
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        // Afficher la vue du formulaire de login
        return view('users.login');
    }
    public function login(loginRequest $request){
        $credentials=$request->only('email', 'motdepasse');
        $credentials['password'] = $credentials['motdepasse'];
        unset($credentials['motdepasse']);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return redirect()->back()->with('error','L\'adresse mail ou le mot de passe est incorrect');
    }
    public function dashboard(Article $articles){
        $articles = Article::with('proprietaire')->paginate(3);
        return view('ajout',[
            'articles'=>$articles
        ]);
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
        // if (Auth::check()) {
        //     Auth::logout();
        //     // Régénérer la session pour éviter la fixation de session
        //     request()->session()->invalidate();
        //     //request()->session()->regenerateToken();
        //     return view('login');
        // }
    }
}
