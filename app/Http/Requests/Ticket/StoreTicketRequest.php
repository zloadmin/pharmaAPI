<?php

namespace App\Http\Requests\Ticket;

use App\Enums\Ticket\TicketLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
{


    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'number'              => ['description' => '№ Билета', 'example' => '#120'],
            'title'               => ['description' => 'Название билета', 'example' => 'Теорема пифагора'],
            'description'         => ['description' => 'Описание задания PDF'],
            'article'             => ['description' => 'Фармакопейная статья PDF'],
            'videos.*'            => ['description' => 'Список видео'],
            'videos.*.name'       => ['description' => 'Видео название', 'example' => 'видео 123'],
            'videos.*.stage_name' => ['description' => 'Видео название этапа задания', 'example' => 'этап 3'],
            'videos.*.url'        => ['description' => 'Видео ссылка', 'example' => 'https://video.com/file.mp4'],
            'level'               => ['description' => 'Уровень сложности', 'example' => TicketLevel::random()],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number'              => ['required', 'string', 'max:250'],
            'title'               => ['required', 'string', 'max:250'],
            'description'         => ['required', 'file', 'extensions:pdf'],
            'article'             => ['required', 'file', 'extensions:pdf'],
            'videos.*'            => ['nullable', 'array'],
            'videos.*.name'       => ['required', 'string', 'max:250'],
            'videos.*.stage_name' => ['required', 'string', 'max:250'],
            'videos.*.url'        => ['required', 'url', 'max:250'],
            'level'               => ['required', Rule::in(TicketLevel::values())],
        ];
    }
}
