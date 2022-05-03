<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRegisterRequest extends FormRequest
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
            'name'      => 'string|required|max:50',
            'email'     => 'email|required|unique:restaurants,email',
            'password'  => 'required|min:4',
            'slogan'    => 'required|max:150',
            'image'     => 'required|max:3000',
            'owner'     => 'string|required|max:50',
            'ownerImage'=> 'required|max:3000',
            'status'    => 'required|min:1',
        ];
    }
}
