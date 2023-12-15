@extends('template')

@section('main')
    <div id="siswa" class="mb-3" style="margin-top: 4em">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3"> Tambah Siswa </h2>
        {!! Form::open(['url' => 'siswa', 'files' => 'true']) !!}
        {{ csrf_field() }}
        @include('siswa.form', ['submitButtonText' => 'Tambah Siswa'])
        {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
