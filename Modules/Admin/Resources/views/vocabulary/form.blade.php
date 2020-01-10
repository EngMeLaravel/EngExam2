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
               value="{{old('voca_name',isset($vocabulary->voca_name) ? $vocabulary->voca_name : '')}}"
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
               value="{{old('voca_mean',isset($vocabulary->voca_mean) ? $vocabulary->voca_mean : '')}}"
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
               value="{{old('voca_spell',isset($vocabulary->voca_spell) ? $vocabulary->voca_spell : '')}}"
               name="voca_spell">
        @if ($errors->has('voca_spell'))
            <span class="error-text">
            {{$errors->first('voca_spell')}}
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_name">Loại từ vựng:</label>
        <select name="voca_type" class="form-control">
            <option value="">--Loại từ vựng--</option>
            @if ($voca_type)
                @foreach ($voca_type as $voca_type_word)
                    <option value="{{ $voca_type_word->id }}"
                        {{old('voca_type',isset($voca_type_word->voca_type) ? $voca_type_word->voca_type : '')
                        == $voca_type_word->id ? "selected='selected'" : ""}}>{{ $voca_type_word->type_name }}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('voca_type'))
            <span class="error-text">
            {{$errors->first('voca_type')}}
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_name">Ví dụ Anh:</label>
        <input type="text" class="form-control" id="c_name" placeholder="Ví dụ Anh"
               value="{{old('voca_example_en',isset($vocabulary->voca_example_en) ? $vocabulary->voca_example_en : '')}}"
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
               value="{{old('voca_example_vi',isset($vocabulary->voca_example_vi) ? $vocabulary->voca_example_vi : '')}}"
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
                    <option value="{{ $category->id }}"
                        {{old('cate_id',isset($vocabulary->cate_id) ? $vocabulary->cate_id : '')
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
    <div class="form-group">
        <select name="subcate_id" id="sub_category" class="form-control">
            <option value="">--Ngành con--</option>
            @if (isset($sub_categories))
                @foreach ($sub_categories as $sub_category)
                    <option value="{{ $sub_category->id }}"
<<<<<<< HEAD
                        {{old('subcate_id',isset($vocabulary->subcate_id) ? $vocabulary->subcate_id : '')
                        == $sub_category->id ? "selected='selected'" : ""}}>{{ $sub_category->subcate_name }}</option>
=======
                        {{old('subcate_id',isset($sub_category->subcate_id) ? $sub_category->subcate_id : '')
                        == $sub_category->id ? "selected='selected'" : ""}}>{{ $sub_category->subcate_name }}
                    </option>
>>>>>>> 03607638b8c0dc69fc56b9944ef9c478ec2aad1c
                @endforeach
            @endif
        </select>
        @if ($errors->has('subcate_id'))
            <span class="error-text">
            {{$errors->first('subcate_id')}}
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="input_img">Ảnh:</label>
        <input type="file" name="voca_image" id="input_img" class="form-control"
               value="{{old('voca_image',isset($vocabulary->cate_avatar) ? $vocabulary->cate_avatar : '')}}">
        @if ($errors->has('voca_image'))
            <span class="error-text">
                {{$errors->first('voca_image')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <img src="{{isset($vocabulary->voca_image) ? pare_url_file($vocabulary->voca_image) : asset('img/no-image-available-grid.jpg')}}" id="output_img" alt="" style="width: 500px;">
    </div>
    <div class="col-xs-12">
        <button type="submit" class="btn btn-success"> Lưu Thông Tin</button>
    </div>
</form>
