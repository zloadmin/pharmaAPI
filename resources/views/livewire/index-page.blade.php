<div>
    <h3>Лабораторные работы</h3>
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
    <h3>Лабораторные работы тестоые заготовки</h3>
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
              @foreach($testCases as $testCase)
                  <tr>
                      <th scope="row">{{ $laboratory->id }}</th>
                      <td>{{ $laboratory->name }} ({{ $testCase['title'] }})</td>
                      <td>
                          <a href="#" wire:click="{{ $testCase['method'] }}({{ $laboratory->id }})" class="btn btn-success">
                              Начать
                          </a>
                      </td>
                  </tr>
              @endforeach
          @endforeach
      </tbody>
    </table>
</div>
