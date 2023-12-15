@extends('template')

@section('main')
    <div id="kelas" class="mt-5">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3">Edit Kelas</h2>
        {!! Form::model($kelas, [
            'method' => 'PATCH',
            'route' => ['kelas.update', $kelas->id],
        ]) !!}
        @include('kelas.form', ['submitButtonText' => 'Update Kelas'])

        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop
