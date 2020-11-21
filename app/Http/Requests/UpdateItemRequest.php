<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string|min:3|max:255|required',
            'quantity' => 'integer|min:0|required',
            'price' => 'numeric||min:0|required',
            'category_id' => 'integer|exists:categories,id',
            'description' => 'string|nullable',
        ];
    }
}
