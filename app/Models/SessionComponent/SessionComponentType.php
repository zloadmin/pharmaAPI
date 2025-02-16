<?php
declare(strict_types=1);


namespace App\Models\SessionComponent;





use App\Enums\SessionComponent\SessionComponentType as SessionComponentTypeEnum;
trait SessionComponentType
{

    public function isTypeMixed(): bool
    {
        return  $this->type === SessionComponentTypeEnum::Mixed;
    }
    public function isTypeSimple(): bool
    {
        return  $this->type === SessionComponentTypeEnum::Simple;
    }
    public function isTypeFilteredExample(): bool
    {
        return  $this->type === SessionComponentTypeEnum::FilteredExample;
    }
    public function isTypeWeighed(): bool
    {
        return  $this->type === SessionComponentTypeEnum::Weighed;
    }
     /**
      * Scope a query to only include filtered example type.
      *
      * @param  \Illuminate\Database\Eloquent\Builder  $query
      * @return \Illuminate\Database\Eloquent\Builder
      */
     public function scopeFilteredExampleType($query)
     {
         return $query->where('type', SessionComponentTypeEnum::FilteredExample);
     }
}