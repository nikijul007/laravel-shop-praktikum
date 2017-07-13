<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'image_path' => 'required|url',
        ];
    }

    public function attributes()
    {
        return [
            'image_path' => trans('messages.eloquent.product.attributes.image_path'), // TODO input namen in snake_case
        ];
    }
}
