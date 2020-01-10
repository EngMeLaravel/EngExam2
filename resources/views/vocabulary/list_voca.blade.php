<style>
    #voca{
        margin-top: 15px;
        border-top: 1px solid #ccc;
    }
    .mot_tu{
        padding: 10px;
    }
    .mot_tu .list-group .list-group-item h4{
        font-weight: normal;
        text-transform: unset;
    }
    .mot_tu .list-group .list-group-item h4 span{
        font-weight: 400;
        font-size: 16px;
    }
    .mot_tu .list-group .list-group-item h4 span.accent_us{
        color: red;
    }
    .mot_tu .list-group .list-group-item h4 span.accent_uk{
        color: blue;
    }
</style>
<div id="voca">
    <div class="mot_tu">
        @if(isset($vocabularies))
        @foreach($vocabularies as $vocabulary)
        <div class="list-group">
            <a href="{{ route('get_detail_voca.public_lib.index', [$vocabulary->cate_id,$vocabulary->subcate_id,$vocabulary->id]) }}" class="list-group-item">
                <div>
                    <h4 class="list-group-item-heading">{{ $vocabulary->voca_name }} <span class="text-danger">['{{ isset($vocabulary->vocatype->type_name) ? $vocabulary->vocatype->type_name : '[N\A]' }}']</span><span> /{{ $vocabulary->voca_spell }}/  : {{ $vocabulary->voca_mean }}</span> </h4>
                    <p class="list-group-item-text">{{ $vocabulary->voca_example_en }}</p>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
