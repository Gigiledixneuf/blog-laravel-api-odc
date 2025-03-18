<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
//use Str marche egalement mais c'est mieux de faire appel a Str depuis sa source 
use Illuminate\Support\Str;

class articleController extends Controller
{

    public function index()
    {
        //return ArticleResource::collection(Article::paginate(1));
        return ArticleResource::collection(Article::all());
    }


    public function store(ArticleRequest $request)
    {
        //validation des données avec array_merge via à ArticleRequest
        $data = array_merge(
            $request->all(),
            [
                "slug" => Str::slug($request->title),
            ]
        );

        //creation de l'article via create en passant au au validator 
        $article = Article::create($data);

 
        // Attacher la catégorie à l'article
        $article->categories()->attach($request->category_id);

        // Récupérer toutes les catégories associées à cet article
        $categories = $article->categories;

        // Retourner la liste des catégories associées (par exemple, en JSON)
        return response()->json($categories);
    }

 
    public function show( Article $article)
    {
        return new ArticleResource($article);
    }

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
