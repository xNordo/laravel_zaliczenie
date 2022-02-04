<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;
use Illuminate\Http\RedirectResponse;
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
    public function index(): \Illuminate\Contracts\View\View
    {
        $practitioners = Practitioner::all();

        return View::make('practitioners/index')
            ->with('practitioners', $practitioners);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return View::make('practitioners/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = $this->resolveRules();
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('practitioners/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $practitioner = new Practitioner();
            $this->assignPractitionerData($request, $practitioner);
            $practitioner->save();

            Session::flash('message', 'Successfully created practitioner!');
            return Redirect::to('practitioners');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $practitioner = Practitioner::find($id);

        // show the view and pass the practitioner to it
        return View::make('practitioners.show')
            ->with('practitioner', $practitioner);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $practitioner = Practitioner::find($id);

        return View::make('practitioners.edit')
            ->with('practitioner', $practitioner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('practitioners/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $practitioner = Practitioner::find($id);
            $practitioner->name = $request->get('name');
            $this->assignPractitionerData($request, $practitioner);
            $practitioner->save();

            // redirect
            Session::flash('message', 'Successfully updated practitioner!');
            return Redirect::to('practitioners');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $shark = Practitioner::find($id);
        $shark->delete();

        Session::flash('message', 'Successfully deleted the practitioner!');
        return Redirect::to('practitioners');
    }

    private function assignPractitionerData(Request $request, Practitioner $practitioner): void
    {
        $practitioner->surname = $request->get('surname');
        $practitioner->email = $request->get('email');
        $practitioner->cdv_email = $request->get('cdv_email');
        $practitioner->phoneNo = $request->get('phoneNo');
        $practitioner->cv = $request->get('cv');
        $practitioner->practitioner_card = $request->get('practitioner_card');
        $practitioner->thesis = $request->get('thesis');
        $practitioner->commercial_projects_hours = $request->get('commercial_projects_hours');
        $practitioner->linkedin = $request->get('linkedin');
        $practitioner->commercial_experience_years = $request->get('commercial_experience_years');
        $practitioner->participation_in_finished_project = $request->get('participation_in_finished_project') !== null;
        $practitioner->team_management = $request->get('team_management') !== null;
        $practitioner->publications = $request->get('publications');
    }

    private function resolveRules(): array
    {
        return [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|unique:practitioner,email|max:255',
            'cdv_email' => 'unique:practitioner,cdv_email|max:255',
            'phoneNo' => 'unique:practitioner,phoneNo|max:11',
            'cv' => 'max:255',
            'practitioner_card' => 'max:255',
            'thesis' => 'max:11',
            'commercial_project_hours' => 'max:11',
            'linkedin' => 'max:255',
            'commercial_experience_years' => 'max:11',
            'publications' => 'max:11',
        ];
    }

}
