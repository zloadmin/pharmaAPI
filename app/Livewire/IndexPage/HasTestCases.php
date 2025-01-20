<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\LaboratorySession;
use Illuminate\Support\Str;

trait HasTestCases
{

    public function filledCartTestCase($laboratoryId)
    {
        $laboratory = Laboratory::find($laboratoryId);
        if($laboratory) {
            $laboratorySession = $this->createSession($laboratory);
            $laboratorySession->unlockWeighting();
            $this->fillCart($laboratory, $laboratorySession);
            return redirect()->route('weighting-stage', $laboratorySession->uuid);
        }
    }
    private function fillCart(Laboratory $laboratory, LaboratorySession $laboratorySession): void
    {
        $fillCartIds = $this->getCartIds($laboratory->id);
        foreach ($fillCartIds as $fillCartId) {
            $laboratorySession->sessionComponents()->create([
                'place' => SessionComponentPlace::inCart,
                'component_id' => $fillCartId,
            ]);
        }
    }
    private function createSession(Laboratory $laboratory) : LaboratorySession
    {
        return LaboratorySession::create([
            'user_id'       => 1,
            'uuid'          => Str::uuid(),
            'laboratory_id' => $laboratory->id
        ]);
    }
    public function getCartIds($laboratoryId) : array
    {
        switch ($laboratoryId) {
            case 1:
                return [];
            case 2:
                return [26, 26, 1, 1, 38, 37, 23, 23, 45, 45, 41];
        }
    }
}