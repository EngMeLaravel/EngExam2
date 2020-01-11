@extends('layouts.app')
<script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
<script>
    $(document).ready(function () {
        $("#mycategory").change(function(){
            var mycate_id = $(this).val();
            console.log(mycate_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('ajax_select_my_sub_cate.vocabulary') }}',
                type: 'post',
                data: {mycate_id: mycate_id},
                success: function (data) {
                    $('#mysub_category').html(data);
                }
            });
        });
    });
</script>
@section('content')
    <div class="container" id="content" style="margin-top: 20px;">
        <h3 class="text-center" style="color: black;">Thêm <span style="color: red;">"{{ $voca_name }}"</span> vào thư viện riêng</h3>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <form action="{{ route('save_bookmark.my_lib.index') }}" method="POST" style="margin-top: 30px;">
                    @csrf
                    <div class="form-group">
                        @if($errors->has('voca_id'))
                            <div class="error" style="color: red;">{{ $errors->first('voca_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="c_name">ID Từ Vựng:</label>
                        <input type="text" class="form-control" id="c_name" placeholder="ID từ vựng" value="{{ $voca_id }}" readonly name="voca_id">
                    </div>
                    <div class="form-group">
                        <select name="mycate_id" id="mycategory" class="form-control">
                            <option value="">--Ngành cha cá nhân--</option>
                            @if ($mycategory)
                                @foreach ($mycategory as $mycate)
                                    <option value="{{ $mycate->id }}">{{ $mycate->my_cate_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="mysubcate_id" id="mysub_category" class="form-control">
                            <option value="">--Ngành con cá nhân--</option>
                        </select>
                    </div>
                    <div class="col-xs-12" style="padding-left: 0;">
                        <button type="submit" class="btn btn-success"> Lưu Thông Tin</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Từ hot</h3>
                    </div>
                    <div class="panel-body">
                        <p><a href="" class="text-primary">Listen</a></p>
                        <p><a href="" class="text-primary">Good</a></p>
                        <p><a href="" class="text-primary">Happen</a></p>
                        <p><a href="" class="text-primary">Tomorrow</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


