<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class EditTableRequest extends FormRequest
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
        $id = $this->route('edit');
        return [
            'name'      => 'required|string|exists:tables'. $id ,
            'priority'  => 'required|numeric|exists:tables'.$id,
            'image'     => 'max:3000',
            'hour'      => 'required|min:1',
            'status'    => 'required|min:1',
        ];
    }
}
