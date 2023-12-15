@extends('template')

@section('main')
    <div id="user" class="container mb-3" style="margin-top: 4em">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3"> Tambah User </h2>
        {!! Form::open(['url' => 'user']) !!}
        @include('user.form', ['submitButtonText' => 'Tambah User'])
        {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
