<div class="col-md-12">


    <table class="table table-centered mb-2">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Начало</th>
            <th>Название</th>
            <th>Компонентов</th>
            <th class="">

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{ $session->id }}</td>
                <td>
                    {{ $session->created_at->diffForHumans() }}
                    <br>
                    {{ $session->created_at->format('d.m.Y H:i') }}
                </td>
                <td>{{ $session->laboratory->name ?? '' }}</td>
                <td>{{ $session->session_components_count }}</td>
                <td class="table-action text-right">
                    <a href="{{ route('index-stage', $session->uuid) }}" class="btn btn-success">
                        Войти
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sessions->links() }}
</div>
