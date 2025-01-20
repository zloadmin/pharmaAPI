<div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Название</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          @foreach($laboratories as $laboratory)
              <tr>
                  <th scope="row">{{ $laboratory->id }}</th>
                  <td>{{ $laboratory->name }}</td>
                  <td>
                      <a href="#" wire:click="start({{ $laboratory->id }})" class="btn btn-success">
                        Начать
                      </a>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
</div>
