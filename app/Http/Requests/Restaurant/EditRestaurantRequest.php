<?php

namespace App\Http\Requests\Restaurant;

use App\Models\Restaurant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class EditRestaurantRequest extends FormRequest
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
    public function rules( Restaurant $resutaurant)
    {
    return [
            'name' => 'string|required|max:50',
            'slogan' => 'string|required',
            'image' => 'required',
            'mobile' => 'required',
            'owner' => 'string|required|max:50',
            'status' => 'required|min:1',
        ];
    }
}
