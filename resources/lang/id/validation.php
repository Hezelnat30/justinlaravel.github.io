<?php

return [
    'accepted'             => 'Kolom :attribute harus diterima.',
    'active_url'           => 'Kolom :attribute bukan URL yang valid.',
    'after'                => 'Kolom :attribute harus tanggal setelah :date.',
    'alpha'                => 'Kolom :attribute hanya boleh berisi huruf.',
    'present'              => 'Kolom :attribute harus ada.',
    'regex'                => 'Format :attribute tidak valid.',
    'required'             => 'Kolom :attribute harus diisi.',
    'custom'               => [
        'nisn' => [
            'required' => 'Kolom NISN harus diisi.',
            'string' => 'Kolom NISN harus berupa string.',
            'size' => 'Kolom NISN harus:size angka.',
            'unique' => 'NISN Sudah terpakai.',
            // Membuat pesan kustom validasi NISN
        ],
        'nama_siswa' => [
            'required' => 'Kolom Nama Siswa harus diisi.',
            'string' => 'Kolom NAMA SISWA harus berupa string.',
            'max' => 'Kolom NAMA SISWA tidak boleh lebih dari :max karakter.',
            // Membuat pesan kustom validasi Nama Siswa
        ],
        'jenis_kelamin' => [
            'required' => 'Kolom Jenis Kelamin harus diisi.',
            'in' => 'Kolom JENIS KELAMIN harus diisi L atau P.'
            // Membuat pesan kustom validasi Jenis Kelamin
        ],
        'tanggal_lahir' => [
            'required' => 'Kolom Tanggal Lahir harus diisi.',
            'date' => 'Kolom TANGGAL LAHIR harus diisi format tanggal yang benar.',
            // Membuat pesan kustom validasi Tanggal Lahir
        ],
        'nomor_telepon' => [
            'required' => 'Kolom Nomor Telepon harus diisi.',
            'numeric' => 'Kolom Nomor Telepon harus berupa angka.',
            'digits_between' => 'Kolom Nomor Telepon harus memiliki panjang antara :min hingga :max digit.',
            'unique' => 'Nomor Telepon sudah terpakai.',
        ],
        'id_kelas' => [
            'required' => 'Wajib Memilih Kelas.',
        ],
        'foto' => [
            'image' => 'Kolom FOTO hanya boleh berisi file gambar.',
            'max' => 'Kolom FOTO tidak boleh lebih dari 500 KB.',
            'mimes' => 'Kolom FOTO hanya boleh diisi file *.jpg, *.jpeg, *.bmp, *.png.',
        ],
        'nama_kelas' => [
            'required' => 'Nama kelas harus diisi.',
            'string' => 'Nama kelas harus berupa karakter valid.',
            'max' => 'Nama kelas Maksimum 20 Karakter',
        ],
        'nama_hobi' => [
            'required' => 'Nama hobi harus diisi.',
            'string' => 'Nama hobi harus berupa karakter valid.',
            'max' => 'Nama kelas Maksimum 20 Karakter',
        ],
        'email' => [
            'required' => 'Nama Email harus diisi.',
            'email' => 'Email harus valid.',
            'max' => 'Email maximum 100 Karakter',
            'unique' => 'Email Sudah Terdaftar!',
        ],
        'password' => [
            'Confirmed' => 'Password tidak cocok dengan kolom konfirmasi password.',
            'min' => 'Password minimal 6 Karakter.',
        ],
        // Anda dapat menambahkan pesan kustom untuk kolom atau aturan validasi lainnya di sini.
    ],
    // ... dan aturan validasi lainnya ...
];
