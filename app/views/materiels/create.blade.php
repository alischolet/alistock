@extends('layouts.scaffold')

@section('main')

<h1>Create Materiel</h1>

{{ Form::open(array('route' => 'materiels.store')) }}
    <ul>
        <li>
            {{ Form::label('typeMateriel', 'Type de matériel:') }}
            {{ Form::select('idTypeMat',$typeMateriel) }}
        </li>
        
        <li>
            {{ Form::label('libelle', 'Libelle:') }}
            {{ Form::text('libelle') }}
        </li>

        <li>
            {{ Form::label('capacite', 'Capacite:') }}
            {{ Form::text('capacite') }}
        </li>

        <li>
            {{ Form::label('unité', 'Unité:') }}
            {{ Form::select('idUnite',$unites) }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


