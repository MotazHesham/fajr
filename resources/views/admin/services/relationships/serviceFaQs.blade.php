@can('fa_q_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.fa-qs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.faQ.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.faQ.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-serviceFaQs">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.faQ.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.faQ.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.faQ.fields.answer') }}
                        </th>
                        <th>
                            {{ trans('cruds.faQ.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.faQ.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faQs as $key => $faQ)
                        <tr data-entry-id="{{ $faQ->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $faQ->id ?? '' }}
                            </td>
                            <td>
                                {{ $faQ->question ?? '' }}
                            </td>
                            <td>
                                {{ $faQ->answer ?? '' }}
                            </td>
                            <td>
                                {{ $faQ->service->name ?? '' }}
                            </td>
                            <td>
                                @if($faQ->photo)
                                    <a href="{{ $faQ->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $faQ->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('fa_q_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.fa-qs.show', $faQ->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('fa_q_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.fa-qs.edit', $faQ->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('fa_q_delete')
                                    <form action="{{ route('admin.fa-qs.destroy', $faQ->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('fa_q_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fa-qs.massDestroy') }}",
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
  let table = $('.datatable-serviceFaQs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection