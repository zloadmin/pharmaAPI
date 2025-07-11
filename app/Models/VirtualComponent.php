<?php

namespace App\Models;

use App\Models\Scopes\Component\VirtualComponentScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([VirtualComponentScope::class])]
class VirtualComponent extends Component
{
    protected $table = 'components';
    use HasFactory;

    protected $attributes = [
        'is_virtual' => true
    ];

    /**
     * Scope a query to only include by laboratory.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByVirtualLaboratory($query, Laboratory $laboratory)
    {
        return $query->where('virtual_laboratory_id', $laboratory->id);
    }


    static function getComponent(LaboratorySession $session, SessionComponent $firstComponent, SessionComponent $secondComponent): null|self
    {
        return self::orWhere(function ($query) use ($session, $firstComponent, $secondComponent) {
            $query->where('virtual_component_left_id', $firstComponent->getWeighedOrMainOrVirtualComponentId())
                ->where('virtual_component_right_id', $secondComponent->getWeighedOrMainOrVirtualComponentId());
        })->orWhere(function ($query) use ($session, $firstComponent, $secondComponent) {
            $query->where('virtual_component_left_id', $secondComponent->getWeighedOrMainOrVirtualComponentId())
                ->where('virtual_component_right_id', $firstComponent->getWeighedOrMainOrVirtualComponentId());
        })->where('virtual_laboratory_id', $session->laboratory_id)->first();
    }
}
