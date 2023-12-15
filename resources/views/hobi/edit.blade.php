@extends('template')

@section('main')
    <div id="hobi" class="mt-5">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3">Edit Hobi</h2>
        {!! Form::model($hobi, [
            'method' => 'PATCH',
            'action' => ['hobi.update', $hobi->id],
            'enctype' => 'multipart/form-data',
        ]) !!}
        @include('hobi.form', ['submitButtonText' => 'Update Hobi'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop
