@extends('layouts.scaffold')

@section('main')

<h1>Edit Materiel</h1>
{{ Form::model($materiel, array('method' => 'PATCH', 'route' => array('materiels.update', $materiel->id))) }}
    <ul>
        <li>
            {{ Form::label('libelle', 'Libelle:') }}
            {{ Form::text('libelle') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('materiels.show', 'Cancel', $materiel->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop