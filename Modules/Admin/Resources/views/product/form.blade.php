<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="pro_name">Tên Sản Phẩm:</label>
                <input type="text" class="form-control" id="pro_name" placeholder="Ten Danh Muc"
                value="{{old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}" name="pro_name">
                @if ($errors->has('pro_name'))
                    <span class="error-text">
                        {{$errors->first('pro_name')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_description">Mô tả:</label>
                <textarea name="pro_description" class="form-control" id="pro_description" cols="30" rows="3" placeholder="Mô tả ngắn sản phẩm">{{old('pro_description',isset($product->pro_description) ? $product->pro_description : '')}}</textarea>
                @if ($errors->has('pro_description'))
                    <span class="error-text">
                        {{$errors->first('pro_description')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_content">Nội dung:</label>
                <textarea name="pro_content" class="form-control" id="pro_content">{{old('pro_content',isset($product->pro_content) ? $product->pro_content : '')}}</textarea>
                @if ($errors->has('pro_content'))
                    <span class="error-text">
                        {{$errors->first('pro_content')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_title_seo">Meta Title:</label>
                <input type="text" class="form-control" id="pro_title_seo" placeholder="Meta Title "
                value="{{old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '')}}"
                name="pro_title_seo">
            </div>
            <div class="form-group">
                <label for="pro_description_seo">Meta Description:</label>
                <input type="text" class="form-control" id="pro_description_seo" placeholder="Meta Description "
                value="{{old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '')}}"
                name="pro_description_seo">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="pro_category_id">Loại sản phẩm:</label>
                <select name="pro_category_id" id="pro_category_id" class="form-control">
                    <option value="">--Chọn loại sản phẩm--</option>
                    @if (isset($categories))
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '')
                                == $category->id ? "selected='selected'" : ""}}>{{ $category->c_name }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('pro_category_id'))
                    <span class="error-text">
                        {{$errors->first('pro_category_id')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_price">Giá sản phẩm:</label>
                <input type="number" name="pro_price" id="pro_price" placeholder="Giá sản phẩm"
                class="form-control" value="{{old('pro_content',isset($product->pro_price) ? $product->pro_price : '')}}">
                @if ($errors->has('pro_price'))
                    <span class="error-text">
                        {{$errors->first('pro_price')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_sale">% Khuyến mãi:</label>
                <input type="number" name="pro_sale" id="pro_sale" placeholder="% Giảm giá"
                class="form-control" value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '0')}}">
            </div>
            <div class="form-group">
                <label for="pro_number">Số lượng sản phẩm:</label>
                <input type="number" name="pro_number" id="pro_number" placeholder=""
                class="form-control" value="{{old('pro_number',isset($product->pro_number) ? $product->pro_number : '0')}}">
            </div>
            <div class="form-group">
                <label for="input_img">Avatar:</label>
                <input type="file" name="avatar" id="input_img" class="form-control"
                value="{{old('pro_content',isset($product->pro_price) ? $product->pro_price : '')}}">
            </div>
            <div class="form-group text-center">
                <img src="{{isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('images/no-image-available-grid.jpg')}}" id="output_img" alt="" style="width: 100%; height: 100%;">
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="hot"> Nổi bật </label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success"> Lưu Thông Tin </button>
</form>

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
@endsection
