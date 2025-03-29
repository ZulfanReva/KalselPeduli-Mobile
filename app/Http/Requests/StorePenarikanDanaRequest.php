<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenarikanDanaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['owner|pemohon_penggalangan']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() : array
    {
        return [
            'nama_bank' => ['required', 'string', 'max:100'], // Wajib diisi, string, max 100 karakter
            'nama_rekening' => ['required', 'string', 'max:255'], // Wajib diisi, string, max 255 karakter
            'nomor_rekening' => ['required', 'string', 'digits_between:10,20'], // Wajib diisi, hanya angka, panjang 10-20 digit
        ];
    }

    public function messages()
    {
        return [
            'nama_bank.required' => 'Nama bank harus diisi.',
            'nama_bank.string' => 'Nama bank harus berupa teks.',

            'nama_rekening.required' => 'Nama pemilik rekening harus diisi.',
            'nama_rekening.string' => 'Nama pemilik rekening harus berupa teks.',

            'nomor_rekening.required' => 'Nomor rekening harus diisi.',
            'nomor_rekening.digits_between' => 'Nomor rekening harus memiliki panjang antara 10 hingga 20 digit.',
        ];
    }
}
