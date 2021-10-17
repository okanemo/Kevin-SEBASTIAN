<?php

namespace App\Http\Controllers\Client;

use A17\Twill\Models\Tag;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function showBySlug($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $mustRead = Post::published()->with(['author', 'category'])->withTag($slug)->inRandomOrder()->limit(5)->get();
        $mustReadBig = $mustRead->splice(0, 2);

        $newArticle = Post::published()->with(['author', 'category'])->withTag($slug)->latest()->paginate(11);
        $popularArticle = Post::published()->with('category')->orderByDesc('read')->limit(5)->get();

        $tags = Tag::orderByDesc('count')->limit(7)->get();
        $categories = Category::withCount('posts')->get();

        return view('client.tag-details', compact('tag', 'tags', 'categories', 'mustRead', 'mustReadBig', 'newArticle', 'popularArticle'));
    }
}
