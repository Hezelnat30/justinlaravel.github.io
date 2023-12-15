<div class="mx-auto" style="max-width: 400px;">
    <div
        class="form-group mb-2 @if (isset($hobi)) has-{{ $errors->has('nama_hobi') ? 'error' : 'success' }} @endif">
        @if (isset($hobi))
            {!! Form::hidden('id', $hobi->id) !!}
        @endif

        {!! Form::label('nama_hobi', 'Nama Hobi:', ['class' => 'control-label form-label fw-bold']) !!}
        {!! Form::text('nama_hobi', null, ['class' => 'form-control']) !!}

        @if ($errors->has('nama_hobi'))
            <div class="text-{{ $errors->has('nama_hobi') ? 'danger' : 'success' }}">{{ $errors->first('nama_hobi') }}
            </div>
        @endif
    </div>

    <div class="form-group mb-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
