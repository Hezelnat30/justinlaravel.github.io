@extends('template')

@section('main')
    <div id="siswa" class="container mb-3" style="margin-top: 4em">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3">Edit Siswa</h2>
        {!! Form::model($siswa, [
            'method' => 'PATCH',
            'action' => ['App\Http\Controllers\SiswaController@update', $siswa->id],
            'enctype' => 'multipart/form-data',
        ]) !!}
        @include('siswa.form', ['submitButtonText' => 'Update Siswa'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop
