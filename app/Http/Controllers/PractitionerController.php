<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PractitionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $practitioners = Practitioner::all();

        return View::make('practitioners/index')
            ->with('practitioners', $practitioners);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return View::make('practitioners/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'practitioner_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('practitioners/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $practitioner = new practitioner;
            $practitioner->name = $request->get('name');
            $practitioner->email = $request->get('email');
            $practitioner->practitioner_level = $request->get('practitioner_level');
            $practitioner->save();

            // redirect
            Session::flash('message', 'Successfully created practitioner!');
            return Redirect::to('practitioners');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $practitioner = Practitioner::find($id);

        // show the view and pass the practitioner to it
        return View::make('practitioner.show')
            ->with('practitioner', $practitioner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}
