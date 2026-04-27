<div>

    @if ($screan == 'list')
        @include('livewire.tenant.skill.partials.list-skills')
    @elseif($screan == 'form')
        @include('livewire.tenant.skill.partials.skill-form')
    @endif
</div>
