<div class="col-md-12">
    <div class="row mb-2">
        <div class="col-sm-4">
            <a href="{{ route('admin.pharmacological-article-create-page') }}" class="btn btn-danger mb-2" wire:navigate>
                <i class="mdi mdi-plus-circle mr-2"></i> Создать
            </a>
        </div>

    </div>

    <table class="table table-centered mb-2">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th class="">

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->name }}</td>

                <td class="table-action text-right">
                    <a href="{{ $article->file_url }}" class="action-icon" target="_blank">
                        <i class="mdi mdi-pdf-box"></i>
                    </a>
                    <a href="{{ route('admin.pharmacological-article-edit-page', $article) }}" class="action-icon" wire:navigate>
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                    <a href="#" class="action-icon"
                       wire:click.prevent="delete({{ $article->id }})"
                       wire:confirm="Удалить?">
                        <i class="mdi mdi-delete"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
</div>