<div>

    @if ($screan == 'list')
        @include('livewire.tenant.player.partials.list-players')
    @elseif($screan == 'form')
        @include('livewire.tenant.player.partials.player-form')
    @endif
</div>
