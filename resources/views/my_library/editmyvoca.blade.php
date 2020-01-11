@extends('layouts.app')

@section('content')
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
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="c_name">Từ:</label>
                    <input type="text" class="form-control" id="c_name" placeholder="Tên từ vựng"
                           value="{{old('my_voca_name',isset($mycate->my_voca_name) ? $mycate->my_voca_name : '')}}"
                           name="my_voca_name">
                    @if ($errors->has('my_voca_name'))
                        <span class="error-text">
            {{$errors->first('my_voca_name')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="c_name">Nghĩa:</label>
                    <input type="text" class="form-control" id="c_name" placeholder="Nghĩa"
                           value="{{old('my_voca_mean',isset($mycate->my_voca_mean) ? $mycate->my_voca_mean : '')}}"
                           name="my_voca_mean">
                    @if ($errors->has('my_voca_mean'))
                        <span class="error-text">
            {{$errors->first('my_voca_mean')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="c_name">Phát âm:</label>
                    <input type="text" class="form-control" id="c_name" placeholder="Phát âm"
                           value="{{old('my_voca_spell',isset($mycate->my_voca_spell) ? $mycate->my_voca_spell : '')}}"
                           name="my_voca_spell">
                    @if ($errors->has('my_voca_spell'))
                        <span class="error-text">
            {{$errors->first('my_voca_spell')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="c_name">Loại từ vựng:</label>
                    <select name="my_voca_type" class="form-control">
                        <option value="">--Loại từ vựng--</option>
                        @if ($my_voca_type)
                            @foreach ($my_voca_type as $my_voca_type_word)
                                <option value="{{ $my_voca_type_word->id }}"
                                    {{old('my_voca_type',isset($my_voca_type_word->voca_type) ? $my_voca_type_word->voca_type : '')
                                    == $my_voca_type_word->id ? "selected='selected'" : ""}}>{{ $my_voca_type_word->type_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('my_voca_type'))
                        <span class="error-text">
            {{$errors->first('my_voca_type')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="c_name">Ví dụ Anh:</label>
                    <input type="text" class="form-control" id="c_name" placeholder="Ví dụ Anh"
                           value="{{old('my_voca_example_en',isset($mycate->my_voca_example_en) ? $mycate->my_voca_example_en : '')}}"
                           name="my_voca_example_en">
                    @if ($errors->has('my_voca_example_en'))
                        <span class="error-text">
            {{$errors->first('my_voca_example_en')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="c_name">Nghĩa của ví dụ Anh:</label>
                    <input type="text" class="form-control" id="c_name" placeholder="Nghĩa của ví dụ Anh"
                           value="{{old('my_voca_example_vi',isset($mycate->my_voca_example_vi) ? $mycate->my_voca_example_vi : '')}}"
                           name="my_voca_example_vi">
                    @if ($errors->has('my_voca_example_vi'))
                        <span class="error-text">
            {{$errors->first('my_voca_example_vi')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <select name="my_cate_id" id="category" class="form-control">
                        <option value="">--Ngành cha--</option>
                        @if ($mycategories)
                            @foreach ($mycategories as $mycategory)
                                <option value="{{ $mycategory->id }}"
                                    {{old('cate_id',isset($mycate->my_cate_id) ? $mycate->my_cate_id : '')
                                    == $mycategory->id ? "selected='selected'" : ""}}>{{ $mycategory->my_cate_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('my_cate_id'))
                        <span class="error-text">
            {{$errors->first('my_cate_id')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <select name="my_subcate_id" id="sub_category" class="form-control">
                        <option value="">--Ngành con--</option>
                        @if (isset($mysubcategories))
                            @foreach ($mysubcategories as $mysubcategory)
                                <option value="{{ $mysubcategory->id }}"
                                    {{old('subcate_id',isset($mycate->my_subcate_id) ? $mycate->my_subcate_id : '')
                                    == $mysubcategory->id ? "selected='selected'" : ""}}>{{ $mysubcategory->my_subcate_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('my_subcate_id'))
                        <span class="error-text">
            {{$errors->first('my_subcate_id')}}
        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="input_img">Ảnh:</label>
                    <input type="file" name="my_voca_image" id="input_img" class="form-control"
                           value="{{old('my_voca_image',isset($mycate->my_cate_avatar) ? $mycate->my_cate_avatar : '')}}">
                    @if ($errors->has('my_voca_image'))
                        <span class="error-text">
                {{$errors->first('my_voca_image')}}
            </span>
                    @endif
                </div>
                <div class="form-group">
                    <img src="{{isset($mycate->my_voca_image) ? pare_url_file($mycate->my_voca_image) : asset('img/no-image-available-grid.jpg')}}" id="output_img" alt="" style="width: 500px;">
                </div>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success"> Lưu Thông Tin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

