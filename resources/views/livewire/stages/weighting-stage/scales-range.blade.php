@if ($this->isShowRange)
{{--    <div style="border: 2px solid black;">--}}
        <div class="range range1 rangeBlock" style="display: none">
            <input type="hidden" id="range1" name="range1" value="{{ $value }}">
            <div class="field">
                <input type="text" inputmode="numeric" name="" value="0.000" class="input from">

                <div class="unit">
                    <span>(г)</span>
                    <svg class="arr"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                </div>
            </div>

            <div class="btns">
                <button class="btn border" type="button" onclick="rangeMinus()">Отнять</button>
                <button class="btn" type="button" onclick="rangePlus()">Добавить</button>
            </div>
        </div>
{{--    </div>--}}
@endif
