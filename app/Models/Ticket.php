<?php

namespace App\Models;

use App\Enums\Ticket\TicketLevel;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'videos' => 'json',
        'level'  => TicketLevel::class
    ];

    static function createFromStoreTicketRequest(StoreTicketRequest $request): self
    {
        return self::create([
            'number'                    => $request->number,
            'title'                     => $request->title,
            'description_path'          => $request->file('description')->store('ticket_descriptions'),
            'description_original_name' => $request->file('description')->getClientOriginalName(),
            'videos'                    => $request->videos,
            'level'                     => $request->level,
        ]);
    }


    public function updateFromUpdateTicketRequest(UpdateTicketRequest $request): void
    {
        $this->number = $request->number;
        $this->title = $request->title;
        $this->videos = $request->videos;
        $this->level = $request->level;

        if ($request->hasFile('description')) {
            $this->description_path = $request->file('description')->store('ticket_descriptions');
            $this->description_original_name = $request->file('description')->getClientOriginalName();
        }

        $this->update();
    }
}
