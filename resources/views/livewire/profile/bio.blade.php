<div>

    <section>
        <div class="row border rounded m-5">
            <div class="col-md-12 p-5">
                <div class="d-flex">
                    <div></div>
                    <button class="btn " data-bs-target="#edit-bio" data-bs-toggle="modal"><i
                            class="material-icons mb-1 edit">edit</i></button>
                </div>
                <p id="bio" class="p-2">
                    @if ($user->talent->brief_summary)
                        {{ $user->talent->brief_summary }}
                    @else
                        <span class="text-muted">Let clients know about you and your experience, skills in AI</span>
                    @endif
                </p>
            </div>
        </div>
    </section>
</div>

@include('pages.talent.includes.modals.edit.bio')
