<div>
    @include('livewire.profile.tabs')

    @if ($activeTab == 'My AI services')
        @include('livewire.profile.ai-services')
    @elseif ($activeTab == 'Bio')
        @include('livewire.profile.bio')
    @elseif ($activeTab == 'AI portfolio')
        @include('livewire.profile.ai-portfolio')
    @elseif ($activeTab == 'Info')
        @include('livewire.profile.faq')
    @endif
</div>
