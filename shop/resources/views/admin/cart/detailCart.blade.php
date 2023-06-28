@extends('admin.main')

@section('content')         
        <ul>
            <li>Tên khách hàng : <strong>{{$carts[0]->name}}</strong></li>
            {{-- @php
                dd($carts[1])
            @endphp --}}
            <li>Số điện thoại : <strong>{{$carts[0]->phone}}</strong></li>
            <li>Địa chỉ : <strong>{{$carts[0]->addess}}</strong></li>
            <li>email : <strong>{{$carts[0]->email}}</strong></li>
            <li>Ghi chú : <strong>{{$carts[0]->content}}</strong></li>
        </ul>
    <table class="table table-bordered">
          <thead>
                  <tr>
                      <th>#</th>
                      <th>IMG</th>
                      <th>Product</th>
                      <th>price</th>
                      <th>quanlity</th>
                      <th>total</th>
                  </tr>

          </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($carts as $key => $item)
            @php
                 $priceEnd = $item -> pty * $item -> price;
                 $total += $priceEnd;
            @endphp
                   <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ $item -> thumb }}" alt="" width="80px"></td>
                        <td>{{ $item -> namePro }}</td>
                        <td>${{ $item -> price }}</td>
                        <td>{{ $item -> pty }}</td>
                        <td>{{ $priceEnd }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Tổng</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>${{ $total }}</td>
                   </tr>
        </tbody>
    </table>
@endsection
