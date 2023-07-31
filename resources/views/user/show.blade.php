<{{ config('livecontrols_support.layout', 'x-app-layout') }}>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('livecontrols::support.support_ticket_nr', ['ticket' => $supportTicket->id]) }}
        </h2>
    </x-slot>
</{{ config('livecontrols_support.layout', 'x-app-layout') }}>