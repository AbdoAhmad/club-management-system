<div>
    @include('livewire.tenant.position.partials.list-positions')
    @if ($showModal)
        @include('livewire.tenant.position.partials.position-form')
    @endif
</div>
