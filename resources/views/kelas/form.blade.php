<div class="mx-auto" style="max-width: 400px;">
    <div
        class="form-group mb-2 @if (isset($kelas)) has-{{ $errors->has('nama_kelas') ? 'error' : 'success' }} @endif">
        @if (isset($kelas))
            {!! Form::hidden('id', $kelas->id) !!}
        @endif

        {!! Form::label('nama_kelas', 'Nama Kelas:', ['class' => 'control-label form-label fw-bold']) !!}
        {!! Form::text('nama_kelas', null, ['class' => 'form-control']) !!}

        @if ($errors->has('nama_kelas'))
            <div class="text-{{ $errors->has('nama_kelas') ? 'danger' : 'success' }}">{{ $errors->first('nama_kelas') }}
            </div>
        @endif
    </div>

    <div class="form-group mb-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
