<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNavigationRequest;
use App\Http\Requests\StoreNavigationRequest;
use App\Http\Requests\UpdateNavigationRequest;
use App\Models\Navigation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NavigationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('navigation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $navigations = Navigation::all();

        return view('admin.navigations.index', compact('navigations'));
    }

    public function create()
    {
        abort_if(Gate::denies('navigation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navigations.create');
    }

    public function store(StoreNavigationRequest $request)
    {
        $navigation = Navigation::create($request->all());

        return redirect()->route('admin.navigations.index');
    }

    public function edit(Navigation $navigation)
    {
        abort_if(Gate::denies('navigation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navigations.edit', compact('navigation'));
    }

    public function update(UpdateNavigationRequest $request, Navigation $navigation)
    {
        $navigation->update($request->all());

        return redirect()->route('admin.navigations.index');
    }

    public function show(Navigation $navigation)
    {
        abort_if(Gate::denies('navigation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navigations.show', compact('navigation'));
    }

    public function destroy(Navigation $navigation)
    {
        abort_if(Gate::denies('navigation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $navigation->delete();

        return back();
    }

    public function massDestroy(MassDestroyNavigationRequest $request)
    {
        $navigations = Navigation::find(request('ids'));

        foreach ($navigations as $navigation) {
            $navigation->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
