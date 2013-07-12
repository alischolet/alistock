<?php

class FabricantsController extends BaseController {

    /**
     * Fabricant Repository
     *
     * @var Fabricant
     */
    protected $fabricant;

    public function __construct(Fabricant $fabricant)
    {
        $this->fabricant = $fabricant;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fabricants = $this->fabricant->all();

        return View::make('fabricants.index', compact('fabricants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('fabricants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Fabricant::$rules);

        if ($validation->passes())
        {
            $this->fabricant->create($input);

            return Redirect::route('fabricants.index');
        }

        return Redirect::route('fabricants.create')
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
        $fabricant = $this->fabricant->findOrFail($id);

        return View::make('fabricants.show', compact('fabricant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $fabricant = $this->fabricant->find($id);

        if (is_null($fabricant))
        {
            return Redirect::route('fabricants.index');
        }

        return View::make('fabricants.edit', compact('fabricant'));
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
        $validation = Validator::make($input, Fabricant::$rules);

        if ($validation->passes())
        {
            $fabricant = $this->fabricant->find($id);
            $fabricant->update($input);

            return Redirect::route('fabricants.show', $id);
        }

        return Redirect::route('fabricants.edit', $id)
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
        $this->fabricant->find($id)->delete();

        return Redirect::route('fabricants.index');
    }

}