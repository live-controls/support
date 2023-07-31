<{{ config('livecontrols_support.layout', 'x-app-layout') }}>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            <div class="text-sm breadcrumbs">
                <ul>
                  <li><a href="{{ route('') }}">{{ __('livecontrols::support.support_tickets') }}</a></li> 
                  <li>{{ __('livecontrols::support.support_ticket_nr', ['ticket' => $supportTicket->id]) }}</li>
                </ul>
            </div>
        </h2>
    </x-slot>
</{{ config('livecontrols_support.layout', 'x-app-layout') }}>