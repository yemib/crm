<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
        return Article::$rules;
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return Article::$messages;
    }
}
