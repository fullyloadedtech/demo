<x-filament::widget>
    <x-filament::card>
        <div wire:ignore x-data="" x-init='document.addEventListener("DOMContentLoaded", () => {
                const calendar = new FullCalendar.Calendar($el);
                calendar.render();
            })'>
        </div>
    </x-filament::card>
</x-filament::widget>