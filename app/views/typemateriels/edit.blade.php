@extends('layouts.scaffold')

@section('main')

<h1>Edit Typemateriel</h1>
{{ Form::model($typemateriel, array('method' => 'PATCH', 'route' => array('typemateriels.update', $typemateriel->id))) }}
    <ul>
        <li>
            {{ Form::label('libelle', 'Libelle:') }}
            {{ Form::text('libelle') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('typemateriels.show', 'Cancel', $typemateriel->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop