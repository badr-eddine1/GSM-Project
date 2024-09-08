<?php

namespace App\Filament\Widgets;

use App\Models\affectation;
use App\Models\personnel;
use App\Models\puce;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('personnel', Personnel::query()->count())
            ->description('touts les personnels disponible')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Stat::make('puce', puce::query()->count())
            ->description('touts les puces disponible')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),
            Stat::make('affectation', affectation::query()->count())
            ->description('touts les affectations disponible')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
        ];
    }
}
