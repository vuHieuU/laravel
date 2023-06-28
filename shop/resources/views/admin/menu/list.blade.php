@extends('admin.main')

@section('content')
    <table class="table table-bordered">
          <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>description</th>
                      <th>content</th>
                      <th>active</th>
                      <th>Sửa</th>
                      <th>Xóa</th>
                  </tr>
          </thead>
        <tbody>
        @foreach($listData as $key => $item)
            <tr>

                    <td>{{$key + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->content}}</td>
                    <td>{!!$item->active == 1 ?'<span class="btn btn-success">Kích hoạt</span>':'<span class="btn btn-danger">Chưa kích hoạt</span>'!!}</td>
                    <td><a href="/admin/menu/edit/{{$item->id}}">Sửa</a></td>
                    <td><a href="/admin/menu/remove/{{$item->id}}">Xóa</a></td>
            </tr>
                @endforeach
        </tbody>
    </table>
@endsection
