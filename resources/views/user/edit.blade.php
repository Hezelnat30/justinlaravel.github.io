@extends('template')

@section('main')
    <div id="user" class="container mb-3" style="margin-top: 4em">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3">Edit User</h2>
        {!! Form::model($user, [
            'method' => 'PATCH',
            'action' => ['App\Http\Controllers\UserController@update', $user->id],
        ]) !!}
        @include('user.form', ['submitButtonText' => 'Update User'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop
