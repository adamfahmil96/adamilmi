<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use App\Models\Post;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count())
                ->description('Blog posts')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Published Posts', Post::where('is_published', true)->count())
                ->description('Live on site')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Total Projects', Project::count())
                ->description('Portfolio items')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),

            Stat::make('Unread Messages', Message::unread()->count())
                ->description('New messages')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}
