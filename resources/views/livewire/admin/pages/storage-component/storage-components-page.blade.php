<div class="col-md-12">
    <div class="row mb-2">
        <div class="col-sm-4">
            <a href="{{ route('admin.component-create-page') }}" class="btn btn-danger mb-2" wire:navigate>
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
            <th>Короткое название</th>
            <th>Тип</th>
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
                <td>{{ $component->short_name }}</td>
                <td>
                    <span class="badge badge-{{ $component->type->badge() }}">
                        {{ $component->type->label() }}
                    </span>

                </td>
                <td>{{ $component->description }}</td>
                <td>{{ $component->created_at->diffForHumans() }}</td>

                <td class="table-action text-right">
                    <a href="{{ route('admin.component-edit-page', $component) }}" class="action-icon" wire:navigate>
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                    <a href="#" class="action-icon"
                       wire:click.prevent="delete({{ $component->id }})"
                       wire:confirm="Удалить?">
                        <i class="mdi mdi-delete"></i>
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $components->links() }}
</div>