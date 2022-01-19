@extends('layouts.admin')
@section('content')
@can('jobresquest_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jobresquests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jobresquest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jobresquest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Jobresquest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobresquest.fields.job') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobresquests as $key => $jobresquest)
                        <tr data-entry-id="{{ $jobresquest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jobresquest->id ?? '' }}
                            </td>
                            <td>
                                {{ $jobresquest->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $jobresquest->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $jobresquest->phone ?? '' }}
                            </td>
                            <td>
                                {{ $jobresquest->email ?? '' }}
                            </td>
                            <td>
                                {{ $jobresquest->city ?? '' }}
                            </td>
                            <td>
                                {{ $jobresquest->address ?? '' }}
                            </td>
                            <td>
                                {{ $jobresquest->job ?? '' }}
                            </td>
                            <td>
                                @can('jobresquest_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jobresquests.show', $jobresquest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('jobresquest_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jobresquests.edit', $jobresquest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('jobresquest_delete')
                                    <form action="{{ route('admin.jobresquests.destroy', $jobresquest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('jobresquest_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jobresquests.massDestroy') }}",
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
  let table = $('.datatable-Jobresquest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection