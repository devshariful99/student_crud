<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:50',
            
        ];

        if($this->route('id')){
                $rules+=[
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                    'roll' => 'required|numeric|digits:6|unique:students,roll,' . $this->route('id'),
                    'reg' => 'required|numeric|digits:10|unique:students,reg,' . $this->route('id'),
                    'email' => 'required|email|unique:students,email,' . $this->route('id'),
                ];
        }else{
                $rules+=[
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                    'roll' => 'required|numeric|digits:6|unique:students,roll',
                    'reg' => 'required|numeric|digits:10|unique:students,reg',
                    'email' => 'required|email|unique:students,email',
                ];
            
        }
        return $rules;

    }
}
