@extends('admin.main')

@section('content')
    <div class="card card-primary">
        <form active="" method="POST">
            @include('admin.alert')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label>Tên sản phẩm</label>
                        {{-- @php
                            dd($DataEdit)
                        @endphp --}}
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$DataEdit->name}}">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Danh mục</label>
                        <select class="form-control" name="menu_id">
                            @if (!empty($getAdd))

                                @foreach ($getAdd as $item)

                                    <option value="{{$item->id}}" {{$DataEdit->menu_id == $item->id ? 'selected':'' }}>{{$item->name}}</option>

                                @endforeach

                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Giá gốc</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" value="{{$DataEdit->price}}">
                    </div>
                    <div class="form-group col-6">
                        <label>Giá giảm</label>
                        <input type="text" class="form-control" name="price_sale" id="price_sale" placeholder="Enter price sale" value="{{$DataEdit->price_sale}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{$DataEdit->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea name="content" id="content" class="form-control">{{$DataEdit->content}}</textarea>
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" class="form-control" id="upload" >
                    <div id="image_show" >
                         <a href="{{$DataEdit->thumb}}" target="_blank">
                           <img src="{{$DataEdit->thumb}}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" value="{{$DataEdit->thumb}}" id="thumb" >
                </div>

                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="active" id="active" value="1" {{$DataEdit->active == 1 ? 'checked=""':''}}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="active" id="no_active" value="0" {{$DataEdit->active == 0 ? 'checked=""':''}}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
