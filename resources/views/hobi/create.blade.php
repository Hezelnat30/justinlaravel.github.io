@extends('template')

@section('main')
    <div id="hobi" class="mt-5">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3"> Tambah Hobi </h2>
        {!! Form::open(['url' => 'hobi', 'files' => 'true']) !!}
        {{ csrf_field() }}
        @include('hobi.form', ['submitButtonText' => 'Tambah Hobi'])
        {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
