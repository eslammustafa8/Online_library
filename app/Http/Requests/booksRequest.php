<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class booksRequest extends FormRequest
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
            'book_name'   => 'required|string',
            'author'      => 'required|string',
           'book_file' => 'required|file|mimes:pdf,docx',
           'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric', // Corrected typo and validation rule
        ];
    }
}
