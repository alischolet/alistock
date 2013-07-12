@extends('layouts.scaffold')

@section('main')

<h1>Modification d'un Fabricant</h1>
{{ Form::model($fabricant, array('method' => 'PATCH', 'route' => array('fabricants.update', $fabricant->id))) }}
    <ul>
        <li>
            {{ Form::label('nom', 'Nom:') }}
            {{ Form::text('nom') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('fabricants.show', 'Cancel', $fabricant->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop