@extends('layouts.scaffold')

@section('main')

<h1>Show Materiel</h1>

<p>{{ link_to_route('materiels.index', 'Return to all materiels') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Libelle</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $materiel->libelle }}}</td>
                    <td>{{ link_to_route('materiels.edit', 'Edit', array($materiel->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('materiels.destroy', $materiel->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop