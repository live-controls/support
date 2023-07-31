<?php

namespace LiveControls\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupportTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'priority' => 'required|integer|max:255',
            'content' => 'required|string',
            'status' => 'required|integer',
            'open' => 'required|boolean'
        ];
    }
}
