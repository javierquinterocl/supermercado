<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')){
            return [
                
                'name' => 'required|string|max:255|unique:products,name',
                'mail' => 'nullable',
                'document' => 'nullable',
                'address' => 'required',
                'phone' => 'required|min:0',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                
            ];	
        } else if(request()->isMethod('put')){
            return [
                
                'name' => 'required|string|max:255',
                'mail' => 'nullable',
                'document' => 'nullable',
                'address' => 'required',
                'phone' => 'required|min:0',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
            ];
        }else{

            return[
                'name' => 'required|string|max:255',
                'mail' => 'nullable|max:255',
                'document' => 'nullable',
                'address' => 'required',
                'phone' => 'required|min:0',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
            ];
        }
    }
    public function attributes()
    {
        return [
			'client_id' => 'cliente',
			
			'image' => 'fotografía',
			
			
        ];
    }
}
