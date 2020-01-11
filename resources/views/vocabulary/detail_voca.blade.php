<style>
    #voca {
        margin-top: 15px;
        border-top: 1px solid #ccc;
        padding: 0 10px;
    }

    .mot_tu {
        padding: 10px;
        font-size: 16px;
    }

    .mot_tu .word {
        display: inline-block;
        margin-right: 10px;
    }

    .mot_tu .word h3 {
        text-transform: unset;
        display: inline-block;
        margin-right: 10px;
    }

    .mot_tu .word span.w_type {
        font-weight: bold;
        font-style: italic;
    }

    .mot_tu .type_and_pronounce {
        display: inline-block;
    }

    .mot_tu .type_and_pronounce p {
        display: inline-block;
        margin-right: 20px;
    }

    .mot_tu .type_and_pronounce .pronounce {
        display: inline-block;
    }

    .mot_tu .type_and_pronounce .pronounce span.accent_us {
        font-weight: bold;
        color: red;
    }

    .mot_tu .type_and_pronounce .pronounce span.accent_uk {
        font-weight: bold;
        color: blue;
    }

    .mot_tu .w_mean h5 {
        display: inline;
        text-decoration: underline;
        margin-right: 5px;
    }

    .mot_tu .like h5 {
        text-decoration: underline;
    }

    .mot_tu .like .en {
        font-weight: bolder;
        color: #00a9e0;
        display: inline-block;
    }

    .mot_tu .like .vi {
        font-size: 0.9em;
        display: inline-block;
    }

    .mot_tu .illustration div img {
        vertical-align: unset;
    }

    .mot_tu .illustration div h6 {
        margin-top: 20px;
        color: #00970b;
    }
</style>
<div id="voca">

    @if(isset($vocabularies_detail))
        <div class="mot_tu">
            <div class="word">
                <h3>{{ $vocabularies_detail->voca_name }}</h3>
                <span
                    class="w_type"> {{ isset($vocabularies_detail->vocatype->type_name) ? $vocabularies_detail->vocatype->type_name : '[N\A]' }} </span>
            </div>
            <div class="type_and_pronounce">
                <div class="pronounce">
                    <p>/{{ $vocabularies_detail->voca_spell }}/</p>
                </div>
            </div>
            <div class="like w_mean">
                <h5>Meaning : </h5>
                <span> {{ $vocabularies_detail->voca_mean }}</span>
                <hr>
            </div>
            <div class="like">
                <h5>phrase : </h5>
                <span class="en">Curb your enthusiasm</span>
                <span class="vi"> ( -- Kiềm chế sự nhiệt tình của bạn. -- )</span>
                <hr>
            </div>
            <div class="like">
                <h5>sentence : </h5>
                <span class="en">{{ $vocabularies_detail->voca_example_en }}</span>
                <span class="vi"> ( -- {{ $vocabularies_detail->voca_example_vi }} -- )</span>
                <hr>
            </div>
            <div class="like illustration">
                <h5>illustration :</h5>
                <div>
                    <h6>Image:</h6>
                    <img src="{{ pare_url_file($vocabularies_detail->voca_image) }}" alt="">
                </div>
                <div>
                    <h6>Video:</h6>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZAuwjUsiG1Q" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endif


    @if(isset($myvocabularies_detailss))
        <div class="col-md-6">
            <div class="mot_tu">
                <div class="word">
                    <h3>{{ $myvocabularies_detailss->voca_name }}</h3>
                    <span
                        class="w_type"> {{ isset($myvocabularies_detailss->vocatype->type_name) ? $myvocabularies_detailss->vocatype->type_name : '[N\A]' }} </span>
                </div>
                <div class="type_and_pronounce">
                    <div class="pronounce">
                        <p>/{{ $myvocabularies_detailss->voca_spell }}/</p>
                    </div>
                </div>
                <div class="like w_mean">
                    <h5>Meaning : </h5>
                    <span> {{ $myvocabularies_detailss->voca_mean }}</span>
                    <hr>
                </div>
                <div class="like">
                    <h5>phrase : </h5>
                    <span class="en">Curb your enthusiasm</span>
                    <span class="vi"> ( -- Kiềm chế sự nhiệt tình của bạn. -- )</span>
                    <hr>
                </div>
                <div class="like">
                    <h5>sentence : </h5>
                    <span class="en">{{ $myvocabularies_detailss->voca_example_en }}</span>
                    <span class="vi"> ( -- {{ $myvocabularies_detailss->voca_example_vi }} -- )</span>
                    <hr>
                </div>
                <div class="like illustration">
                    <h5>illustration :</h5>
                    <div>
                        <h6>Image:</h6>
                        <img src="{{ pare_url_file($myvocabularies_detailss->voca_image) }}" alt="">
                    </div>
                    <div>
                        <h6>Video:</h6>
                        <iframe class="col-md-12" src="https://www.youtube.com/embed/ZAuwjUsiG1Q" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(isset($myvocabularies_details_edit))
        <div class="col-md-6">
            <div class="mot_tu">
                <div class="word">
                    <h3>{{ $myvocabularies_details_edit->my_voca_name }}</h3>
                    <span class="w_type"> {{ isset($myvocabularies_details_edit->vocatype->type_name) ? $myvocabularies_details_edit->vocatype->type_name : '[N\A]' }} </span>
                </div>
                <div class="type_and_pronounce">
                    <div class="pronounce">
                        <p>{{ $myvocabularies_details_edit->my_voca_spell }}</p>
                    </div>
                </div>
                <div class="like w_mean">
                    <h5>Meaning : </h5>
                    <span> {{ $myvocabularies_details_edit->my_voca_mean }}</span>
                    <hr>
                </div>
                <div class="like">
                    <h5>phrase : </h5>
                    <span class="en">Curb your enthusiasm</span>
                    <span class="vi"> ( -- Kiềm chế sự nhiệt tình của bạn. -- )</span>
                    <hr>
                </div>
                <div class="like">
                    <h5>sentence : </h5>
                    <span class="en">{{ $myvocabularies_details_edit->my_voca_example_en }}</span>
                    <span class="vi"> ( -- {{ $myvocabularies_details_edit->my_voca_example_vi }} -- )</span>
                    <hr>
                </div>
                <div class="like illustration">
                    <h5>illustration :</h5>
                    <div>
                        <h6>Image:</h6>
                        <img src="{{ pare_url_file($myvocabularies_details_edit->my_voca_image) }}" alt="">
                    </div>
                    <div>
                        <h6>Video:</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{ route('get.edit.vocabulary', $myvocabularies_details_edit->id) }}" class="btn btn-primary">Sửa từ</a>
            </div>
        </div>
    @endif
</div>
