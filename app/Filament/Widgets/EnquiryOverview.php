<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Hup234design\FilamentCms\Models\Enquiry;

class EnquiryOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Enquiries Today', Enquiry::whereDate('created_at', '>=', Carbon::now())->count()),
            Stat::make('Enquiries Total', Enquiry::count()),
            Stat::make('Spam enquiries detected', Enquiry::where('spam',true)->count()),
        ];
    }
}
