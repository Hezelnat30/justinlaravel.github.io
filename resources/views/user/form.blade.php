<div class="mx-auto" style="max-width: 400px;">
    <div
        class="form-group mb-2 @if (isset($user)) has-{{ $errors->has('name') ? 'error' : 'success' }} @endif">
        @if (isset($user))
            {!! Form::hidden('id', $user->id) !!}
        @endif
        {!! Form::label('name', 'Nama :', ['class' => 'control-label form-label fw-bold']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <div class="text-{{ $errors->has('name') ? 'danger' : 'success' }}">{{ $errors->first('name') }}</div>
        @endif
    </div>

    <div
        class="form-group mb-2 @if (isset($user)) has-{{ $errors->has('email') ? 'error' : 'success' }} @endif">
        @if (isset($user))
            {!! Form::hidden('id', $user->id) !!}
        @endif
        {!! Form::label('email', 'Email :', ['class' => 'control-label form-label fw-bold']) !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        @if ($errors->has('email'))
            <div class="text-{{ $errors->has('email') ? 'danger' : 'success' }}">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <div
        class="form-group mb-2 @if (isset($user)) has-{{ $errors->has('level') ? 'error' : 'success' }} @endif">
        {!! Form::label('level', 'Level :', ['class' => 'control-label form-label fw-bold']) !!}
        <div class="radio">
            <label>{!! Form::radio('level', 'operator', isset($user) && $user->level == 'operator') !!} Operator</label>
            <br>
            <label>{!! Form::radio('level', 'admin', isset($user) && $user->level == 'admin') !!} Administrator</label>
        </div>
        @if ($errors->has('level'))
            <div class="text-{{ $errors->has('level') ? 'danger' : 'success' }}">{{ $errors->first('level') }}</div>
        @endif
    </div>

    <div
        class="form-group mb-2 @if (!isset($user)) has-{{ $errors->has('password') ? 'error' : 'success' }} @endif">
        {!! Form::label('password', 'Password :', ['class' => 'control-label form-label fw-bold']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        @if ($errors->has('password'))
            <div class="text-{{ $errors->has('password') ? 'danger' : 'success' }}">{{ $errors->first('password') }}
            </div>
        @endif
    </div>

    <div
        class="form-group mb-2 @if (!isset($user)) has-{{ $errors->has('password_confirmation') ? 'error' : 'success' }} @endif">
        {!! Form::label('password_confirmation', 'Password Confirmation :', [
            'class' => 'control-label form-label fw-bold',
        ]) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        @if ($errors->has('password_confirmation'))
            <div class="text-{{ $errors->has('password_confirmation') ? 'danger' : 'success' }}">
                {{ $errors->first('password_confirmation') }}
            </div>
        @endif
    </div>

    <div class="form-group mb-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
