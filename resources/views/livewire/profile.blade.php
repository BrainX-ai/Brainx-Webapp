<div>
    @include('livewire.profile.tabs')

    @if ($activeTab == 'My AI services' || $activeTab == 'AI services')
        @include('livewire.profile.ai-services')
    @elseif ($activeTab == 'Bio')
        @include('livewire.profile.bio')
    @elseif ($activeTab == 'AI portfolio')
        @include('livewire.profile.ai-portfolio')
    @elseif ($activeTab == 'How it works' && Auth::check() && Auth::user()->role == 'Talent')
        @include('livewire.profile.faq')
    @endif
</div>
