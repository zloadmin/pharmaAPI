<section class="warehouse">
    <div class="back_btn">
        <a href="/">
            <div class="icon">
                <svg><use xlink:href="/web/images/sprite.svg#ic_arr_hor"></use></svg>
            </div>
            <span>Назад</span>
        </a>
    </div>

    <div class="image">
        <img src="/web/images/tmp/warehouse_img.jpg" alt="" loading="lazy" class="img">
        <livewire:stages.storage-stage.storage-stage-component-points :session='$session'  />
        <livewire:stages.storage-stage.storage-stage-component-modal :session='$session'  />
    </div>

    <livewire:stages.storage-stage.storage-stage-component-cart :session='$session'/>
</section>