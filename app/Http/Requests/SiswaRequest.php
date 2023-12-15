<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $siswa = $this->route('siswa');

        // Cek apakah CREATE / UPDATE
        if ($this->isMethod('PATCH')) {
            $nisn_rules = 'required|string|size:4|unique:siswa,nisn,' . $siswa->id;
            $telepon_rules = [
                'sometimes',
                'numeric',
                'digits_between:10,15',
                Rule::unique('telepon', 'nomor_telepon')->ignore($siswa->id, 'id_siswa'),
            ];
            $foto_rules = [];
        } else {
            $nisn_rules = 'required|string|size:4|unique:siswa,nisn';
            $telepon_rules = 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon';
            $foto_rules = [
                'required',
                'image',
                'max:500',
                'mimes:jpeg,jpg,bmp,png',
            ];
        }

        return [
            'nisn' => $nisn_rules,
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => $telepon_rules,
            'id_kelas' => 'required',
            'foto' => $foto_rules,
        ];
    }
}
