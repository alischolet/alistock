<?php

class ModelesController extends BaseController {

    /**
     * Modele Repository
     *
     * @var Modele
     */
    protected $modele;

    public function __construct(Modele $modele)
    {
        $this->modele = $modele;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $modeles = $this->modele->all();

        return View::make('modeles.index', compact('modeles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $fabricants = Fabricant::lists('nom','id');
        if (empty($fabricants)) {
            return Redirect::route('fabricants.create')
            ->with('message', "Il n'y a aucun Fabricant. Créer un fabricant ensuite ajouter un modèle");
        }
        return View::make('modeles.create', compact('fabricants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Modele::$rules);

        if ($validation->passes())
        {
            $this->modele->create($input);

            return Redirect::route('modeles.index');
        }

        return Redirect::route('modeles.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $modele = $this->modele->findOrFail($id);

        return View::make('modeles.show', compact('modele'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $modele = $this->modele->find($id);
        $fabricants = Fabricant::lists('nom','id');

        if (is_null($modele))
        {
            return Redirect::route('modeles.index');
        }

        return View::make('modeles.edit', compact('modele'), compact('fabricants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Modele::$rules);

        if ($validation->passes())
        {
            $modele = $this->modele->find($id);
            $modele->update($input);

            return Redirect::route('modeles.show', $id);
        }

        return Redirect::route('modeles.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->modele->find($id)->delete();

        return Redirect::route('modeles.index');
    }

}