<?php

class MaterielsController extends BaseController {

    /**
     * Materiel Repository
     *
     * @var Materiel
     */
    protected $materiel;

    public function __construct(Materiel $materiel)
    {
        $this->materiel = $materiel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $materiels = $this->materiel->all();

        return View::make('materiels.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('materiels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Materiel::$rules);

        if ($validation->passes())
        {
            $this->materiel->create($input);

            return Redirect::route('materiels.index');
        }

        return Redirect::route('materiels.create')
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
        $materiel = $this->materiel->findOrFail($id);

        return View::make('materiels.show', compact('materiel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $materiel = $this->materiel->find($id);

        if (is_null($materiel))
        {
            return Redirect::route('materiels.index');
        }

        return View::make('materiels.edit', compact('materiel'));
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
        $validation = Validator::make($input, Materiel::$rules);

        if ($validation->passes())
        {
            $materiel = $this->materiel->find($id);
            $materiel->update($input);

            return Redirect::route('materiels.show', $id);
        }

        return Redirect::route('materiels.edit', $id)
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
        $this->materiel->find($id)->delete();

        return Redirect::route('materiels.index');
    }

}