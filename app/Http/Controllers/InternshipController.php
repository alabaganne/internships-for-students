<?php

namespace App\Http\Controllers;

use App\Http\Requests\InternshipRequest; // validations
use App\Http\Resources\InternshipResource; // response
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Field;
use App\Models\City;
use App\Models\Company;
use App\Models\Internship;
use Illuminate\Support\Facades\Redirect;

class InternshipController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Internship::class);
    }

    public function index(Request $request)
    {
        return Inertia::render('Internships/Index', [
			'filters' => $request->only('fields', 'cities', 'companies', 'search'),
			'internships' => InternshipResource::collection(
				Internship::with('company', 'field', 'city', 'skills')
					->withFilters(
						$request->input('fields', []),
						$request->input('companies', []),
						$request->input('cities', []),
						$request->input('search', '')
					)
					->latest()
					->paginate(7)
			),
			'fields' => Field::withCount(['internships' => function ($query) use ($request) {
					$query->withFilters(
						// [$request->input('fields', [])],
						[],
						$request->input('companies', []),
						$request->input('cities', []),
						$request->input('search', '')
					);
				}])
				->get(),
			'cities' => City::withCount(['internships' => function ($query) use ($request) {
					$query->withFilters(
						$request->input('fields', []),
						$request->input('companies', []),
						// $request->input('cities', []),
						[],
						$request->input('search', '')
					);
				}])
				->get(),
			'companies' => Company::withCount(['internships' => function ($query) use ($request) {
					$query->withFilters(
						$request->input('fields', []),
						// $request->input('companies', []),
						[],
						$request->input('cities', []),
						$request->input('search', '')
					);
				}])
				->get()
				->transform(function ($company) {
					return [
						'id' => $company->id,
						'name' => $company->user->name,
						'internships_count' => $company->internships_count,
					];
				})
		]);
    }

    public function getFields() {
        return Field::select('id', 'name')->get();
    }

    public function create()
    {
        return Inertia::render('Internships/Edit', [
            'fields' => $this->getFields()
        ]);
    }

    public function store(InternshipRequest $request)
    {
        $data = $request->validated();
		$company = auth()->user()->userable;
        $data['company_id'] = $company->id;
		$data['city_id'] = $company->city_id;

        Internship::create($data);

        return Redirect::route('internships.index')->with('toast', [
            'type' => 'store',
            'message' => 'A new internship has been added.'
        ]);
    }

    public function show(Internship $internship) {
		$user = auth()->user();
		$application = null;
		if($user->isStudent()) {
			$application = \App\Models\Application::where('internship_id', $internship->id)
							->where('student_id', $user->userable->id)
							->first();
		}

        return Inertia::render('Internships/Show', [
            'internship' => [
				'id' => $internship->id,
				'title' => $internship->title,
				'description' => $internship->description,
				'closing_at' => $internship->closing_at->format('F d, Y'),
				'created_at' => $internship->created_at->diffForHumans(),
				'field' => [
					'name' => $internship->field->name,
				],
				'city' => [
					'name' => $internship->city->name
				],
				'company' => [
					'id' => $internship->company->id,
					'name' => $internship->company->user->name,
					'email' => $internship->company->user->email,
					'phone_number' => $internship->company->user->phone_number,
					'linkedin_profile_url' => $internship->company->user->linkedin_profile_url,
					'city' => [
						'name' => $internship->company->city->name,
					]
				],
				'application' => $application ? [
					'id' => $application->id,
					'student_id' => $application->student_id,
					'created_at' => $application->created_at->format('F d, Y')
				] : null
			]
        ]);
    }

    public function edit(Internship $internship)
    {
        return Inertia::render('Internships/Edit', [
            'internship' => $internship,
            'fields' => $this->getFields()
        ]);
    }

    public function update(InternshipRequest $request, Internship $internship)
    {
        $internship->update($request->validated());

        return Redirect::route('internships.show', $internship->id)->with('toast', [
            'type' => 'update',
            'message' => 'Internship updated successfully.'
        ]);
    }


    public function destroy(Internship $internship)
    {
        $internship->delete();

        return Redirect::route('internships.index')->with('toast', [
            'type' => 'destroy',
            'message' => 'Internship deleted successully.'
        ]);
    }
}
