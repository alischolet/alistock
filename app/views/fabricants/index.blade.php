@extends('layouts.scaffold')

@section('main')

<h1>Liste des Fabricants</h1>

<p>{{ link_to_route('fabricants.create', 'Ajouter un fabricant') }}</p>

@if ($fabricants->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($fabricants as $fabricant)
                <tr>
                    <td>{{{ $fabricant->nom }}}</td>
                    <td>{{ link_to_route('fabricants.edit', 'Edit', array($fabricant->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('fabricants.destroy', $fabricant->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Il n'y a pas de fabricant
@endif

@stop