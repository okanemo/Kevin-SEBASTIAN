<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use A17\Twill\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class PostController extends ModuleController
{
    protected $moduleName = 'posts';

    protected $formWith = [
        'category'
    ];

    public function filter(Request $request)
    {
        $word = $request->q;

        $tags = Tag::orderByDesc('count')->limit(7)->get();
        $categories = Category::withCount('posts')->get();

        $post = Post::published()->with(['author', 'category'])
            ->where('title', 'like', '%' . $word . '%')
            ->orWhere('headline', 'like', '%' . $word . '%')
            ->orWhere('description', 'like', '%' . $word . '%')
            ->orWhereHas('tags', function ($query) use ($word) {
                $query->where('name', 'like', '%' . $word . '%');
            })
            ->orWhereHas('category', function ($query) use ($word) {
                $query->where('name', 'like', '%' . $word . '%');
            })->paginate(11);

        $popularArticle = Post::published()->with('category')->orderByDesc('read')->limit(5)->get();

        return view('client.search', compact('post', 'tags', 'categories', 'popularArticle'));
    }

    public function showBySlug($slug)
    {
        $post = $this->repository->forSlug($slug);
        $post->read = $post->read + 1;
        $post->save();

        $tags = Tag::orderByDesc('count')->limit(7)->get();
        $categories = Category::withCount('posts')->get();

        $popularArticle = Post::published()->with('category')->where('category_id', $post->category_id)->where('id', '!=', $post->id)->orderByDesc('read')->limit(5)->get();

        $previousArticleID = Post::published()->where('category_id', $post->category_id)->where('id', '<', $post->id)->max('id');
        $nextArticleID = Post::published()->where('category_id', $post->category_id)->where('id', '>', $post->id)->min('id');

        $previousArticle = null;
        $nextArticle = null;

        $previousArticleID && $previousArticle = Post::where('id', $previousArticleID)->first();
        $nextArticleID && $nextArticle = Post::where('id', $nextArticleID)->first();

        $relatedArticle = Post::published()->with(['author', 'category'])->where('id', '!=', $post->id)->where('category_id', $post->category_id)->inRandomOrder()->limit(6)->get();

        return view('client.post', compact('tags', 'post', 'categories', 'popularArticle', 'previousArticle', 'nextArticle', 'relatedArticle'));
    }

    public function popular()
    {
        $tags = Tag::orderByDesc('count')->limit(7)->get();
        $categories = Category::withCount('posts')->get();
        $newArticle = Post::published()->with(['author', 'category'])->latest()->paginate(2);
        $popularArticle = Post::published()->with('category')->orderByDesc('read')->limit(5)->get();

        return view('client.post-popular', compact('tags', 'categories', 'newArticle', 'popularArticle'));
    }

    protected function formData($request)
    {
        return [
            'categoryList' => app()->make(
                CategoryRepository::class
            )->listAll('name')
        ];
    }
}
