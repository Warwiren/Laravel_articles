<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticlesRequest;
use App\Http\Requests\UpdateArticlesRequest;
use App\Models\Articles;
use App\Models\Category;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //optimise la requete (reduit le nombre de requete)
        $articles = Articles::with('category', 'user')->latest()->take(10)->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticlesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticlesRequest $request)
    {
        Articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
        ]);

        // $article->user()->associate(auth()->user()->id);
        // $article->category()->associate(request()->category);

        return redirect()->route('dashboard')->with('success', 'Votre article a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    //Articles $articles
    public function show($id)
    {
        $articles = Articles::find($id);
        return view('articles.show', compact('articles'));
        // return view('articles.show')->with('articles', $articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $articles = Articles::find($id);
        return view('articles.edit', compact('articles', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticlesRequest  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticlesRequest $request, $id)
    {
        $articles = Articles::find($id);
        // $input = $request->all();

        // Verifier si l'utilisateur est admin ou auteur de l'article
        $user = auth()->user();
        if ($user->id === $articles->user_id || $user->is_admin == true) {

            $arrayUpdate = [
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category,
            ];
            // $articles->update($input);

            $articles->update($arrayUpdate);
            return redirect()->route('dashboard')->with('success', 'Votre article a été modifié');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // uniquement admin ou auteur de l'article
        $user = auth()->user();
        $articles = Articles::find($id);
        if ($user->id === $articles->user_id || $user->is_admin == true){
            Articles::destroy($id);
            return redirect()->route('dashboard');
        }
    }
}
