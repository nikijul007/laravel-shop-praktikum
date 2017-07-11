<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;

class AddToCardRequest extends Request
{
    public function rules()
    {
        return [
            'anzahl' => 'integer|required|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'anzahl' => 'Anzahl',
        ];
    }
}
