<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $datas = Article::all();
        return view('pages.allArticle',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
            request()->validate([
            "nom"=>["required","min:1","max:100"],
            "description"=>["required"],
            "date_publication"=>["required"],
            "auteur"=>["required","min:1","max:100"],
            "image"=>["required"],
        ]);
        $Article = new Article;
        $Article->nom = $rq->nom;
        $Article->description = $rq->description;
        $Article->date_publication = $rq->date_publication;
        $Article->auteur = $rq->auteur;
        $Article->image = $rq->file("image")->hashName();
        $Article->save();
        $rq->file("image")->storePublicly("img","public");


        return redirect()->route('articles.index')->with('message', 'IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $Article)
    {
        $article = $Article;
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $Article)
    {

        $article = $Article;
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, Article $Article)
    {
        Storage::disk("public")->delete("img/".$Article->image);
            request()->validate([
            "nom"=>["required","min:1","max:100"],
            "description"=>["required"],
            "date_publication"=>["required"],
            "auteur"=>["required","min:1","max:100"],
            "image"=>["required"],
        ]);
        
        $Article->image = $rq->file("image")->hashName();
        $Article->nom = $rq->nom;
        $Article->description = $rq->description;
        $Article->date_publication = $rq->date_publication;
        $Article->auteur = $rq->auteur;
        $Article->save();
        $rq->file("image")->storePublicly("img","public");

        return redirect()->route('articles.show',$Article->id)->with('message', 'IT WORKS!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        Storage::disk("public")->delete("img/".$Article->image);
        $Article->delete();

        return redirect()->route('articles.index')->with('message', 'IT WORKS!');
    }
}
