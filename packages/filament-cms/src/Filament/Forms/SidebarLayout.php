<?php

namespace Hup234design\FilamentCms\Filament\Forms;

use Closure;
use Filament\Forms\Components\Grid;

class SidebarLayout
{
    public function __construct(
        public array|Closure $mainComponents,
        public array|Closure $sidebarComponents
    ){}

    public static function make(array|Closure $mainComponents, array|Closure $sidebarComponents): Grid
    {
        return Grid::make(['md' => 3])->schema([
            Grid::make()->schema($mainComponents)->columnSpan(['md' => 2]),
            Grid::make()->schema($sidebarComponents)->columnSpan(['md' => 1]),
        ]);
    }
}
