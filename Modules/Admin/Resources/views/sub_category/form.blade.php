<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="c_name">Tên Danh Mục Con:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Ten Danh Muc" value="{{old('cate_name',isset($sub_category->subcate_name) ? $sub_category->subcate_name : '')}}" name="subcate_name">
        @if ($errors->has('subcate_name'))
            <span class="error-text">
                {{$errors->first('subcate_name')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="input_img">Avatar:</label>
        <input type="file" name="subcate_avatar" id="input_img" class="form-control"
               value="{{old('subcate_avatar',isset($sub_category->subcate_avatar) ? $sub_category->subcate_avatar : '')}}">
        @if ($errors->has('subcate_avatar'))
            <span class="error-text">
                {{$errors->first('subcate_avatar')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <img src="{{isset($sub_category->subcate_avatar) ? pare_url_file($sub_category->subcate_avatar) : asset('img/no-image-available-grid.jpg')}}" id="output_img" alt="" style="width: 500px;">
    </div>
    <button type="submit" class="btn btn-success"> Lưu Thông Tin </button>
</form>
