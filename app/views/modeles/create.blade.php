@extends('layouts.scaffold')

@section('main')

<h1>Create Modele</h1>

{{ Form::open(array('route' => 'modeles.store')) }}
    <ul>
        <li>
            {{ Form::label('reference', 'Reference:') }}
            {{ Form::text('reference') }}
        </li>

        <li>
            {{ Form::select('idFabricant',$fabricants) }}
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


