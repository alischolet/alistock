@extends('layouts.scaffold')

@section('main')

<h1>Create Donateur</h1>

{{ Form::open(array('route' => 'donateurs.store')) }}
    <ul>
        <li>
            {{ Form::label('nom', 'Nom:') }}
            {{ Form::text('nom') }}
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


