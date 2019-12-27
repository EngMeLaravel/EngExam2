<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="form-group">
                <label for="a_name">Tên Bài Viết:</label>
                <input type="text" class="form-control" id="a_name" placeholder="Tên Bài Viết"
                value="{{old('a_name',isset($article->a_name) ? $article->a_name : '')}}" name="a_name">
                @if ($errors->has('a_name'))
                    <span class="error-text">
                        {{$errors->first('a_name')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="a_description">Mô tả:</label>
                <textarea name="a_description" class="form-control" id="a_description" cols="30" rows="4" placeholder="Mô tả bài viết">{{old('a_description',isset($article->a_description) ? $article->a_description : '')}}</textarea>
                @if ($errors->has('a_description'))
                    <span class="error-text">
                        {{$errors->first('a_description')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="icon">Nội dung:</label>
                <textarea name="a_content" class="form-control" id="" placeholder="Nội dung">{{old('a_content',isset($article->a_content) ? $article->a_content : '')}}</textarea>
                @if ($errors->has('a_content'))
                    <span class="error-text">
                        {{$errors->first('a_content')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="a_title_seo">Meta Title:</label>
                <input type="text" class="form-control" id="a_title_seo" placeholder="Meta Title "
                value="{{old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}"
                name="a_title_seo">
            </div>
            <div class="form-group">
                <label for="a_description_seo">Meta Description:</label>
                <input type="text" class="form-control" id="a_description_seo" placeholder="Meta Description "
                value="{{old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}"
                name="a_description_seo">
            </div>
            <div class="form-group">
                <label for="a_avatar">Avatar:</label>
                <input type="file" name="avatar" id="a_avatar" class="form-control"
                value="{{old('a_avatar',isset($article->a_avatar) ? $article->a_avatar : '')}}">
            </div>
            <div class="form-group text-center">
                <img src="{{isset($article->a_avatar) ? pare_url_file($article->a_avatar) : asset('images/no-image-available-grid.jpg')}}" id="output_img" alt="" style="width: 40%;">
            </div>
            <button type="submit" class="btn btn-success"> Lưu Thông Tin </button>
        </div>
    </div>
</form>
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('a_content');
    </script>
@endsection
