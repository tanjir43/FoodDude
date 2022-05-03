<?php

namespace App\Http\Requests\Restaurant\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateVariationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'verity' => 'string|required|max:50',
            'status' => 'required|min:1',
        ];
    }
}
