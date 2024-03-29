<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); // Ограничава достъпа само за администратори
    }

    public function list()
    {
        $articles = Article::all();

        return view('articles.list', compact('articles'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $data['author_id'] = Auth::guard('admin')->user()->id; // Автоматично задава текущия администратор като автор

        $article = Article::create($data);

        return redirect()->route('articles.list');
    }

    public function edit(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return abort(404); // Error 404
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update($data);

        return redirect()->route('articles.list');
    }

    public function delete($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return abort(404); // Error 404
        }

        $article->delete();

        return redirect()->route('articles.list');
    }
}
