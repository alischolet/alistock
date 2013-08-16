<?php

class DonateursController extends BaseController {

    /**
     * Donateur Repository
     *
     * @var Donateur
     */
    protected $donateur;

    public function __construct(Donateur $donateur)
    {
        $this->donateur = $donateur;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $donateurs = $this->donateur->all();

        return View::make('donateurs.index', compact('donateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('donateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Donateur::$rules);

        if ($validation->passes())
        {
            $this->donateur->create($input);

            return Redirect::route('donateurs.index');
        }

        return Redirect::route('donateurs.create')
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
        $donateur = $this->donateur->findOrFail($id);

        return View::make('donateurs.show', compact('donateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $donateur = $this->donateur->find($id);

        if (is_null($donateur))
        {
            return Redirect::route('donateurs.index');
        }

        return View::make('donateurs.edit', compact('donateur'));
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
        $validation = Validator::make($input, Donateur::$rules);

        if ($validation->passes())
        {
            $donateur = $this->donateur->find($id);
            $donateur->update($input);

            return Redirect::route('donateurs.show', $id);
        }

        return Redirect::route('donateurs.edit', $id)
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
        $this->donateur->find($id)->delete();

        return Redirect::route('donateurs.index');
    }

}