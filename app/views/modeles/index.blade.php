@extends('layouts.scaffold')

@section('main')

<h1>All Modeles</h1>

<p>{{ link_to_route('modeles.create', 'Add new modele') }}</p>

@if ($modeles->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Reference</th>
				<th>IdFabricant</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($modeles as $modele)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no modeles
@endif

@stop