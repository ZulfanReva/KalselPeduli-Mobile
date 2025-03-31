<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProyekPenggalanganRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'integer'], // ID kategori harus ada di tabel kategoris
            'target_donasi' => ['required', 'integer', 'min:100000'],
            'deskripsi' => ['required', 'string', 'max:1000'],
            'foto' => ['sometimes', 'image', 'mimes:jpg,jpeg,png', 'max:10240'], // Gambar max 10MB
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama proyek harus diisi.',
            'nama.max' => 'Nama proyek maksimal 255 karakter.',

            'kategori_id.required' => 'Kategori harus dipilih.',

            'target_donasi.required' => 'Target donasi harus diisi.',
            'target_donasi.integer' => 'Target donasi harus berupa angka.',
            'target_donasi.min' => 'Target donasi minimal Rp100.000.',

            'deskripsi.required' => 'Deskripsi proyek harus diisi.',
            'deskripsi.max' => 'Deskripsi proyek maksimal 1000 karakter.',

            'foto.image' => 'Foto harus berupa gambar (JPG, JPEG, atau PNG).',
            'foto.max' => 'Ukuran foto maksimal 10MB.',
        ];
    }
}
