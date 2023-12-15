@extends('template')

@section('main')
    <div id="kelas" class="container" style="margin-top: 4em">
        <h2 class="border-bottom border-dark border-2 text-center p-3 m-3"> Tambah Kelas </h2>
        {!! Form::open(['url' => 'kelas', 'files' => 'true']) !!}
        {{ csrf_field() }}
        @include('kelas.form', ['submitButtonText' => 'Tambah Kelas'])
        {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
