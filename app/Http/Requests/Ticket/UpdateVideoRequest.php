<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoRequest extends FormRequest
{

    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'videos.*'            => ['description' => 'Список видео'],
            'videos.*.name'       => ['description' => 'Видео название', 'example' => 'видео 123'],
            'videos.*.stage_name' => ['description' => 'Видео название этапа задания', 'example' => 'этап 3'],
            'videos.*.url'        => ['description' => 'Видео ссылка', 'example' => 'https://video.com/file.mp4'],
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
            'videos.*'            => ['nullable', 'array'],
            'videos.*.name'       => ['required', 'string', 'max:250'],
            'videos.*.stage_name' => ['required', 'string', 'max:250'],
            'videos.*.url'        => ['required', 'url', 'max:250'],
        ];
    }
}
