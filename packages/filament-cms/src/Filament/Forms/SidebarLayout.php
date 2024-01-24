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
        return Grid::make(['lg' => 3])->schema([
            Grid::make()->schema($mainComponents)->columnSpan(['lg' => 2]),
            Grid::make()->schema($sidebarComponents)->columnSpan(['lg' => 1]),
        ]);
    }
}
