<style>
    #voca{
        margin-top: 15px;
        border-top: 1px solid #ccc;
    }
    .mot_tu{
        padding: 10px;
    }
    .mot_tu h4{
        font-weight: normal;
        text-transform: unset;
    }
    .mot_tu h4 span{
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
                            <h4 class="list-group-item-heading">{{ $vocabulary->voca_name }} <span class="text-danger">['{{ isset($vocabulary->vocatype->type_name) ? $vocabulary->vocatype->type_name : '[N\A]' }}']</span><span> /{{ $vocabulary->voca_spell }}/  : {{ $vocabulary->voca_mean }}</span> </h4>
                            <p class="list-group-item-text">{{ $vocabulary->voca_example_en }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-1">
                    <a href="{{ route('add_bookmark.my_lib.index', $vocabulary->id) }}" title="Thêm vào thư viện riêng"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
