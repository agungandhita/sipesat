<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePendudukRequest extends FormRequest
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
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string|max:255',
            'nik' => [
                'sometimes',
                'required',
                Rule::unique('penduduks', 'nik')->ignore($this->route('id')->warga_id, 'warga_id')
            ],
            'jenis_kelamin' => 'sometimes|required|in:laki-laki,perempuan'
        ];
    }
}
