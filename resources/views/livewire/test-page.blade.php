<div>

    <h3>Лабораторные работы тестоые заготовки</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ШАГ</th>
          <th scope="col">Название</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      @foreach($testCases as $step =>  $testCase)
          <tr>
              <th scope="row">{{ $step + 1 }}</th>
              <td>
                  {!! str_replace("\n", "<br>", $testCase['title']) !!}
              </td>
              <td>
                  <a wire:click="{{ $testCase['method'] }}()" class="btn btn-success">
                      Начать
                  </a>
              </td>
          </tr>
      @endforeach
      </tbody>
    </table>
</div>
