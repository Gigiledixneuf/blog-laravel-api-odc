<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $article = Article::with('comments')->get();

        // return $article;

        return ArticleResource::collection(Article::paginate(1));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();

        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->photo = $request->photo;
        $article->auteur = $request->auteur;
        $article->content = $request-> content;

        return $article->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show( Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
