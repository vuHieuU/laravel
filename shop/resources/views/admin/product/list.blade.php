@extends('admin.main')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>image</th>
            <th>description</th>
            <th>content</th>
            <th>Price</th>
            <th>Price sale</th>
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
                      <td>
                          <a href="{{$item->thumb}}" target="_blank">
                          <img src="{{$item->thumb}}" width="100px"></a>
                      </td>
                      <td>{{$item->description}}</td>
                      <td>{{$item->content}}</td>
                      <td>{{$item->price}}</td>
                      <td>{{$item->price_sale}}</td>
                      <td>{!!$item->active == 1 ? '<span class="btn btn-success">kích hoạt</span>':'<span class="btn btn-danger">Chưa kích hoạt</span>'!!}</td>
                      <td><a href="/admin/product/edit/{{$item->id}}" class="btn btn-success">Sửa</a></td>
                      <td><a href="/admin/product/Delete/{{$item->id}}" class="btn btn-danger">Xóa</a></td>

                  </tr>
              @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">

    {{$listData->links()}}
    </div>
@endsection
