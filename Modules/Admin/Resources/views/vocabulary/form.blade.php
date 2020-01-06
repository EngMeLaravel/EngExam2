<script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
<script>
    $(document).ready(function () {
        $("#category").change(function(){
            var cate_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('admin.ajax_select_sub_cate.vocabulary') }}',
                type: 'post',
                data: {cate_id: cate_id},
                success: function (data) {
                    $('#sub_category').html(data);
                }
            });
        });
    });
</script>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="c_name">Từ:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Tên từ vựng"
               value="{{old('voca_name',isset($sub_category->subcate_name) ? $sub_category->subcate_name : '')}}"
               name="voca_name">
        @if ($errors->has('voca_name'))
            <span class="error-text">
                {{$errors->first('voca_name')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_name">Nghĩa:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Nghĩa"
               value="{{old('voca_mean',isset($sub_category->subcate_name) ? $sub_category->subcate_name : '')}}"
               name="voca_mean">
        @if ($errors->has('voca_mean'))
            <span class="error-text">
                {{$errors->first('voca_mean')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_name">Phát âm:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Phát âm"
               value="{{old('voca_spell',isset($sub_category->subcate_name) ? $sub_category->subcate_name : '')}}"
               name="voca_spell">
        @if ($errors->has('voca_spell'))
            <span class="error-text">
                {{$errors->first('voca_spell')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_name">Loại từ vựng:</label>
        <select name="voca_type" id="" class="form-control">
            <option value="n">Danh từ (n)</option>
            <option value="v">Động từ (v)</option>
            <option value="adj">Tính từ (adj)</option>
            <option value="adv">Trạng từ (adv)</option>
            <option value="Pre">Giới từ (Pre)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="input_img">Ảnh:</label>
        <input type="file" name="voca_image" id="input_img" class="form-control"
               value="{{old('voca_image',isset($category->cate_avatar) ? $category->cate_avatar : '')}}">
        @if ($errors->has('voca_image'))
            <span class="error-text">
                {{$errors->first('voca_image')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_name">Ví dụ Anh:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Ví dụ Anh"
               value="{{old('voca_example_en',isset($sub_category->subcate_name) ? $sub_category->subcate_name : '')}}"
               name="voca_example_en">
        @if ($errors->has('voca_example_en'))
            <span class="error-text">
                {{$errors->first('voca_example_en')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_name">Nghĩa của ví dụ Anh:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Nghĩa của ví dụ Anh"
               value="{{old('voca_example_vi',isset($sub_category->subcate_name) ? $sub_category->subcate_name : '')}}"
               name="voca_example_vi">
        @if ($errors->has('voca_example_vi'))
            <span class="error-text">
                {{$errors->first('voca_example_vi')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <select name="cate_id" id="category" class="form-control">
            <option value="">--Ngành cha--</option>
            @if ($categories)
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : '' }} >{{ $category->cate_name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <select name="subcate_id" id="sub_category" class="form-control">
            <option value="">--Ngành con--</option>
            @if ($sub_categories)
                @foreach ($sub_categories as $sub_category)
                    <option
                        value="{{ $sub_category->id }}" {{ \Request::get('subcate') == $sub_category->id ? "selected='selected'" : '' }} >{{ $sub_category->subcate_name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-success"> Lưu Thông Tin</button>
</form>
