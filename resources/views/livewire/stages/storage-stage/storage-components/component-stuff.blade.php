<div style="float: left; border: 1px solid red; padding: 5px; margin: 5px">
    @include('livewire.stages.storage-stage.storage-components.component-card')
    <div class="form">
        <form wire:submit.prevent="addToCart">
            <input type="number" min="1" max="99" wire:model="value">
            <div>@error('value') {{ $message }} @enderror</div>
            <hr>
            <button wire:click="addValue" type="button">+</button>
            <button wire:click="removeValue" type="button">-</button>
            <hr>
            <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="addToCart">
                <div wire:loading.delay wire:target="addToCart">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </div>
                <div wire:loading.delay.remove wire:target="addToCart">
                    Add
                </div>
            </button>
        </form>
    </div>
</div>