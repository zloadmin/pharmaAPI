<?php

namespace App\Models;

use App\Enums\SessionComponent\SessionComponentPlace;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class SessionComponent extends Model
{
    use HasFactory;

    protected $casts = [
        'place' => SessionComponentPlace::class
    ];
    protected $guarded = [];

    public function component(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'component_id');
    }

    public function weighedLeftComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_left_component_id');
    }

    public function weighedRightComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_right_component_id');
    }

    public function weighedBottomComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_bottom_component_id');
    }

    /**
     * Scope a query to only include by session.
     *
     * @param Builder $query
     * @param string $session
     * @return Builder
     */
    public function scopeBySession(Builder $query, string $session): Builder
    {
        return $query->where('session', $session);
    }

    /**
     * Scope a query to only include by place.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByPlace($query, SessionComponentPlace $place)
    {
        return $query->where('place', $place);
    }

    /**
     * Scope a query to only include in cart.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInCart($query)
    {
        return $query->where('place', SessionComponentPlace::inCart);
    }

    /**
     * Scope a query to only include on table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnTable($query)
    {
        return $query->where('place', SessionComponentPlace::onTable);
    }

    public function getValueTextAttribute(): string
    {
        if ($this->valueStuff) {
            return sprintf('%d шт', $this->valueStuff);
        }
        if ($this->valueLoose) {
            return sprintf('%.5f гм', $this->valueLoose);
        }
        if ($this->valueLiquid) {
            return sprintf('%.5f мг', $this->valueLiquid);
        }

        return '';
    }

    private function changePlace(SessionComponentPlace $place): void
    {
        $this->update(['place' => $place]);
    }

    public function moveToCart(): void
    {
        $this->changePlace(SessionComponentPlace::inCart);
    }

    public function moveToTable(): void
    {
        $this->changePlace(SessionComponentPlace::onTable);
    }

    public function moveToSink(): void
    {
        $this->changePlace(SessionComponentPlace::inSink);
    }

    public function moveToTableIfExistsOnPlace(SessionComponentPlace $place): void
    {
        $existsSessionComponent = self::bySession($this->session)->byPlace($place)->first();
        $existsSessionComponent?->moveToTable();
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
        $this->weighedLeftComponent->changePlace(SessionComponentPlace::onScalesLeftBox);
        $this->weighedRightComponent->changePlace(SessionComponentPlace::onScalesRightBox);
        $this->weighedBottomComponent->changePlace(SessionComponentPlace::onScalesBottomBox);
    }

    public function isWeighed(): bool
    {
        return !!$this->is_weighed;
    }
    public function isHasWeighedValue() : bool
    {
        return  $this->is_weighed && $this->weighed_value;
    }
    public function isExistsWeighedComponents(): bool
    {
        return $this->weighedLeftComponent && $this->weighedRightComponent && $this->weighedBottomComponent;
    }


}
