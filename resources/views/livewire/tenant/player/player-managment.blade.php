<div>

    @if ($screen == 'list')
        @include('livewire.tenant.player.partials.list-players')
    @elseif($screen == 'form')
        @include('livewire.tenant.player.partials.player-form')
    @endif
</div>
