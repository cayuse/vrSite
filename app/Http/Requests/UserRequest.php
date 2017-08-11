<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $id = $this->route('user');
        $user = User::findOrFail($id);
        if (Auth::User() && (Auth::User()->can('add_courses')) || compareObjects($user, Auth::User())) {
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
        $id = $this->route('user');
        $user = User::findOrFail($id);
                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $user->id,
                ];
    }
}
