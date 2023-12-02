<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category' => 'required|exists:categories,id',
            'tags' => 'required',
        ]);
    
        // Crea l'articolo
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);
    
        // Associa i tag all'articolo
        $tags = explode(',', $request->tags);
        
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(['name' => $tag]);
            $article->tags()->attach($newTag);
        }
    
        return redirect(route('homepage'))->with('success', 'Articolo creato con successo, sarà pubblicato dopo la revisione.');
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title),
        ]);
    
        return redirect(route('homepage'))->with('success', 'Articolo aggiornato con successo.');
    }
    
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles->sortByDesc('created_at')->filter(function ($article) {
            return $article->is_accepted == true;
        });
        return view('article.byCategory', compact('category', 'articles'));
    }

    public function byAuthor(User $user)
    {
        $articles = $user->articles->sortByDesc('created_at')->filter(function ($article) {
            return $article->is_accepted == true;
        });
        return view('article.byAuthor', compact('user', 'articles'));
    }
    
    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        
        $articles = Article::search($query)
            ->where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('article.search-index', compact('articles', 'query'));
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
