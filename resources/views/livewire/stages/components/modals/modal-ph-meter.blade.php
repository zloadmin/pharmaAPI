<div class="exhaust_modal object_modal big" id="ph_meter_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-ph-meter')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="title">Взаимодействие с ph-Meter
{{--            {{ $this->cookingTableChooseMode ?? '' }}--}}
        </div>
        @if($sessionComponent)
            <div class="border">
                <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $sessionComponent->place }}')">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                </button>

                <div class="name">{{ $sessionComponent->getName() }}</div>

                <div class="overflow">
                    <div class="thumb">
                        <img src="{{ $sessionComponent->getImageUrl() }}" alt="" loading="lazy">
                    </div>

                    <div class="type">Тип: <span>{{ $sessionComponent->getTypeLabel() }}</span></div>
                </div>

                <div class="status">
                    <div class="label">Статус:</div>
                    <div class="val">{!! $sessionComponent->getStatus() !!}</div>
                </div>
            </div>
            <div class="install_electrodes">
                <div class="field">
                    <input type="text" inputmode="numeric" name="" value="" class="input" placeholder="{{ $isSetElectrodes ? $sessionComponent->component->ph_meter_value : '000.0000'  }}">
                    <div class="unit">pH</div>
                </div>
                <div class="exp">Установка электродов</div>
                <div class="btns">
                    <button class="btn {{ $isSetElectrodes ? 'border' : '' }}" type="button" wire:click="unsetElectrodes">Изьять</button>
                    <button class="btn {{ !$isSetElectrodes ? 'border' : '' }}" type="button" wire:click="setElectrodes">Установить</button>
                </div>
            </div>
        @else
            <div class="border empty">
                <button class="add_btn" type="button" wire:click="setPHMeterChooseMode">
                    <span class="icon">+</span>
                    <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                </button>
            </div>
        @endif

    @endif
</div>
