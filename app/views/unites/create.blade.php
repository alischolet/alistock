@extends('layouts.scaffold')

@section('main')

<h1>Create Unite</h1>

{{ Form::open(array('route' => 'unites.store')) }}
    <ul>
        <li>
            {{ Form::label('libelle', 'Libelle:') }}
            {{ Form::text('libelle') }}
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


