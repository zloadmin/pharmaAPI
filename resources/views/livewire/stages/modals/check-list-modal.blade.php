<section class="modal fancybox__content modal_static" id="pay_slip_modal" @if ($isShow) style="display: block" @endif>
    @if ($isShow)
        <div class="status_wrap">
            <div class="status">
                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_video_play"></use></svg>
                <span>В процессе</span>
            </div>
        </div>

        <div class="modal_title">Расчетный лист</div>

        <div class="modal_desc">Вам необходимо внести молекулярную массу компонентов: Для этого восползуйтесь таблицей «Менделеева» и калькулятором.</div>

        <form wire:submit.prevent="check">

            <div class="list">
                @foreach(\App\Models\Laboratory::$checkValues as $checkValue)
                    <div class="item">
                        <div class="thumb">
                            <img src="/web/images/tmp/pay_slip_modal_thumb.png" alt="" loading="lazy">
                        </div>
                        <div>
                            <div class="indicator {{ $check_value_statuses[$checkValue['name']] }}"></div>
                            <div class="name">{{ $checkValue['title'] }}</div>
                            @error('check_values.' . $checkValue['name'])
                                <div class="name" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="value">
                                <input type="number" step="0.0001" min="0.0001" max="999.9999" wire:model="check_values.{{ $checkValue['name'] }}" class="input" placeholder="000.0000">
                                <div class="unit">
                                                                            <span>(мл)</span>
{{--                                    <svg class="arr"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>--}}
                                </div>
                            </div>
{{--                            <button class="add_btn">Внести</button>--}}
                            <button class="add_btn" wire:loading.attr="disabled" wire:target="check">
                                <div wire:loading.delay wire:target="check">
                                    Загрузка...
                                </div>
                                <div wire:loading.delay.remove wire:target="check">
                                    Внести
                                </div>
                            </button>
                        </div>
                    </div>
                @endforeach



{{--                <div class="item">--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/web/images/tmp/pay_slip_modal_thumb.png" alt="" loading="lazy">--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <div class="indicator red"></div>--}}

{{--                        <div class="name">Компонент - реанет химический №1, для  хим раствора сериала «Во все тяжкие»</div>--}}

{{--                        <div class="value">--}}
{{--                            <input type="number" inputmode="numeric" name="" value="" class="input" placeholder="0.000">--}}

{{--                            <div class="unit">--}}
{{--                                <span>(мл)</span>--}}
{{--                                <svg class="arr"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <button class="add_btn">Внести</button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="item">--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/web/images/tmp/pay_slip_modal_thumb.png" alt="" loading="lazy">--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <div class="indicator green"></div>--}}

{{--                        <div class="name">Компонент - реанет химический №1, для  хим раствора сериала «Во все тяжкие»</div>--}}

{{--                        <div class="value">--}}
{{--                            <input type="number" inputmode="numeric" name="" value="" class="input" placeholder="0.000">--}}

{{--                            <div class="unit">--}}
{{--                                <span>(мл)</span>--}}
{{--                                <svg class="arr"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <button class="add_btn">Внести</button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="item">--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/web/images/tmp/pay_slip_modal_thumb.png" alt="" loading="lazy">--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <div class="indicator green"></div>--}}

{{--                        <div class="name">Компонент - реанет химический №1, для  хим раствора сериала «Во все тяжкие»</div>--}}

{{--                        <div class="value">--}}
{{--                            <input type="number" inputmode="numeric" name="" value="" class="input" placeholder="0.000">--}}

{{--                            <div class="unit">--}}
{{--                                <span>(мл)</span>--}}
{{--                                <svg class="arr"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <button class="add_btn">Внести</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <button class="check_btn" wire:loading.attr="disabled" wire:target="check">
                <div wire:loading.delay wire:target="check">
                    Загрузка...
                </div>
                <div wire:loading.delay.remove wire:target="check">
                    Проверить
                </div>
            </button>
        </form>

        <button class="f-button is-close-btn" title="Закрыть" type="button" wire:click="$dispatch('hide-modal-check-list')">
            <svg><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
        </button>
    @endif
</section>


{{--<section class="modal fancybox__content modal_static" id="notepad_modal" @if ($isShow) style="display: block" @endif>--}}
{{--    @if ($isShow)--}}
{{--        <div class="modal_title">Блокнот</div>--}}
{{--        <div class="modal_desc">Заметки будут здесь храниться только в текущей сесии (до перезагрузки браузера)</div>--}}

{{--        <div class="list">--}}
{{--            <div class="item" style="max-height: 300px; overflow: auto">--}}
{{--                @foreach(explode(PHP_EOL, $this->notepad_text) as $line)--}}
{{--                    <p>{{ $line }}</p>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <form wire:submit.prevent="addText" class="form">--}}
{{--            <div class="line">--}}
{{--                <div class="field">--}}
{{--                    <input type="text" wire:model="text" class="input" placeholder="Начните вводить ваш текст">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <button class="f-button is-close-btn" title="Закрыть" type="button" wire:click="$dispatch('hide-modal-notepad')">--}}
{{--            <svg><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>--}}
{{--        </button>--}}
{{--    @endif--}}
{{--</section>--}}