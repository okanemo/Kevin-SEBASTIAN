<?php

namespace App\Http\Controllers\Client;

use A17\Twill\Models\Tag;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mustRead = Post::published()->with(['author', 'category'])->inRandomOrder()->limit(5)->get();
        $mustReadBig = $mustRead->splice(0, 2);

        $categories = Category::withCount('posts')->get();
        $tags = Tag::orderByDesc('count')->limit(7)->get();

        $newArticle = Post::published()->with(['author', 'category'])->latest()->paginate(11);
        $popularArticle = Post::published()->with('category')->orderByDesc('read')->limit(5)->get();

        return view('client.dashboard', compact('tags', 'mustRead', 'mustReadBig', 'categories', 'newArticle', 'popularArticle'));
    }
}
