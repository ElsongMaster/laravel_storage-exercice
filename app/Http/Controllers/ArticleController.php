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
        return view('pages.index',compact('datas'));
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
            "info"=>["required","min:1","max:100"],
            "email"=>["required"],
            "phone_number"=>["required"],
        ]);
        $img = new Article;
        $img->url = $rq->file('url')->hashName();
        $img->name = $rq->name;
        $img->description = $rq->description;
        $img->save();

        $rq->file("url")->storePublicly("img","public");


        return redirect()->route('Articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $Article)
    {
        $img = $Article;
        return view('Articles.show',compact('img'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $Article)
    {

        $img = $Article;
        return view('Articles.edit',compact('img'));
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
            request()->validate([
            "nom"=>["required","min:1","max:100"],
            "description"=>["required"],
            "date_publication"=>["required"],
            "auteur"=>["required","min:1","max:100"],
            "image"=>["required"],
        ]);
        Storage::disk("public")->delete("img/".$Article->url);

        $Article->url = $rq->file("url")->hashName();
        $Article->name = $rq->name;
        $Article->description = $rq->description;
        $Article->save();
        $rq->file("url")->storePublicly("img","public");

        return redirect()->route('Articles.show',$Article->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        Storage::disk("public")->delete("img".$Article->url);
        $Article->delete();

        return redirect()->route('Articles.index');
    }
}
