<?php
declare(strict_types=1);


namespace App\Models\SessionComponent;


use App\Enums\SessionComponent\SessionComponentPlace;

/**
 * @method update([] $array)
 */
trait SessionComponentMove
{

    public function changePlace(SessionComponentPlace $place): void
    {
        $this->update(['place' => $place]);
    }

    public function moveToCart(): void
    {
        $this->changePlace(SessionComponentPlace::inCart);
    }

    public function moveToWeightingTable(): void
    {
        $this->changePlace(SessionComponentPlace::onWeightingTable);
    }
    public function moveToCookingTable(): void
    {
        $this->changePlace(SessionComponentPlace::onCookingTable);
    }

    public function moveToSink(): void
    {
        $this->changePlace(SessionComponentPlace::inSink);
    }
    public function moveToTableIfExistsOnPlace(SessionComponentPlace $place): void
    {
        $existsSessionComponent = self::bySession($this->session)->byPlace($place)->first();
        $existsSessionComponent?->moveToWeightingTable();
    }
    public function moveToScales(SessionComponentPlace $place): void
    {
        if ($this->isWeighed() && $this->isExistsWeighedComponents()) {
            $this->moveToTableAllScalesComponents();
            $this->moveToScalesWeighedComponents();
        } else {
            // 1 check if exists already comp and move to table them
            $this->moveToTableIfExistsOnPlace($place);
            // 2 change place
            $this->changePlace($place);
        }
    }
    public function moveToTableAllScalesComponents(): void
    {
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesLeftBox);
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesRightBox);
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesBottomBox);
    }

    public function moveToScalesWeighedComponents(): void
    {
        $this->weighedLeftSessionComponent->changePlace(SessionComponentPlace::onScalesLeftBox);
        $this->weighedRightSessionComponent->changePlace(SessionComponentPlace::onScalesRightBox);
        $this->weighedBottomSessionComponent->changePlace(SessionComponentPlace::onScalesBottomBox);
    }

}