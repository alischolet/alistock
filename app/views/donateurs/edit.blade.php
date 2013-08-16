@extends('layouts.scaffold')

@section('main')

<h1>Modification du Donateur</h1>
{{ Form::model($donateur, array('method' => 'PATCH', 'route' => array('donateurs.update', $donateur->id))) }}
    <ul>
        <li>
            {{ Form::label('nom', 'Nom:') }}
            {{ Form::text('nom') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('donateurs.show', 'Cancel', $donateur->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop