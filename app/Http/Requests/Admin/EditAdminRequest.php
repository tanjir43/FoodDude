<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
            'full_name' => 'required|max:25|string',
            'email'     => 'required|email',
            'designation' => 'required| max:50',
            'bio'         =>'max:1000',
            'image'       =>'max:3000',
            'status'      => 'min:1',
        ];
    }
}
