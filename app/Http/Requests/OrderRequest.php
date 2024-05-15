<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenRequest extends FormRequest
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
        
            //

            if(request()->isMethod('post')){
                return [
                    
                    'date_order' => 'required|date',
                    'total_amount' => 'required|numeric',
                    'route' => 'required|string',
                    'status' => 'required|string',
                    'registerby' => 'required|string',
                    'client_id' => 'required|integer',
                    
                ];	
            }
        
    }
}
