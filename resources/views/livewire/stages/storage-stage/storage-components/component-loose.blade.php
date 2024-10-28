<div style="float: left; border: 1px solid red; padding: 5px; margin: 5px">
    @include('livewire.stages.storage-stage.storage-components.component-card')
    <div class="form">
        <form wire:submit.prevent="addToCart">
            <label for="">гм</label>
            <input type="number" min="0.00001" max="10" step="0.00001" wire:model="value">
            <div>@error('value') {{ $message }} @enderror</div>
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