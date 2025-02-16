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

    public function moveToChromatographExampleLeftBox(): void
    {
        $this->changePlace(SessionComponentPlace::inChromatographExampleLeftBox);
    }

    public function moveToChromatographExampleRightBox(): void
    {
        $this->changePlace(SessionComponentPlace::inChromatographExampleRightBox);
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
        if ($this->isTypeWeighed()) {
            $this->moveToScalesTypeWeighed();
        } else {
            $this->moveToScalesTypeSimple($place);
        }
    }

    public function moveToScalesTypeWeighed(): void
    {
        if($this->isExistsWeighedComponents()) {
            $this->moveToTableAllScalesComponents();
            $this->moveToScalesWeighedComponents();
        }
    }

    public function moveToScalesTypeSimple(SessionComponentPlace $place): void
    {
        // 1 check if exists already comp and move to table them
        $this->moveToTableIfExistsOnPlace($place);
        // 2 change place
        $this->changePlace($place);
    }

    public function moveToTableAllScalesComponents(): void
    {
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesLeftBox);
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesRightBox);
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesBottomBox);
    }

    public function moveToScalesWeighedComponents(): void
    {
        $this->forceDelete();

        $this->weighedLeftSessionComponentWithTrashed->update([
            'place' => SessionComponentPlace::onScalesLeftBox,
            'deleted_at' => null,
            'is_dirty' => false
        ]);
        $this->weighedRightSessionComponentWithTrashed->update([
            'place' => SessionComponentPlace::onScalesRightBox,
            'deleted_at' => null,
            'is_dirty' => false
        ]);
        $this->weighedBottomSessionComponentWithTrashed->update([
            'place' => SessionComponentPlace::onScalesBottomBox,
            'deleted_at' => null,
            'is_dirty' => false
        ]);

    }

}