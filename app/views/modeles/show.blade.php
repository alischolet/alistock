@extends('layouts.scaffold')

@section('main')

<h1>Show Modele</h1>

<p>{{ link_to_route('modeles.index', 'Return to all modeles') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Reference</th>
				<th>IdFabricant</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $modele->reference }}}</td>
					<td>{{{ $modele->idFabricant }}}</td>
                    <td>{{ link_to_route('modeles.edit', 'Edit', array($modele->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('modeles.destroy', $modele->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop