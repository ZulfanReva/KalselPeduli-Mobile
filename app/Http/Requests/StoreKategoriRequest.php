<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['owner']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'ikon' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:10240'], // 10240 KB = 10 MB
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'ikon.required' => 'Ikon harus diunggah.',
            'ikon.image' => 'Ikon harus berupa file gambar dengan format PNG, JPG atau JPEG.',
            'ikon.max' => 'Ukuran ikon maksimal 10MB.',
        ];
    }
}
