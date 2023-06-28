@extends('admin.main')

@section('content')
    <div class="card card-primary">
        <form active="" method="POST">
            @include('admin.alert')
            <div class="card-body">
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$listData->name}}">
                    @error('name')
                    <span class="text-danger">Bạn chưa nhập tên</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Danh mục</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Danh mục cha</option>
                        @foreach($getParentId as $item)
                            <option value="{{$item->id}}" {{$listData->parent_id == $item->id ? 'selected':false}}>{{$item->name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{$listData->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea name="content" id="content" class="form-control">{{$listData->content}}</textarea>
                </div>

                <div class="form-group">
                    <label>kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" value="1" name="active" {{$listData->active == 1 ? 'checked=""':''}} id="active">
                        <label for="active" class="custom-control-label">có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" value="0" name="active" {{$listData->active == 0 ? 'checked=""':''}} id="no_active">
                        <label for="no_active" class="custom-control-label">không</label>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
