<section class="modal" id="tasks_modal">
    <div class="modal_title">Задания</div>

    <div class="head">
{{--        <div class="exp">Начните проходить обучение и отслеживайте свой прогресс</div>--}}

        <div class="ticket">
            <img src="/web/images/ic_task_ticket.svg" alt="" loading="lazy">
            <span>Билет: №{{ $laboratory->id }}</span>
        </div>

        <div class="count">
            <img src="/web/images/ic_task.svg" alt="" loading="lazy">
            <span>Задач: {{ count($laboratory->tasks) }}</span>
        </div>

{{--        <div class="progress">68%</div>--}}
    </div>

{{--    <div class="filter">--}}
{{--        <button class="btn active" data-filter="all">Все</button>--}}

{{--        <button class="btn" data-filter="in_process">В процессе</button>--}}

{{--        <button class="btn" data-filter="finished">Завершенные</button>--}}
{{--    </div>--}}

    <div class="list">
        @foreach($laboratory->tasks as $number => $task)
            <div class="task all in_process">
{{--                <div class="status">В процессе</div>--}}

                <div class="info">
                    <div class="number">{{ $number + 1 }}</div>

{{--                    <div class="type">Задача</div>--}}

{{--                    <div class="level">Простой</div>--}}
                </div>

                <div>
                    <div class="name">{{ $task->name }}</div>

                    <div class="desc">
                        {{ $task->description }}
                    </div>
                </div>

{{--                <div class="link">--}}
{{--                    <a href="/task_modal2.html" data-type="ajax">--}}
{{--                        <span>Открыть</span>--}}
{{--                        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_arrow_hor"></use></svg>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        @endforeach


    </div>
</section>
<livewire:stages.modals.notepad-modal :session='$session' />
<livewire:stages.modals.check-list-modal :session='$session' />
<section class="modal" id="periodic_table_modal">
    <div class="modal_title">Таблица<br> Менделеева</div>
    <img src="/web/images/tmp/periodic_table_img.png" alt="" loading="lazy">
</section>
@if ($pharmacologicalArticle)
<section class="modal" id="pharmacological_article_modal" style="width: 938px">
    <embed src="{{ $pharmacologicalArticle->file_url }}#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="100%" alt="pdf" pluginspage="https://www.adobe.com/products/acrobat/readstep2.html">
</section>
@endif