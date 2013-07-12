@extends('layouts.scaffold')

@section('main')

<h1>All Donateurs</h1>

<p>{{ link_to_route('donateurs.create', 'Add new donateur') }}</p>

@if ($donateurs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($donateurs as $donateur)
                <tr>
                    <td>{{{ $donateur->nom }}}</td>
                    <td>{{ link_to_route('donateurs.edit', 'Edit', array($donateur->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('donateurs.destroy', $donateur->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no donateurs
@endif

@stop