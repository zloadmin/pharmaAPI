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
                <div class="section">
                    <div class="title">Сигналы</div>

                    <table>
                        <thead>
                        <tr>
                            <th class="alignleft">Сбор данных</th>

                            <th class="pad_left">Длина<br> волны</th>

                            <th>Ширина<br> полосы</th>

                            <th class="pad_left">ДВ<br> сравнения</th>

                            <th class="pad_right">Ширина<br> сравнения</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>Сигнал А</td>

                            <td class="pad_left">
                                <label class="checkbox">
                                    <input type="checkbox" name="group" checked="">

                                    <div class="check">
                                        <svg><use xlink:href="images/sprite.svg#ic_check"></use></svg>
                                    </div>
                                </label>

                                <div class="amount">
                                    <button type="button" class="btn minus">
                                        <svg><use xlink:href="images/sprite.svg#ic_arr_ver"></use></svg>
                                    </button>

                                    <input type="text" value="250" class="input" data-minimum="1" data-maximum="99999" data-step="1" data-unit="" maxlength="5">

                                    <button type="button" class="btn plus">
                                        <svg><use xlink:href="images/sprite.svg#ic_arr_ver"></use></svg>
                                    </button>
                                </div>
                            </td>

                            <td>
                                <img src="/web/images/tmp/software/software2_img4.svg" alt="">
                            </td>

                            <td>
                                <img src="/web/images/tmp/software/software2_img5.svg" alt="">
                            </td>

                            <td>
                                <img src="/web/images/tmp/software/software2_img6.svg" alt="">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <img src="/web/images/tmp/software/software2_img7.svg" alt="">
                </div>
            </div>

            <div class="col2">
                <img src="/web/images/tmp/software/software2_img3.svg" alt="">
            </div>
        </div>
    </div>
@endif