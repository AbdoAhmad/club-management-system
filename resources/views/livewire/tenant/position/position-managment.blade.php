<div>

    @if ($screan == 'list')
        @include('livewire.tenant.position.partials.list-positions')
    @elseif($screan == 'form')
        @include('livewire.tenant.position.partials.position-form')
    @endif
</div>
