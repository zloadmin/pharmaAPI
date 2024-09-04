<?php

namespace App\Http\Requests\Ticket;

use App\Enums\Ticket\TicketLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'number'      => ['description' => '№ Билета', 'example' => '#120'],
            'title'       => ['description' => 'Название билета', 'example' => 'Теорема пифагора'],
            'description' => ['description' => 'Описание задания PDF'],
            'videos'      => ['description' => 'Список видео'],
            'videos.*'    => ['description' => 'Видео ссылка', 'example' => 'https://video.com/file.mp4'],
            'level'       => ['description' => 'Уровень сложности', 'example' => TicketLevel::random()],
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
            'number'      => ['required', 'string', 'max:250'],
            'title'       => ['required', 'string', 'max:250'],
            'description' => ['nullable', 'file', 'extensions:pdf'],
            'videos'      => ['required', 'array'],
            'videos.*'    => ['required', 'url'],
            'level'       => ['required', Rule::in(TicketLevel::values())],
        ];
    }
}
