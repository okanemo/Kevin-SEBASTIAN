<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class Post extends Model
{
    use HasSlug, HasMedias;

    protected $fillable = [
        'published',
        'title',
        'headline',
        'description',
        'category_id',
        'author_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(TwillUser::class, 'author_id');
    }

    public $slugAttributes = [
        'title',
    ];

    public $mediasParams = [
        'cover' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 12 / 9
                ]
            ]
        ]
    ];
}
