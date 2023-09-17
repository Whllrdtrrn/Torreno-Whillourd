<?php
namespace App\Http\Requests;
use App\Http\Requests\RequestManager;
use App\Rules\NoHtmlEmptyContent;

class ProfileRequest extends RequestManager
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id')?:0;
        $rules = [
            'name' => "required",
            'email' => "required",
        ];
    
        return $rules;
    }
    
    public function messages() {
        return [
            'required'  => "Field is required.",
        ];
    }
}