<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            @error('file')
                <div class="alert alert-danger mb-2">
                    <span class="error">{{ $message }}</span>
                </div>
            @enderror
            @if ($rowResult)
                <div class="alert alert-warning">
                    <ol>
                        @foreach($rowResult as $index =>  $result)
                            <li>
                                Статус: {{ $result['status'] ? 'Успешно' : 'Ошибка' }}
                                @if (!empty($result['errors']))
                                    @foreach($result['errors'] as $message)
                                        <b>{{ $message }}</b>
                                    @endforeach
                                @endif
                            </li>
                        @endforeach
                    </ol>

                </div>
            @endif
        </div>
        <div class="col-md-12">
            <form wire:submit.prevent="import">
                <button type="button" class="btn btn-danger mb-2" wire:click="$dispatch('showModal', {data: {'alias' : 'modals.student.create-student-modal'}})">
                    Создать
                </button>
                <!--- Файл Field --->
                <button type="button" class="btn btn-primary mb-2 btn-file">
                    <div wire:loading.remove wire:target="file">
                        <i class="mdi mdi-upload mr-1"></i>
                        Импорт
                    </div>
                    <!-- File Input -->
                    <div wire:loading wire:target="file">
                        <span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>
                        Обработка...
                    </div>
                    <input class="file_input_hidden" type="file" wire:model="file" >
                </button>
                <a href="/student_example.xlsx" class="btn btn-warning mb-2" target="_blank">
                    Скачать пример файла
                </a>
            </form>

        </div>

    </div>

    <livewire:data-tables.students-table />
</div>
