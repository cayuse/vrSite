<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        if (Auth::User()->can('create_courses')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                return [
                    'name' => 'required|min:3',
                    'path' => 'required:mimes:jpeg,png',
                    'argument' => 'required'
                ];
            }
            case 'PATCH': {
                return [
                    'name' => 'required|min:3',
                    'path' => 'nullable:mimes:jpeg,png',
                    'argument' => 'required'
                ];
            }
        }
    }
}
