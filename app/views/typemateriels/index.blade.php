@extends('layouts.scaffold')

@section('main')

<h1>All Typemateriels</h1>

<p>{{ link_to_route('typemateriels.create', 'Add new typemateriel') }}</p>

@if ($typemateriels->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Libelle</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($typemateriels as $typemateriel)
                <tr>
                    <td>{{{ $typemateriel->libelle }}}</td>
                    <td>{{ link_to_route('typemateriels.edit', 'Edit', array($typemateriel->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('typemateriels.destroy', $typemateriel->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no typemateriels
@endif

@stop