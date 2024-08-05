<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product'=>'required',
            'name' => 'required',
            'product_name' => 'required',
            'mrp' => 'required',
            'sellprice' => 'required',
            'shopkeeper' => 'required',
            'expiry' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->customer,
        ];
    }
    public function messages()
    {
        return
            [
                'product.required' => 'pdf','jpg','png','docx',
                'name.required' => 'The customer field is required.',
                'product_name.required' => ' The product field name is required.',
                'mrp.required' => 'The MRP field is required.',
                'sellprice.required' => 'The sellprice field is required',
                'shopkeeper.required'=>'The Shopkeeper field is required',
                'expiry.required' => 'The sellprice is required',
                'country.required'=>'The Country field is required',
                'state.required'=>'The State field is required',
                'city.required'=>'The City field is required',
                'address.required|max:10' => 'The address is required',
                'email.required' => 'The email field is required.', 
                'email.email' => 'Please enter a valid email address.',
            

            ];
    }
}
