<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="c_name">Tên Danh Mục Con:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Ten Danh Muc" value="{{old('subcate_name',isset($sub_category->subcate_name) ? $sub_category->subcate_name : '')}}" name="subcate_name">
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
    <div class="form-group">
        <label for="cate_id">Loại ngành cha:</label>
        <select name="cate_id" id="cate_id" class="form-control">
            <option value="">--Chọn loại ngành cha--</option>
            @if (isset($categories))
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{old('cate_id',isset($sub_category->cate_id) ? $sub_category->cate_id : '')
                        == $category->id ? "selected='selected'" : ""}}>{{ $category->cate_name }}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('cate_id'))
            <span class="error-text">
            {{$errors->first('cate_id')}}
        </span>
        @endif
    </div>
    <button type="submit" class="btn btn-success"> Lưu Thông Tin </button>
</form>
