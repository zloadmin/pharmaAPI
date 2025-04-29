<div>
    <form wire:submit.prevent="save">
    <div class="row">
        <div class="col-sm-2 mb-2 mb-sm-0">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach($tabs as $key => $data)
                    <a class="
                    nav-link {{ $key == $currentTab ? 'active show' : '' }}
                        @foreach($data['fields'] as $field)
                                @error($field)
                                    text-danger
                                @enderror
                        @endforeach
                    "
                       id="{{ $key }}-tab" data-toggle="pill" href="#tab-{{ $key }}"
                       role="tab"
                       aria-controls="{{ $key }}"
                       aria-selected="{{ $key == $currentTab ? 'true' : 'false' }}"
                       wire:click="showTab('{{ $key }}')"
                    >
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block">{{ $data['title'] }}</span>
                    </a>
                @endforeach
            </div>
        </div> <!-- end col-->

        <div class="col-sm-10">
            <div class="tab-content" id="v-pills-tabContent">
                @foreach($tabs as $key => $title)
                    <div class="tab-pane {{ $key == $currentTab ? 'active show' : '' }}" id="tab-{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}">
                        @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-' . $key)
                    </div>
                @endforeach
            </div> <!-- end tab-content-->
            <button class="btn btn-primary mt-2" wire:loading.attr="disabled" wire:target="save">
                <div wire:loading.delay wire:target="save">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Загрузка...
                </div>
                <div wire:loading.delay.remove wire:target="save">
                    Сохранить
                </div>
            </button>
        </div> <!-- end col-->
    </div>
    <!-- end row-->
    </form>

</div>
