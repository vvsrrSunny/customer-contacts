<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $customerId = $this->route('customer')?->id;
        if ($this->route()->named('customers.store')) {
            return  [
                'name' => 'required|string|max:255|unique:customers,name,' . $customerId,
                'reference' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'start_date' => 'required|date',
                'description' => 'nullable|string',
            ];
        }

        return [
            'name' => 'required|string|max:255|unique:customers,name,' . $customerId,
            'reference' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'start_date' => 'required|date',
            'description' => 'nullable|string',
        ];
    }
}
