@extends('layouts.scaffold')

@section('main')

<h1>Show Typemateriel</h1>

<p>{{ link_to_route('typemateriels.index', 'Return to all typemateriels') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Libelle</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $typemateriel->libelle }}}</td>
                    <td>{{ link_to_route('typemateriels.edit', 'Edit', array($typemateriel->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('typemateriels.destroy', $typemateriel->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop