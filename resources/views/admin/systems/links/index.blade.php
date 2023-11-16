@extends('admin.layouts.app')

@section('title', 'Liên kết')

@section('sidebar')
  @php($sidebar = 'system')
@stop

@section('action')
  <a class="btn btn-success btn-sm" data-url="{{ route('admin.systems.links.create') }}"
     data-toggle="modal" data-target="#modal">Thêm liên kết thân thiện</a>
@stop

@section('javascript')
  'setting/link-index'
@stop

@section('content')
  <table id="navigation-table" class="table table-striped table-hover navigation-table sortable-list">
    <thead>
    <tr>
      <th width="50%">Tên</th>
      <th width="10%">Mở cửa sổ mới</th>
      <th width="10%">Tình trạng</th>
      <th width="30%">Vận hành</th>
    </tr>
    </thead>

    <tbody data-update-seqs-url="">
    @if (count($links))
      @foreach ($links as $link)
        <tr class="">
          <td class="sort-handle" style="vertical-align: middle;">
            <span class="glyphicon glyphicon-resize-vertical"></span>
            {{ $link->name }}
          </td>
          <td>
            {{ $link->status }}
          </td>
          <td>
            {{ $link->status }}
          </td>
          <td>
            <button class="btn btn-sm btn-default edit-btn"
                    data-url="{{ route('admin.systems.links.destroy', $link) }}"
                    data-toggle="modal"
                    data-target="#modal">Xóa bỏ
            </button>
            <button class="btn btn-sm btn-default edit-btn"
                    data-url="{{ route('admin.systems.links.edit', $link) }}" data-toggle="modal"
                    data-target="#modal">Biên tập
            </button>
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="20">
          <div class="empty"></div>
        </td>
      </tr>
    @endif
    </tbody>
  </table>
@stop
