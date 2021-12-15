<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFajrCrewRequest;
use App\Http\Requests\StoreFajrCrewRequest;
use App\Http\Requests\UpdateFajrCrewRequest;
use App\Models\CrewType;
use App\Models\FajrCrew;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FajrCrewController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fajr_crew_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fajrCrew = FajrCrew::with(['types'])->first();

        $types = CrewType::pluck('type', 'id');

        $fajrCrew->load('types');

        return view('admin.fajrCrews.edit', compact('fajrCrew','types'));
    }

    public function create()
    {
        abort_if(Gate::denies('fajr_crew_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = CrewType::pluck('type', 'id');

        return view('admin.fajrCrews.create', compact('types'));
    }

    public function store(StoreFajrCrewRequest $request)
    {
        $fajrCrew = FajrCrew::create($request->all());
        $fajrCrew->types()->sync($request->input('types', []));

        return redirect()->route('admin.fajr-crews.index');
    }

    public function edit(FajrCrew $fajrCrew)
    {
        abort_if(Gate::denies('fajr_crew_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = CrewType::pluck('type', 'id');

        $fajrCrew->load('types');

        return view('admin.fajrCrews.edit', compact('fajrCrew', 'types'));
    }

    public function update(UpdateFajrCrewRequest $request, FajrCrew $fajrCrew)
    {
        $fajrCrew->update($request->all());
        $fajrCrew->types()->sync($request->input('types', []));

        return redirect()->route('admin.fajr-crews.index');
    }

    public function show(FajrCrew $fajrCrew)
    {
        abort_if(Gate::denies('fajr_crew_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fajrCrew->load('types');

        return view('admin.fajrCrews.show', compact('fajrCrew'));
    }

    public function destroy(FajrCrew $fajrCrew)
    {
        abort_if(Gate::denies('fajr_crew_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fajrCrew->delete();

        return back();
    }

    public function massDestroy(MassDestroyFajrCrewRequest $request)
    {
        FajrCrew::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
