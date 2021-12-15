<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyManagementRequest;
use App\Http\Requests\StoreManagementRequest;
use App\Http\Requests\UpdateManagementRequest;
use App\Models\Management;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $management = Management::all();

        return view('admin.management.index', compact('management'));
    }

    public function create()
    {
        abort_if(Gate::denies('management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.management.create');
    }

    public function store(StoreManagementRequest $request)
    {
        $management = Management::create($request->all());

        return redirect()->route('admin.management.index');
    }

    public function edit(Management $management)
    {
        abort_if(Gate::denies('management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.management.edit', compact('management'));
    }

    public function update(UpdateManagementRequest $request, Management $management)
    {
        $management->update($request->all());

        return redirect()->route('admin.management.index');
    }

    public function show(Management $management)
    {
        abort_if(Gate::denies('management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.management.show', compact('management'));
    }

    public function destroy(Management $management)
    {
        abort_if(Gate::denies('management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $management->delete();

        return back();
    }

    public function massDestroy(MassDestroyManagementRequest $request)
    {
        Management::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
