<div class="col-md-6">
    <h3>Get AI service suggestions</h3>
    @if (($pdf && $suggestions) || $suggestions || $fileUploaded)
        <div>

            <p>
                @if ($suggestions)
                    {!! nl2br($suggestions) ?? 'Loading...' !!}
                @else
                    <p class="mt-5 text-center pt-5">Loading...</p>
                @endif
            </p>
        </div>
    @else
        <div class="card">
            <div class="drop_box">

                <div id="fileSelect">

                    <header>
                        <h4>Select File here</h4>
                    </header>
                    <p>Files Supported: PDF</p>

                    <button class="btn">Choose File</button>
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <!-- File Input -->
                        <input type="file" hidden accept=".pdf" id="fileID" wire:model.defer="pdf"
                            style="display:none;">

                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    @endif

    <script>
        const fileInput = document.getElementById('fileID');

        fileInput.addEventListener('change', event => {
            const files = event.target.files;

            if (files.length > 0) {

                document.getElementById('loading').style.display = 'block'
                document.getElementById('fileSelect').style.display = 'none'
            }
        });
    </script>

</div>
