<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="form-group mb-2 @error('nisn') {{ 'has-error' }} @else {{ 'has-success' }} @enderror">
                {!! Form::label('nisn', 'NISN :', ['class' => 'control-label form-label fw-bold']) !!}
                {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
                @error('nisn')
                    <div class="help-block text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2 @error('nama_siswa') {{ 'has-error' }} @else {{ 'has-success' }} @enderror">
                {!! Form::label('nama_siswa', 'Nama:', ['class' => 'form-label fw-bold']) !!}
                {!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}
                @error('nama_siswa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2 @error('tanggal_lahir') {{ 'has-error' }} @else {{ 'has-success' }} @enderror">
                {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class' => 'form-label fw-bold']) !!}
                {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div
                class="form-group mb-2 @error('jenis_kelamin') {{ 'has-error' }} @else {{ 'has-success' }} @enderror">
                {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class' => 'form-label fw-bold']) !!}
                <div class="form-check">
                    <div class="radio">
                        <label>{!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
                        <label>{!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
                    </div>
                </div>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div
                class="form-group mb-2 @error('nomor_telepon') {{ 'has-error' }} @else {{ 'has-success' }} @enderror">
                {!! Form::label('nomor_telepon', 'Telepon:', ['class' => 'form-label fw-bold']) !!}
                {!! Form::text('nomor_telepon', $telepon->nomor_telepon ?? null, ['class' => 'form-control']) !!}
                @error('nomor_telepon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2 @error('hobi_siswa') {{ 'has-error' }} @else {{ 'has-success' }} @enderror">
                {!! Form::label('hobi', 'Hobi:', ['class' => 'form-label fw-bold']) !!}

                @foreach ($list_hobi as $hobi)
                    <div class="form-check">
                        {!! Form::label('hobi_siswa' . $hobi->id, $hobi->nama_hobi, ['class' => 'form-check-label']) !!}
                        {!! Form::checkbox('hobi_siswa[]', $hobi->id, null, [
                            'class' => 'form-check-input',
                            'id' => 'hobi_' . $hobi->id,
                        ]) !!}
                    </div>
                @endforeach

                @error('hobi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                {!! Form::label('foto', 'Foto:', ['class' => 'form-label fw-bold']) !!}
                @if ($siswa->foto && $siswa->foto !== 'dummy.jpg')
                    <img src="{{ asset('fotoupload/' . $siswa->foto) }}" alt="Foto Siswa"
                        class="img-thumbnail rounded-circle img-fluid m-3" style="width:175px; height:175px;">
                @endif
                {!! Form::file('foto', ['class' => 'form-control']) !!}
                @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2 @error('id_kelas') {{ 'has-error' }} @else {{ 'has-success' }} @enderror">
                {!! Form::label('id_kelas', 'Kelas:', ['class' => 'form-label fw-bold']) !!}
                {!! Form::select('id_kelas', ['' => 'Pilih Kelas'] + $kelas->pluck('nama_kelas', 'id')->all(), null, [
                    'class' => 'form-select',
                ]) !!}
                @error('id_kelas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-1 mt-3">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
