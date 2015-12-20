<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

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
        return view('articles.create');
    }

    public function store(Requests\ArticleRequest $input)
    {
        Auth::user()->articles()->create($input->all());
        flash()->success('Your article has been created!');
        return redirect('articles');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, Requests\ArticleRequest $input)
    {
        $article->update($input->all());
        return redirect('articles');
    }
}
