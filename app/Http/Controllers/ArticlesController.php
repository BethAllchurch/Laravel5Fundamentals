<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

use Carbon\Carbon;
use Auth;

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

    public function show($id)
    {
    	$article = Article::findOrFail($id);
    	return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Requests\ArticleRequest $input)
    {
        $article = new Article($input->all());
        Auth::user()->articles()->save($article); // todo
        return redirect('articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);   
        return view('articles.edit', compact('article'));
    }

    public function update($id, Requests\ArticleRequest $input)
    {
        $article = Article::findOrFail($id);   
        $article->update($input->all());
        return redirect('articles');
    }
}
