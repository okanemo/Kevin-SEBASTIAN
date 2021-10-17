<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class PostRequest extends Request
{
    public function rulesForCreate()
    {
        return [];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => 'required|max:200',
            'headline' => 'required|max:200',
            'description' => 'required',
            'category_id' => 'required|integer',
            'tags' => 'required'
        ];
    }
}
