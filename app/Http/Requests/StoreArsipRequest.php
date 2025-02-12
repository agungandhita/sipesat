<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArsipRequest extends FormRequest
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
            'perihal' => 'required|string',
            'jenis_surat' => 'required',
            'asal_surat' => 'nullable|string',
            'tanggal_surat' => 'required|date',
            'keterangan' => 'nullable|string',
            'file_surat' => 'required|mimes:pdf|max:10240'
        ];
    }
}
