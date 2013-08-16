@extends('layouts.scaffold')

@section('main')

<h1>All Unites</h1>

<p>{{ link_to_route('unites.create', 'Add new unite') }}</p>

@if ($unites->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Libelle</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($unites as $unite)
                <tr>
                    <td>{{{ $unite->libelle }}}</td>
                    <td>{{ link_to_route('unites.edit', 'Edit', array($unite->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('unites.destroy', $unite->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no unites
@endif

@stop