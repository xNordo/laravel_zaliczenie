<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\EducationHistory;
use App\Models\Practitioner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class EducationHistoryController extends Controller
{
    public function create(int $practitionerId): \Illuminate\Contracts\View\View
    {
        return View::make('education_histories/create', ['practitionerId' => $practitionerId]);
    }

    public function store(Request $request, int $practitionerId): RedirectResponse
    {
        $rules = $this->resolveRules();
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to(sprintf('practitioners/%d/education_histories/create', $practitionerId))
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $educationHistory = new EducationHistory();
            $this->assignEducationHistoryData($request, $educationHistory, $practitionerId);
            $educationHistory->save();

            Session::flash('message', 'Successfully created education history!');
            return Redirect::to(sprintf('practitioners/%d', $practitionerId));
        }
    }

    public function edit(int $practitionerId, int $educationHistoryId): \Illuminate\Contracts\View\View
    {
        $practitioner = Practitioner::find($practitionerId);
        $educationHistory = EducationHistory::find($educationHistoryId);

        return View::make('education_histories.edit', [
            'practitioner' => $practitioner,
            'educationHistory' => $educationHistory
        ]);
    }

    public function update(Request $request, int $practitionerId, int $educationHistoryId): RedirectResponse
    {
        $rules = $this->resolveRules();
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to(
                sprintf('practitioners/%d/education_histories/%d/edit', $practitionerId, $educationHistoryId
                ))
                ->withErrors($validator);
        } else {
            $educationHistory = EducationHistory::find($educationHistoryId);
            $this->assignEducationHistoryData($request, $educationHistory, $practitionerId);
            $educationHistory->save();

            Session::flash('message', 'Successfully updated education history!');
            return Redirect::to(sprintf('practitioners/%d', $practitionerId));
        }
    }

    public function destroy(int $practitionerId, int $educationHistoryId): RedirectResponse
    {
        $educationHistory = EducationHistory::find($educationHistoryId);
        $educationHistory->delete();

        Session::flash('message', 'Successfully deleted the education history!');
        return Redirect::to(sprintf('practitioners/%d', $practitionerId));
    }

    private function resolveRules(): array
    {
        return [
            'degree' => 'required|max:100',
            'specialisation' => 'required|max:255'
        ];
    }

    private function assignEducationHistoryData(
        Request $request,
        EducationHistory $educationHistory,
        int $practitionerId
    ): void {
        $educationHistory->practitioner_id = $practitionerId;
        $educationHistory->degree = $request->get('degree');
        $educationHistory->specialisation = $request->get('specialisation');
        $educationHistory->certificate = $request->get('certificate') !== null;
    }
}
