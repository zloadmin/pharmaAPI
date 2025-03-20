<div>
    <form wire:submit.prevent="save">
        <ul class="nav nav-tabs nav-bordered mb-3">
            @foreach($tabs as $key => $data)
                <li class="nav-item">
                    <a href="#tab-{{ $key }}" data-toggle="tab" aria-expanded="false"
                       class="nav-link {{ $key == $currentTab ? 'active' : '' }}
                            @foreach($data['fields'] as $field)
                                @error($field)
                                    has-error
                                @enderror
                            @endforeach
                       "
                       wire:click="showTab('{{ $key }}')">
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block">{{ $data['title'] }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
        <div class="tab-content">
            @foreach($tabs as $key => $title)
                <div class="tab-pane {{ $key == $currentTab ? 'active show' : '' }}" id="tab-{{ $key }}">
                    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-' . $key)
                </div>
            @endforeach
        </div>

        <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="save">
            <div wire:loading.delay wire:target="save">
                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                Загрузка...
            </div>
            <div wire:loading.delay.remove wire:target="save">
                Сохранить
            </div>
        </button>
    </form>

</div>
