<div class="col-md-12">
    <div class="row mb-2">
        <div class="col-sm-2">
            <!--- Образец Field --->
            <div class="form-group">
                <label for="is_example">Образец</label>
                <select class="form-control @error('is_example') is-invalid @enderror" wire:model.live="is_example">
                    <option value=""></option>
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
                @error('is_example')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <img src="/web/images/examples100h.jpg" alt="" style="height: 100px">
        </div>
        <div class="col-sm-4">
            <label for="" class="w-100">&nbsp;</label>
            <a href="{{ route('admin.component-create-page') }}" class="btn btn-danger mb-2 float-right" wire:navigate>
                <i class="mdi mdi-plus-circle mr-2"></i> Создать
            </a>
        </div>

    </div>

    {{--    <a href="{{ route('create-quiz-page') }}" class="btn btn-danger mb-3" wire:navigate>--}}
    {{--        <i class="mdi mdi-plus-circle mr-2"></i>--}}
    {{--        Создать--}}
    {{--    </a>--}}
    <table class="table table-centered mb-2">
        <thead class="thead-light">
        <tr>
            <th>Изображение</th>
            <th>Название</th>
            <th>Образец</th>
            <th>Короткое название</th>
            <th>Тип</th>
            <th>Вес</th>
            <th>Положение на весах</th>
            <th>Описание</th>
            <th>Добавлен</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($components as $component)
            <tr>
                <td>
                    <img src="{{ $component->image_url }}" alt="" class="img-thumbnail" style="width: 100px">
                </td>
                <td>{{ $component->name }}</td>
                <td>{{ $component->$is_example ? 'Да' : 'Нет' }}</td>
                <td>{{ $component->short_name }}</td>
                <td>
                    <span class="badge badge-{{ $component->type->badge() }}">
                        {{ $component->type->label() }}
                    </span>
                </td>
                <td>{{ $component->weight }}</td>
                <td>
                    <span class="badge badge-{{ $component->on_scales_place->badge() }}">
                        {{ $component->on_scales_place->label() }}
                    </span>
                </td>
                <td>{{ $component->description }}</td>
                <td>{{ $component->created_at->diffForHumans() }}</td>

                <td class="table-action text-right">
                    @if ($component->is_example)
                        <a href="#" class="action-icon"
                           wire:click.prevent="duplicate({{ $component->id }})"
                           wire:confirm="Создать компонент на основе образца?">
                            <i class="mdi mdi-content-duplicate"></i>
                        </a>
                    @else
                        <a href="{{ route('admin.component-edit-page', $component) }}" class="action-icon" wire:navigate>
                            <i class="mdi mdi-square-edit-outline"></i>
                        </a>
                        <a href="#" class="action-icon"
                           wire:click.prevent="delete({{ $component->id }})"
                           wire:confirm="Удалить?">
                            <i class="mdi mdi-delete"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $components->links() }}
</div>