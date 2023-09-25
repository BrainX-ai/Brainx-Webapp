<div class="col-md-6">
    @if ($pdf && $suggestions)
        <div>
            <p>
                {{ $suggestions }}
            </p>
        </div>
    @else
        <div class="card">
            <h3>Get AI service suggestions</h3>
            <div class="drop_box">
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
    @endif

    @if ($fileUploaded)
        <p>
            File uploaed successfully
        </p>
    @endif
</div>
