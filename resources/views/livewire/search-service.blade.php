<div>

    <div>

        @include('livewire.includes.search-box')
    </div>


    <section>
        <div class="container">
            <div class="row">
                @if (count($services) > 0)
                    @foreach ($services as $service)
                        @include('livewire.includes.service-card')
                    @endforeach
                @else
                    <h5 class="text-center">This industry needs AI solutions from AI talents.</h5>
                @endif

            </div>
        </div>

    </section>
</div>
