@extends('layouts.scaffold')

@section('main')

<h1>Edit Modele</h1>
{{ Form::model($modele, array('method' => 'PATCH', 'route' => array('modeles.update', $modele->id))) }}
    <ul>
        <li>
            {{ Form::label('reference', 'Reference:') }}
            {{ Form::text('reference') }}
        </li>

        <li>
            {{ Form::select('idFabricant', $fabricants) }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('modeles.show', 'Cancel', $modele->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop