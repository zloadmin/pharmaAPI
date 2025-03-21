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
                        <div class="title">Поток</div>

                        <div class="field">
                            <div class="amount">
                                <button type="button" class="btn minus">
                                    <svg><use xlink:href="images/sprite.svg#ic_arr_ver"></use></svg>
                                </button>

                                <input type="number" min="0.001" max="999.999" step="0.001" wire:model="chromatograph_flow_speed" class="input" >

                                <button type="button" class="btn plus">
                                    <svg><use xlink:href="images/sprite.svg#ic_arr_ver"></use></svg>
                                </button>
                            </div>

                            <div class="unit">мл/мин</div>
                        </div>
                    </div>

                    <div class="section big">
                        <div class="title">Параметры давления</div>

                        <div class="row">
                            <div class="field">
                                <img src="/web/images/tmp/software/software3_img1.svg" alt="">
                            </div>

                            <div class="field">
                                <div class="label">Макс:</div>

                                <div class="amount">
                                    <button type="button" class="btn minus">
                                        <svg><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                                    </button>

                                    <input type="text" value="0.00" class="input blue" data-minimum="0" data-maximum="50" data-step="0.1" data-unit="" maxlength="5">

                                    <button type="button" class="btn plus">
                                        <svg><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                                    </button>
                                </div>

                                <div class="unit">бар</div>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="title">Время остановки</div>

                        <div class="field">
                            <img src="/web/images/tmp/software/software3_img2.svg" alt="">
                        </div>

                        <div class="field">
                            <label class="radio">
                                <input type="radio" name="group1">
                                <div class="check"></div>
                            </label>

                            <div class="amount">
                                <button type="button" class="btn minus">
                                    <svg><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                                </button>

                                <input type="text" value="1.00" class="input blue" data-minimum="0" data-maximum="50" data-step="0.1" data-unit="" maxlength="5">

                                <button type="button" class="btn plus">
                                    <svg><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                                </button>
                            </div>

                            <div class="unit">мин</div>
                        </div>
                    </div>

                    <div class="section">
                        <img src="/web/images/tmp/software/software3_img3.svg" alt="">
                    </div>
                </div>
            </div>

            <div class="col2">
                <img src="/web/images/tmp/software/software3_img4.svg" alt="">

                <div class="accordion">
                    <div class="accordion_item active">
                        <div class="head">
                            <img src="/web/images/tmp/software/ic_arr_ver.svg" alt="">

                            <div class="title"><b>Расписание</b> (пусто)</div>
                        </div>

                        <div class="data" style="display: block;">
                            <div class="warning">
{{--                                <span>Для программистов: инфа к табличке: Общее значение А и Б равно 100%;  Если А 70% то = Б 30%</span>--}}

                                <img src="/web/images/tmp/software/software3_img5.svg" alt="">
                            </div>

                            <div class="schedule_table_wrap">
                                <table class="schedule_table">
                                    <thead>
                                    <tr>
{{--                                        <th>Время (мин)</th>--}}
{{--                                        <th>A(%)</th>--}}
{{--                                        <th>B(%)</th>--}}
{{--                                        <th>Поток<br> (мл/мин)</th>--}}
                                        @foreach(\App\Models\Laboratory::$chromatographTableItemTypes as $name => $data)
                                            <th>{{ $data['title'] }}</th>
                                        @endforeach

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($laboratory->getChromatographTableItems() as $item)
                                        <tr>
                                            @foreach(\App\Models\Laboratory::$chromatographTableItemTypes as $name => $data)
                                                <td>{{ number_format($item[$name] ?? 0, $data['decimals']) }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach



{{--                                    <tr>--}}
{{--                                        <td>0.00</td>--}}
{{--                                        <td>100.0</td>--}}
{{--                                        <td>0.0</td>--}}
{{--                                        <td>0.0</td>--}}
{{--                                    </tr>--}}

{{--                                   --}}
                                    </tbody>
                                </table>
                            </div>

                            <img src="/web/images/tmp/software/software3_img6.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif