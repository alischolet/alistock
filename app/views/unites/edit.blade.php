@extends('layouts.scaffold')

@section('main')

<h1>Edit Unite</h1>
{{ Form::model($unite, array('method' => 'PATCH', 'route' => array('unites.update', $unite->id))) }}
    <ul>
        <li>
            {{ Form::label('libelle', 'Libelle:') }}
            {{ Form::text('libelle') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('unites.show', 'Cancel', $unite->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop