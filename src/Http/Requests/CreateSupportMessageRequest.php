<?php

namespace LiveControls\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupportMessageRequest extends FormRequest
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
            'priority' => 'required|integer|max:255',
            'content' => 'required|string',
            'support_ticket_id' => 'required'
        ];
    }
}
