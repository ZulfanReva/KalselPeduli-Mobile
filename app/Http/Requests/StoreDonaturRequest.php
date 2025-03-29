<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonaturRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'nama' => ['required', 'string', 'max:255'], // Wajib diisi, string, max 255 karakter
            'nomor_whatsapp' => ['required', 'string', 'digits_between:9,13'], // Harus angka, panjang 9-13 digit
            'bukti_pembayaran' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:10240'], // Opsional, hanya PNG/JPG max 10MB
            'catatan' => ['required', 'string', 'max:1000'], // Opsional, max 500 karakter
        ];
    }

    public function messages()
    {
        return [
            'nomor_whatsapp.digits_between' => 'Nomor WhatsApp harus terdiri dari 9 hingga 13 digit.',
            'nomor_whatsapp.string' => 'Nomor WhatsApp hanya boleh berisi angka.',
            'bukti_pembayaran.image' => 'Bukti pembayaran harus berupa gambar (JPG, JPEG, atau PNG).',
            'bukti_pembayaran.max' => 'Ukuran gambar maksimal 10MB.',
            'catatan.max' => 'Catatan maksimal 1000 karakter.',
        ];
    }
}
