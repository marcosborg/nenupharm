@extends('layouts.admin')
@section('content')
@can('quote_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.quotes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.quote.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.quote.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Quote">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.quote.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.quote.fields.text') }}
                        </th>
                        <th>
                            {{ trans('cruds.quote.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.quote.fields.job') }}
                        </th>
                        <th>
                            {{ trans('cruds.quote.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.quote.fields.language') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $key => $quote)
                        <tr data-entry-id="{{ $quote->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $quote->id ?? '' }}
                            </td>
                            <td>
                                {{ $quote->text ?? '' }}
                            </td>
                            <td>
                                {{ $quote->name ?? '' }}
                            </td>
                            <td>
                                {{ $quote->job ?? '' }}
                            </td>
                            <td>
                                @if($quote->photo)
                                    <a href="{{ $quote->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $quote->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Models\Quote::LANGUAGE_RADIO[$quote->language] ?? '' }}
                            </td>
                            <td>
                                @can('quote_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.quotes.show', $quote->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('quote_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.quotes.edit', $quote->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('quote_delete')
                                    <form action="{{ route('admin.quotes.destroy', $quote->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('quote_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.quotes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Quote:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection