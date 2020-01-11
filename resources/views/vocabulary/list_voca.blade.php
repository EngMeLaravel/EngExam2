<style>
    #voca {
        margin-top: 15px;
        border-top: 1px solid #ccc;
    }

    .mot_tu {
        padding: 10px;
    }

    .mot_tu h4 {
        font-weight: normal;
        text-transform: unset;
    }

    .mot_tu h4 span {
        font-weight: 400;
        font-size: 16px;
    }

    .mot_tu .row {
        border: 1px solid #ccc;
        height: auto;
        padding: 8px;
        border-radius: 5px;
    }
</style>
<div id="voca">
    <div class="mot_tu">
        @if(isset($vocabularies))
            @foreach($vocabularies as $vocabulary)
                <div class="row">
                    <div class="col-xs-11">
                        <a href="{{ route('get_detail_voca.public_lib.index', [$vocabulary->cate_id,$vocabulary->subcate_id,$vocabulary->id]) }}">
                            <div>
                                <h4 class="list-group-item-heading">{{ $vocabulary->voca_name }} <span
                                        class="text-danger">['{{ isset($vocabulary->vocatype->type_name) ? $vocabulary->vocatype->type_name : '[N\A]' }}']</span><span> /{{ $vocabulary->voca_spell }}/  : {{ $vocabulary->voca_mean }}</span>
                                </h4>
                                <p class="list-group-item-text">{{ $vocabulary->voca_example_en }}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-1">
                        <a href="{{ route('add_bookmark.my_lib.index', $vocabulary->id) }}"
                           title="Thêm vào thư viện riêng"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            @endforeach
        @endif

        @if(isset($myvocabularies))
            @foreach($myvocabularies as $vocabulary)
                <div class="row">
                   @foreach($myvocabularies_details as $item)
                       @if($vocabulary->voca_id == $item->id)
                            <div class="col-xs-11">
                                <a href="{{ route('get_detail_voca.my_lib.index', [$vocabulary->my_cate_id,$vocabulary->my_subcate_id,$vocabulary->voca_id]) }}">
                                    <div>
                                        <h4 class="list-group-item-heading">{{ $item->voca_name }}
                                            <span
                                                class="text-danger">['{{ isset($item->vocatype->type_name) ? $item->vocatype->type_name : '[N\A]' }}']
                                                </span>
                                            <span> /{{ $item->voca_spell }}/  : {{ $item->voca_mean }}</span>
                                        </h4>
                                        <p class="list-group-item-text">{{ $item->voca_example_en }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-1">
                                <a onclick="return confirm('Bạn có chắc là muốn xóa từ này ra khỏi thư viện riêng?')" href="{{ route('delete_voca.my_lib.index', $vocabulary->voca_id) }}"
                                   title="Xóa từ vựng khỏi thư việng riêng"><i class="fa fa-trash-o"></i></a>
                            </div>
                       @endif
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
</div>
