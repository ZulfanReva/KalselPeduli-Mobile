<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaporanPenggalanganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['pemohon_penggalangan']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'], // Wajib diisi, string, max 255 karakter
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:10240'], // Opsional, hanya PNG/JPG max 10MB
            'catatan' => ['nullable', 'string', 'max:1000'], // Opsional, string, max 1000 karakter
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama laporan harus diisi.',
            'nama.max' => 'Nama laporan maksimal 255 karakter.',
            'foto.image' => 'Foto harus berupa gambar (JPG, JPEG, atau PNG).',
            'foto.mimes' => 'Format foto harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 10MB.',
            'catatan.max' => 'Catatan maksimal 1000 karakter.',
        ];
    }
}
