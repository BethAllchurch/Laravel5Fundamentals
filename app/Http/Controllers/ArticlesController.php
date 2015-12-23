<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\Tag;

use Carbon\Carbon;
use Auth;
use Flash;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']); // also 'except'
    }

    public function index()
    {
    	$articles = Article::latest()->published()->get();
    	return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
    	return view('articles.show', compact('article'));
    }

    public function create()
    {   
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    public function store(Requests\ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        $article->tags()->attach($request->input('tag_list'));
        flash()->success('Your article has been created!');
        return redirect('articles');
    }

    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, Requests\ArticleRequest $request)
    {
        $article->update($request->all());
        return redirect('articles');
    }
}
