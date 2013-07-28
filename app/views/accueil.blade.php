@extends('layouts.scaffold')

@section('main')

<p>{{ link_to_route('donateurs.index', 'Gérer les donnateurs') }}</p>
<p>{{ link_to_route('fabricants.index', 'Gérer les fabricants') }}</p>
<p>{{ link_to_route('modeles.index', 'Gérer les modèles') }}</p>
<p>{{ link_to_route('materiels.index', 'Gérer le materiels') }}</p>
<p>{{ link_to_route('typemateriels.index', 'Gérer les types de matériel') }}</p>
<p>{{ link_to_route('unites.index', 'Gérer les unitées') }}</p>

@stop