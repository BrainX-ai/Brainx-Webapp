<div>

    <section>
        <div class="row border rounded m-5">
            <div class="col-md-12 p-5">
                <div class="d-flex">
                    <h4 class="text-primary pt-2">Bio</h4><button class="btn " data-bs-target="#edit-bio"
                        data-bs-toggle="modal"><i class="material-icons mb-1 edit">edit</i></button>
                </div>
                <p id="bio" class="p-2">
                    {{ $user->talent->brief_summary }}
                </p>
            </div>
        </div>
    </section>
</div>

@include('pages.talent.includes.modals.edit.bio')
