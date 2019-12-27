<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="c_name">Tên Danh Mục:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Ten Danh Muc" value="{{old('c_name',isset($category->c_name) ? $category->c_name : '')}}" name="c_name">
        @if ($errors->has('c_name'))
            <span class="error-text">
                {{$errors->first('c_name')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_icon">Icon:</label>
        <input type="text" class="form-control" id="c_icon" placeholder="fa fa-home" value="{{old('c_icon',isset($category->c_icon) ? $category->c_icon : '')}}" name="c_icon">
        @if ($errors->has('c_icon'))
            <span class="error-text">
                {{$errors->first('c_icon')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="icon">Meta Title:</label>
        <input type="text" class="form-control" id="icon" placeholder="Meta Title " value="{{old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '')}}" name="c_title_seo">
    </div>
    <div class="form-group">
        <label for="icon">Meta Description:</label>
        <input type="text" class="form-control" id="icon" placeholder="Meta Description " value="{{old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '')}}" name="c_description_seo">
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label><input type="checkbox" name="hot"> Nổi bật </label>
        </div>
    </div>
    <button type="submit" class="btn btn-success"> Lưu Thông Tin </button>
</form>