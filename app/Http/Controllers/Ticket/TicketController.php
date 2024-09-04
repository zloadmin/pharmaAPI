<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

/**
 * @group Билеты
 */
class TicketController extends ApiController
{

    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $tickets = Ticket::query();
        return TicketResource::collection($tickets->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket
     * @param Ticket $ticket
     * @return TicketResource
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }


    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The number field is required. (and 4 more errors)","errors":{"number":["The number field is required."],"title":["The title field is required."],"description":["The description field is required."],"videos":["The videos field is required."],"level":["The level field is required."]}}
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket
     * @param StoreTicketRequest $request
     * @return TicketResource
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::createFromStoreTicketRequest($request);
        return new TicketResource($ticket);
    }

    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The number field is required. (and 3 more errors)","errors":{"number":["The number field is required."],"title":["The title field is required."],"videos":["The videos field is required."],"level":["The level field is required."]}}
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket
     * @param Ticket $ticket
     * @param UpdateTicketRequest $request
     * @return TicketResource
     */
    public function update(Ticket $ticket, UpdateTicketRequest $request)
    {
        $ticket->updateFromUpdateTicketRequest($request);
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
        $ticket->delete();
        return $this->respondDeleted();
    }
}
