<div class="col-md-12">
    <div class="row mb-2">
        <div class="col-sm-4">
            <a href="{{ route('admin.video-create-page') }}" class="btn btn-danger mb-2" wire:navigate>
                <i class="mdi mdi-plus-circle mr-2"></i> Создать
            </a>
        </div>

    </div>

    <table class="table table-centered mb-2">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Название файла</th>
            <th>Размер</th>
            <th class="">

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->name }}</td>
                <td>{{ $video->original_name }}</td>
                <td>{{ round($video->size / 1024 / 1024, 2) }} Mb</td>

                <td class="table-action text-right">
                    <a href="{{ $video->file_url }}" class="action-icon" target="_blank">
                        <i class="mdi mdi-play"></i>
                    </a>
                    <a href="{{ route('admin.video-edit-page', $video) }}" class="action-icon" wire:navigate>
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                    <a href="#" class="action-icon"
                       wire:click.prevent="delete({{ $video->id }})"
                       wire:confirm="Удалить?">
                        <i class="mdi mdi-delete"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $videos->links() }}
</div>