
<div class="row mb-3">
    <div class="col-md-12">
        <button class="btn btn-success" type="button" wire:click="addCheckValue">Добавить</button>
    </div>
</div>

@foreach($checkValues as $index => $checkValue)
    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-check-values.check-value')
@endforeach

{{--@foreach(\App\Models\Laboratory::$checkValues as $checkValue)--}}
{{--    @foreach(\App\Models\Laboratory::$checkValueTypes as $checkValueType)--}}
{{--        <!--- {{ $checkValue['title'] }} {{ $checkValueType['title'] }} Field --->--}}
{{--        <div class="form-group">--}}
{{--            <label for="check_values.{{ $checkValue['name'] . '_' . $checkValueType['name'] }}">{{ $checkValue['title'] }} {{ $checkValueType['title'] }}</label>--}}
{{--            <input class="form-control @error('check_values.' . $checkValue['name'] . '_' . $checkValueType['name']) is-invalid @enderror"--}}
{{--                   type="number" step="0.0001" min="0.0001" max="999.9999"--}}
{{--                   wire:model="check_values.{{ $checkValue['name'] . '_' . $checkValueType['name'] }}">--}}
{{--            @error('check_values.' . $checkValue['name'] . '_' . $checkValueType['name'])--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--@endforeach--}}