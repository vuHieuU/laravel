@extends('admin.main')

@section('content')
    <div class="card card-primary">
        <form active="" method="POST">
            @include('admin.alert')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label>tiêu đề</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$dataUpdate->name}}">
                    </div>
                    <div class="form-group col-6">
                        <label>Đường dẫn</label>
                        <input type="url" class="form-control" name="url" id="name" placeholder="Enter name" value="{{$dataUpdate->url}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" class="form-control" id="upload">
                    <div id="image_show">
                        <a href="{{$dataUpdate->thumb}}" target="_blank">
                            <img src="{{$dataUpdate->thumb}}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" id="thumb" value="{{$dataUpdate->thumb}}">
                </div>
                <div class="form-group">
                    <label>Sắp xếp</label>
                    <input type="text" class="form-control" name="sort_by" value="{{$dataUpdate->sort_by}}">
                </div>

                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="active" id="active" {{$dataUpdate->active == 1 ? 'checked=""':''}} value="1">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="active" id="no_active" {{$dataUpdate->active == 0 ? 'checked=""':''}} value="0">
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
