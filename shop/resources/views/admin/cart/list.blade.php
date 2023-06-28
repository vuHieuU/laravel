@extends('admin.main')

@section('content')
    <table class="table table-bordered">
          <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>SĐT</th>
                      <th>Email</th>
                      <th>address</th>
                      <th>ngày mua hàng</th>
                      <th>Chi tiết đơn hàng</th>
                      <th>xóa</th>
                  </tr>
          </thead>
        <tbody>
            @foreach ($customer as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->addess }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="detailCart/{{ $item->id }}" class="btn btn-success">Xem chi tiết</a>
                </td>
                <td>
                    <a href="" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
