<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return $this->postRules();
            case 'PATCH':
                return $this->patchRules();
        }
    }

    /**
     * basic rule used for all request method
     *
     * @return array
     */
    private function basicRules()
    {
        return [
            'name' => 'string|required',
        ];
    }

    /**
     * rules that only apply to post request
     *
     * @return array
     */
    private function postRules()
    {
        $postRules = [
            'email'    => 'email|required|unique:users,email',
            'password' => 'required|confirmed'
        ];

        return array_merge($postRules, $this->basicRules());
    }

    /**
     * rules that only apply to patch request
     *
     * @return array
     */
    private function patchRules()
    {
        $user = $this->route('user');

        $postRules = [
            'email'    => [
                'email',
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'confirmed'
        ];

        return array_merge($postRules, $this->basicRules());
    }
}
