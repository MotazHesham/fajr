@extends('layouts.admin')
@section('content')
@can('quotation_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.quotation-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.quotationRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.quotationRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-QuotationRequest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotationRequests as $key => $quotationRequest)
                        <tr data-entry-id="{{ $quotationRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $quotationRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $quotationRequest->name ?? '' }}
                            </td>
                            <td>
                                {{ $quotationRequest->phone ?? '' }}
                            </td>
                            <td>
                                {{ $quotationRequest->email ?? '' }}
                            </td>
                            <td>
                                {{ $quotationRequest->address ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\QuotationRequest::SERVICE_SELECT[$quotationRequest->service] ?? '' }}
                            </td>
                            <td>
                                {{ $quotationRequest->date ?? '' }}
                            </td>
                            <td>
                                @can('quotation_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.quotation-requests.show', $quotationRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('quotation_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.quotation-requests.edit', $quotationRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('quotation_request_delete')
                                    <form action="{{ route('admin.quotation-requests.destroy', $quotationRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('quotation_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.quotation-requests.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-QuotationRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection