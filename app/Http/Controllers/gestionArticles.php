<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\articleForm;
use App\Http\Requests\validateForm;
use Illuminate\Support\Facades\Auth;

class gestionArticles extends Controller
{
    public function index(){
        $articles= Article::with('proprietaire')->paginate(3);
        //$proprietaire=User::where('id',$articles->user_id)->get;
        return view('ajout',[
            'articles'=>$articles,
            //'prorietaire'=>$proprietaire->name,
        ]);
    }
    public function ajouterTitre(Article $article,articleForm $request){
        $verif=$request;
        if($verif){
            Article::create([
                'titre'=>$request->titre,
                'description'=>$request->description,
                'user_id'=>Auth::id(),
            ]);
           return redirect()->back()->with('success','L\'article a bel et bien ete ajoute');
        }else{
            return redirect()->back();
        }
    }

    public function show(Article $article){
        //$article=Article::find($id);
        return view('articles.show',[
            'article'=>$article
        ]);
    }
    public function edit(Article $article){
        return view('articles.edit',[
            'article'=>$article
        ]);
    }
    public function update(Article $article,articleForm $request){
        $article->titre=$request->titre;
        $article->description=$request->description;
        $article->save();
        return redirect('/ajouterTitre')->with('success','L\'article a bel et bien ete mis a jour');
    }
    public function delete(Article $article){
        $article->delete();
        return redirect('/ajouterTitre')->with('success','L\'article a bel et bien ete supprimer');
    }
    public function mine(User $user){
        $myarticles=Article::where('user_id',$user->id)->get();

        return view('articles.mine',[
            'user'=>$user,
            'myarticles'=>$myarticles,
        ]);
    }
}
