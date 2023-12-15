<div class="pencarian">
    {!! Form::open(['url' => 'siswa/cari', 'method' => 'GET']) !!}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group shadow-sm">
                {!! Form::select(
                    'id_kelas',
                    ['' => 'Pilih Kelas'] + $kelas->pluck('nama_kelas', 'id')->toArray(),
                    !empty($id_kelas) ? $id_kelas : null,
                    [
                        'id' => 'id_kelas',
                        'class' => 'form-select',
                    ],
                ) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group shadow-sm">
                {!! Form::select(
                    'jenis_kelamin',
                    ['' => 'Pilih Gender', 'L' => 'Laki-laki', 'P' => 'Perempuan'],
                    !empty($jenis_kelamin) ? $jenis_kelamin : null,
                    ['id' => 'jenis_kelamin', 'class' => 'form-select'],
                ) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group shadow-sm">
                {!! Form::text('kata_kunci', !empty($kata_kunci) ? $kata_kunci : null, [
                    'class' => 'form-control',
                    'placeholder' => 'Masukkan Nama Siswa',
                ]) !!}
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
