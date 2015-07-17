<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SiteInformationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name' => 'required',
            'site_email' => 'required|email',
            'email' => 'required|email',
            'password' => 'required',
            'password_again' => 'required|same:password',
            'APP_TIMEZONE' => 'timezone'
        ];
    }
}
