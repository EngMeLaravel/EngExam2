<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="c_name">Tên Danh Mục:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Ten Danh Muc" value="{{old('cate_name',isset($category->cate_name) ? $category->cate_name : '')}}" name="cate_name">
        @if ($errors->has('cate_name'))
            <span class="error-text">
                {{$errors->first('cate_name')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="input_img">Avatar:</label>
        <input type="file" name="cate_avatar" id="input_img" class="form-control"
               value="{{old('cate_avatar',isset($category->cate_avatar) ? $category->cate_avatar : '')}}">
        @if ($errors->has('cate_avatar'))
            <span class="error-text">
                {{$errors->first('cate_avatar')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <img src="{{isset($category->cate_avatar) ? pare_url_file($category->cate_avatar) : asset('img/no-image-available-grid.jpg')}}" id="output_img" alt="" style="width: 500px;">
    </div>
    <button type="submit" class="btn btn-success"> Lưu Thông Tin </button>
</form>
