@extends('layouts.scaffold')

@section('main')

<h1>Un Fabricant</h1>

<p>{{ link_to_route('fabricants.index', 'Retour à la liste des fabricants') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $fabricant->nom }}}</td>
                    <td>{{ link_to_route('fabricants.edit', 'Edit', array($fabricant->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('fabricants.destroy', $fabricant->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop