<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    public function rules()
    {
        return [
            'imagePath' => 'required|url', 
        ];
    }

    public function attributes()
    {
        return [
            'imagePath' => 'Bild Pfad',
        ];
    }
}
