<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'produto_id' => 'required|exists:produtos,id|integer|min:1',
            'quantidade' => 'required|numeric|min:1|integer',
        ];
    }

    public function attributes()
    {
        return [
            'produto_id' => 'produto',
        ];
    }
}
