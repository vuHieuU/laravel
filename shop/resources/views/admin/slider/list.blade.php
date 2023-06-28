@extends('admin.main')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>đường dẫn</th>
            <th>image</th>
            <th>sắp xếp</th>
            <th>active</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listData as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->url}}</td>
                <td>
                    <a href="{{$item->thumb}}" target="_blank">
                        <img src="{{$item->thumb}}" width="100px"></a>
                </td>
                <td>{{$item->sort_by}}</td>
                <td>{!!$item->active == 1 ? '<span class="btn btn-success">kích hoạt</span>':'<span class="btn btn-danger">Chưa kích hoạt</span>'!!}</td>
                <td><a href="/admin/slider/edit/{{$item->id}}" class="btn btn-success">Sửa</a></td>
                <td><a href="/admin/slider/Delete/{{$item->id}}" class="btn btn-danger">Xóa</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
