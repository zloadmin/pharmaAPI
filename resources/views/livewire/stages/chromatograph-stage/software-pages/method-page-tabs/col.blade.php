@if ($isShow)
    <div class="col_main">
        <div class="product">
            <div class="name">Бинарный насос (G7116A)</div>

            <div class="thumb">
                <img src="/web/images/tmp/software/product_thumb1.png" alt="" loading="lazy">
            </div>
        </div>

        <div class="row">
            <div class="col1">
                <div class="row">
                    <div class="section big">
                        <div class="title">Температура</div>

                        <div class="cols">
                            <div class="col">
                                <div class="field">
                                    <img src="/web/images/tmp/software/software4_img1.svg" alt="">
                                </div>

                                <div class="field">
                                    <label class="radio">

                                        <input type="radio"  wire:model="isColPath">
                                        <div class="check"></div>
                                    </label>

                                    <div class="amount">
                                        <button type="button" class="btn minus">
                                            <svg><use xlink:href="images/sprite.svg#ic_arr_ver"></use></svg>
                                        </button>

                                        <input type="text"  class="input" wire:model="colPathValue">

                                        <button type="button" class="btn plus">
                                            <svg><use xlink:href="images/sprite.svg#ic_arr_ver"></use></svg>
                                        </button>
                                    </div>

                                    <div class="unit">°С</div>
                                </div>

                                <div class="field">
                                    <img src="/web/images/tmp/software/software4_img1.svg" alt="">
                                </div>

                                <div class="field">
                                    <img src="/web/images/tmp/software/software4_img1.svg" alt="">
                                </div>
                            </div>

                            <div class="col">
                                <img src="/web/images/tmp/software/software4_img2.svg" alt="">
                            </div>

                            <div class="col big">
                                <img src="/web/images/tmp/software/software4_img3.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col2">
                <img src="/web/images/tmp/software/software4_img4.svg" alt="">
            </div>
        </div>
    </div>
@endif