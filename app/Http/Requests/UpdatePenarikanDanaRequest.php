<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenarikanDanaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasAnyRole(['owner']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bukti_penarikan' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:10240'], // Opsional, hanya gambar JPG/JPEG/PNG, max 10MB
        ];
    }

    public function messages()
    {
        return [
            'bukti_penarikan.image' => 'Bukti penarikan harus berupa gambar (JPG, JPEG, atau PNG).',
            'bukti_penarikan.max' => 'Ukuran bukti penarikan maksimal 10MB.',
        ];
    }
}
