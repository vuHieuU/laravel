@extends('main')

@section('content')

	<!-- Shoping Cart -->
	<form class="bg0 p-t-65 p-b-85 mt-5" method="POST">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2">Name</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-5">Action</th>
								</tr>
								@php
									$total = 0;
								@endphp
                                 @foreach ($product as $item)
                  
								@php
									 $price = $item->price * $carts[$item->id];
									 $total += $price;
								@endphp
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ $item->thumb }}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{ $item->name }}</td>
									<td class="column-3">${{ $item->price }}</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product[{{ $item->id }}]" value="{{ $carts[$item->id] }}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">${{$price}}</td>
									<td class="column-5"><a href="delete/{{ $item->id }}">Xóa</a></td>
								</tr>
                                @endforeach
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						       <form method="POST" action="{{ route('client.carts.apply_coupon') }}">
									<div class="flex-w flex-m m-r-20 m-tb-5">
										<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" value="{{ Session::get('coupon_code') }}"
										name="coupon_code" placeholder="Coupon Code">
										
										<input type="submit" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" value="Apply coupon">
						
									</div>
							   </form>
                             <input type="submit" value="Update Cart" formaction="/update_Cart"
							 class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							@csrf
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									${{ $total }}
								</span>
							</div>
						</div>
						{{-- @if (session('discount_amount_price'))
						<div class="d-flex justify-content-between">
							<h6 class="font-weight-medium">Coupon </h6>
							<h6 class="font-weight-medium coupon-div"
								data-price="{{ session('discount_amount_price') }}">
								${{ session('discount_amount_price') }}</h6>
						</div>
					@endif --}}
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						
							<div class="p-r-18 p-r-0-sm w-full">
							
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Thông tin khách hàng
									</span>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Họ và tên">
									</div>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Số điện thoại">
									</div>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="addess" placeholder="Địa chỉ nhận hàng">
									</div>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email liên hệ">
									</div>
									<div class="bor8 bg0 m-b-12">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="content"></textarea>
									</div>

								
								</div>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Đặt hàng
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection