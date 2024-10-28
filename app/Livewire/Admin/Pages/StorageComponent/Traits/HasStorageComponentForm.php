<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\StorageComponent\Traits;


use App\Enums\StorageComponent\StorageComponentType;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

trait HasStorageComponentForm
{
    use WithFileUploads;

    public $name = '';
    public $description = '';
    public $type = '';
    public $image = '';

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:250'],
            'description' => ['required', 'string'],
            'type'        => ['required', Rule::in(StorageComponentType::values())],
            'image'       => ['required', 'image']
        ];
    }
}