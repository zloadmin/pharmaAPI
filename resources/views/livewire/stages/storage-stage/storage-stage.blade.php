<div class="main">
    @include('components.layouts.web.header')
    @include('components.layouts.web.change-stage-menu')
    <section class="warehouse">
        @include('livewire.stages.blocks.back-button')

        <div class="image">
            <img src="/web/images/tmp/warehouse_img.jpg" alt="" loading="lazy" class="img">
            <livewire:stages.storage-stage.storage-stage-component-points :session='$session' />
            <livewire:stages.components.modals.modal-storage-component :session='$session' />
            <livewire:stages.components.modals.modal-cart-component :session='$session' />
        </div>

        <livewire:stages.components.component-cart :session='$session'/>
    </section>
</div>
