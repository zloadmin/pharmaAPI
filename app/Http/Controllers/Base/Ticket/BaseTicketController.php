<?php

namespace App\Http\Controllers\Base\Ticket;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Http\Requests\Ticket\UpdateVideoRequest;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\Ticket;

/**
 * @group [Админ] Билеты
 */
class BaseTicketController extends ApiController
{

    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket with=videos paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $tickets = Ticket::query()->with('videos');
        return TicketResource::collection($tickets->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket with=videos
     * @param Ticket $ticket
     * @return TicketResource
     */
    public function show(Ticket $ticket)
    {
        $ticket->load('videos');
        return new TicketResource($ticket);
    }


    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"\u041f\u043e\u043b\u0435 number \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f. (and 4 more errors)","errors":{"number":["\u041f\u043e\u043b\u0435 number \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."],"title":["\u041f\u043e\u043b\u0435 \u0437\u0430\u0433\u043e\u043b\u043e\u0432\u043e\u043a \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."],"description":["\u041f\u043e\u043b\u0435 description \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."],"article":["\u041f\u043e\u043b\u0435 article \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."],"level":["\u041f\u043e\u043b\u0435 level \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]}}
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket with=videos
     * @param StoreTicketRequest $request
     * @return TicketResource
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::createFromStoreTicketRequest($request);
        if ($request->has('videos')) {
            $ticket->videos()->createMany($request->videos);
        }
        $ticket->load('videos');
        return new TicketResource($ticket);
    }

    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The number field is required. (and 3 more errors)","errors":{"number":["The number field is required."],"title":["The title field is required."],"videos":["The videos field is required."],"level":["The level field is required."]}}
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket with=videos
     * @param Ticket $ticket
     * @param UpdateTicketRequest $request
     * @return TicketResource
     */
    public function update(Ticket $ticket, UpdateTicketRequest $request)
    {
        $ticket->updateFromUpdateTicketRequest($request);
        $ticket->load('videos');
        return new TicketResource($ticket);
    }

    /**
     * Обновить список видео
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"\u041f\u043e\u043b\u0435 videos.0.stage_name \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f. (and 1 more error)","errors":{"videos.0.stage_name":["\u041f\u043e\u043b\u0435 videos.0.stage_name \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."],"videos.0.url":["\u041f\u043e\u043b\u0435 videos.0.url \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]}}
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket with=videos
     * @param UpdateVideoRequest $request
     * @param Ticket $ticket
     * @return TicketResource
     */
    public function updateVideos(UpdateVideoRequest $request, Ticket $ticket)
    {
        $ticket->videos()->delete();
        if ($request->has('videos')) {
            $ticket->videos()->createMany($request->videos);
        }
        $ticket->load('videos');
        return new TicketResource($ticket);
    }


    /**
     * Удалить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=204 scenario="Deleted"
     */
    public function delete(Ticket $ticket)
    {
        $ticket->videos()->delete();
        $ticket->delete();
        return $this->respondDeleted();
    }
}
