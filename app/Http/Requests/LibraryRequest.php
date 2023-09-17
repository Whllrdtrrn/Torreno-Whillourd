<?php
namespace App\Http\Requests;
use App\Http\Requests\RequestManager;
use App\Rules\NoHtmlEmptyContent;

class LibraryRequest extends RequestManager
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
            'title' => "required|unique:books,title,{$id}",
            'description' => "required",
            'author' => "required",
        ];

        if (!$id) {
            $rules['file'] = 'required';
        }
        return $rules;
    }
    
    public function messages() {
        return [
            'required'  => "Field is required.",
            'file.max'  => "Image should not be exceeding to 5mb.",

        ];
    }
}