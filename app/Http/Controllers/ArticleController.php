<?php

// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }
}
