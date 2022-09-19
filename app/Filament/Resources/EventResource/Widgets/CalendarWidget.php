<?php

namespace App\Filament\Resources\EventResource\Widgets;

//use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
//    protected static string $view = 'filament.resources.event-resource.widgets.calendar-widget';
    /**
     * Return events that should be rendered statically on calendar.
     */
    public function getViewData(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Breakfast!',
                'start' => now()
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'start' => now()->addDay(),
                'url' => 'https://some-url.com',
                'shouldOpenInNewTab' => true,
            ]
        ];
    }
}
