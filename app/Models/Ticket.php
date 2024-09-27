<?php

namespace App\Models;

use App\Enums\Ticket\TicketLevel;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'level' => TicketLevel::class
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(TicketVideo::class, 'ticket_id', 'id');
    }

    static function createFromStoreTicketRequest(StoreTicketRequest $request): self
    {
        return self::create([
            'number'                    => $request->number,
            'title'                     => $request->title,
            'description_path'          => $request->file('description')->store('ticket_descriptions'),
            'description_original_name' => $request->file('description')->getClientOriginalName(),
            'article_path'              => $request->file('article')->store('ticket_articles'),
            'article_original_name'     => $request->file('article')->getClientOriginalName(),
            'level'                     => $request->level,
        ]);
    }


    public function updateFromUpdateTicketRequest(UpdateTicketRequest $request): void
    {
        $this->number = $request->number;
        $this->title = $request->title;
        $this->level = $request->level;

        if ($request->hasFile('description')) {
            $this->description_path = $request->file('description')->store('ticket_descriptions');
            $this->description_original_name = $request->file('description')->getClientOriginalName();
        }
        if ($request->hasFile('article')) {
            $this->article_path = $request->file('article')->store('article_descriptions');
            $this->article_original_name = $request->file('article')->getClientOriginalName();
        }

        $this->update();
    }
}
