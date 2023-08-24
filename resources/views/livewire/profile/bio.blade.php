<div>

    <section>
        <div class="row border rounded m-5">
            <div class="col-md-12 p-5">
                <div class="d-flex">
                    <div></div>
                    @if (Auth::check() && Auth::user()->role == 'Talent')
                        <button class="btn " data-bs-target="#edit-bio" data-bs-toggle="modal"><i
                                class="material-icons mb-1 edit">edit</i></button>
                    @endif
                </div>
                <p id="bio" class="p-2">
                    @if ($user->talent->brief_summary)
                        {{ $user->talent->brief_summary }}
                    @else
                        @if (Auth::check() && Auth::user()->role == 'Talent')
                            <span class="text-muted">Let clients know about you and your experience, skills in AI</span>
                        @else
                            <span class="text-muted">No bio added</span>
                        @endif
                    @endif
                </p>
            </div>
        </div>
    </section>
</div>

@if (Auth::check() && Auth::user()->role == 'Talent')
    @include('pages.talent.includes.modals.edit.bio')
@endif
