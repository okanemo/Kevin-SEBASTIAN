<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use A17\Twill\Models\Tag;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends ModuleController
{
    protected $moduleName = 'categories';

    protected $titleColumnKey = 'name';

    public function indexPage()
    {
        $tags = Tag::orderByDesc('count')->limit(7)->get();
        $categories = Category::withCount('posts')->get();

        return view('client.category', compact('tags', 'categories'));
    }

    public function showByName($category)
    {
        $category = Category::where('name', $category)->first();
        $mustRead = Post::published()->with(['author', 'category'])->where('category_id', $category->id)->inRandomOrder()->limit(5)->get();
        $mustReadBig = $mustRead->splice(0, 2);

        $newArticle = Post::published()->with(['author', 'category'])->where('category_id', $category->id)->latest()->paginate(11);
        $popularArticle = Post::published()->with('category')->where('category_id', $category->id)->orderByDesc('read')->limit(5)->get();

        $tags = Tag::orderByDesc('count')->limit(7)->get();
        $categories = Category::withCount('posts')->get();

        return view('client.category-details', compact('tags', 'category', 'categories', 'mustRead', 'mustReadBig', 'newArticle', 'popularArticle'));
    }

    protected $indexOptions = [
        'permalink' => false
    ];
}
