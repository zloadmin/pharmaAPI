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
}