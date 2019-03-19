<?php

namespace App\Requests;

use Illuminate\Http\Request;

class PostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|numeric',
        ];
    }

    /**
     * Return sex filter
     *
     * @return array|string|null
     */
    public function getPostId()
    {
        return $this->input('id');
    }
}