<div>
    {{-- Success is as dangerous as failure. --}}
    @if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMessage }}
    </div>
    @endif

    @if ($show_table)
    @include('livewire.guardian-table')
    @else
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ __('guardian.step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ __('guardian.step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                       disabled="disabled">3</a>
                <p>{{ __('guardian.step3') }}</p>
            </div>
        </div>
    </div>


    @include('livewire.guardian1-form')

    @include('livewire.guardian2-form')

    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
            @endif
            <div class="col-xs-12 w-100 mt-5">
                <div class="col-md-12">
                    <br>
                    <label style="color: red">{{ __('guardian.attachments') }}</label>
                    <div class="form-group">
                        <input type="file" wire:model="photos" accept="image/*" multiple>
                    </div>
                    <br>

                    <input type="hidden" wire:model="Parent_id">

                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-left" type="button"
                        wire:click="back(2)">{{  __('guardian.back') }}</button>

                    @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="submitFormUpdate"
                        type="button">{{ __('guardian.finish') }}
                    </button>
                    @else
                    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                        type="button">{{  __('guardian.finish') }}</button>
                    @endif
                </div>
            </div>
            @if ($currentStep != 3)
        </div>
        @endif
    </div>
    @endif
</div>