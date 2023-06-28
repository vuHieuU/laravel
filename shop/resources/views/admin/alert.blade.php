@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>Thêm không thành công</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
            {{Session::get('error')}}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
