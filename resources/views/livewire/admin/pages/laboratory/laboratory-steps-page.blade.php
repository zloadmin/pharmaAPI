<div class="col-md-12">
    <div class="row mb-2">
        <div class="col-sm-4">
            <a href="{{ route('admin.laboratory-step-create-page', $laboratory) }}" class="btn btn-danger mb-2"
               wire:navigate>
                <i class="mdi mdi-plus-circle mr-2"></i> Создать
            </a>
        </div>

    </div>


    <table class="table table-centered mb-2">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($steps as $step)
            <tr>
                <td>{{ $step->position }}</td>
                <td>{{ $step->name }}</td>
                <td class="table-action text-right">

                    <a href="{{ route('admin.laboratory-step-edit-page', [$laboratory, $step]) }}" class="action-icon" wire:navigate>
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
{{--                    <a href="#" class="action-icon"--}}
{{--                       wire:click.prevent="delete({{ $step->id }})"--}}
{{--                       wire:confirm="Удалить?">--}}
{{--                        <i class="mdi mdi-delete"></i>--}}
{{--                    </a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $steps->links() }}
</div>