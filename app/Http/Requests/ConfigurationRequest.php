<?php

namespace BBBController\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ConfigurationRequest extends FormRequest
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
     * @return array  |mimes:jpeg,png,jpg,gif,svg
     */
    public function rules()
    {
        if(Request::has('brand_form')){
            return [
                'company-name' => 'required|min:3|max:20',
                'logo-path' => 'required',
                'activity' => 'required',
            ];
        }
        elseif (Request::has('general_form')){
            return [
                'country' => 'required',
                'timezone' => 'required',
                'records-path' => 'required',
            ];
        }

    }
    public function attributes()
    {
        return [
            'company-name' => 'Company Name',
            'activity' => 'Company Activity',
            'logo-path' => 'Company Logo',
            'country' => 'Country',
            'timezone' => 'timezone',
            'records-path' => 'Records Path'

        ];
    }
//    public function messages()
//    {
//        return [
//            'company-name.required' => 'The company-name field is required.',
//            'company-name.size:3' => 'The company name must be at least 3 characters.',
//            'activity.required' => 'The company activity field is required.',
//            'logo-path.required' => 'The company logo field is required.',
//
//        ];
//    }
}
