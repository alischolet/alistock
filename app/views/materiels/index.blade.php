@extends('layouts.scaffold')

@section('main')

<h1>All Materiels</h1>

<p>{{ link_to_route('materiels.create', 'Add new materiel') }}</p>

@if ($materiels->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Libelle</th>
				<th>Capacite</th>
				<th>IdTypeMat</th>
				<th>IdUnite</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($materiels as $materiel)
                <tr>
                    <td>{{{ $materiel->libelle }}}</td>
					<td>{{{ $materiel->capacite }}}</td>
					<td>{{{ $materiel->idTypeMat }}}</td>
					<td>{{{ $materiel->idUnite }}}</td>
                    <td>{{ link_to_route('materiels.edit', 'Edit', array($materiel->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('materiels.destroy', $materiel->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no materiels
@endif

@stop