<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQuoteRequest;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class QuoteController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('quote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotes = Quote::with(['media'])->get();

        return view('admin.quotes.index', compact('quotes'));
    }

    public function create()
    {
        abort_if(Gate::denies('quote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quotes.create');
    }

    public function store(StoreQuoteRequest $request)
    {
        $quote = Quote::create($request->all());

        if ($request->input('photo', false)) {
            $quote->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $quote->id]);
        }

        return redirect()->route('admin.quotes.index');
    }

    public function edit(Quote $quote)
    {
        abort_if(Gate::denies('quote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quotes.edit', compact('quote'));
    }

    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $quote->update($request->all());

        if ($request->input('photo', false)) {
            if (! $quote->photo || $request->input('photo') !== $quote->photo->file_name) {
                if ($quote->photo) {
                    $quote->photo->delete();
                }
                $quote->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($quote->photo) {
            $quote->photo->delete();
        }

        return redirect()->route('admin.quotes.index');
    }

    public function show(Quote $quote)
    {
        abort_if(Gate::denies('quote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quotes.show', compact('quote'));
    }

    public function destroy(Quote $quote)
    {
        abort_if(Gate::denies('quote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quote->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuoteRequest $request)
    {
        $quotes = Quote::find(request('ids'));

        foreach ($quotes as $quote) {
            $quote->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('quote_create') && Gate::denies('quote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Quote();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
