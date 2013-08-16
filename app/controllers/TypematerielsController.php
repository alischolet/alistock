<?php

class TypematerielsController extends BaseController {

    /**
     * Typemateriel Repository
     *
     * @var Typemateriel
     */
    protected $typemateriel;

    public function __construct(Typemateriel $typemateriel)
    {
        $this->typemateriel = $typemateriel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $typemateriels = $this->typemateriel->all();

        return View::make('typemateriels.index', compact('typemateriels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('typemateriels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Typemateriel::$rules);

        if ($validation->passes())
        {
            $this->typemateriel->create($input);

            return Redirect::route('typemateriels.index');
        }

        return Redirect::route('typemateriels.create')
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
        $typemateriel = $this->typemateriel->findOrFail($id);

        return View::make('typemateriels.show', compact('typemateriel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $typemateriel = $this->typemateriel->find($id);

        if (is_null($typemateriel))
        {
            return Redirect::route('typemateriels.index');
        }

        return View::make('typemateriels.edit', compact('typemateriel'));
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
        $validation = Validator::make($input, Typemateriel::$rules);

        if ($validation->passes())
        {
            $typemateriel = $this->typemateriel->find($id);
            $typemateriel->update($input);

            return Redirect::route('typemateriels.show', $id);
        }

        return Redirect::route('typemateriels.edit', $id)
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
        $this->typemateriel->find($id)->delete();

        return Redirect::route('typemateriels.index');
    }

}