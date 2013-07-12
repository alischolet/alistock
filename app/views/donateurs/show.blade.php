@extends('layouts.scaffold')

@section('main')

<h1>Un Donateur</h1>

<p>{{ link_to_route('donateurs.index', 'Retour à la liste des donateurs') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $donateur->nom }}}</td>
                    <td>{{ link_to_route('donateurs.edit', 'Edit', array($donateur->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('donateurs.destroy', $donateur->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop