<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class Category extends Model
{
    use HasMedias;

    protected $fillable = [
        'published',
        'name'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

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
