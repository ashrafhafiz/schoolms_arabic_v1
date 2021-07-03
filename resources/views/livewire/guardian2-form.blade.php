@if($currentStep != 2)
<div style="display: none" class="row setup-content" id="step-2">
    @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{ __('guardian.m_name_ar') }}</label>
                    <input type="text" wire:model="m_name_ar" class="form-control">
                    @error('m_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{ __('guardian.m_name_en') }}</label>
                    <input type="text" wire:model="m_name_en" class="form-control">
                    @error('m_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{ __('guardian.m_job_ar') }}</label>
                    <input type="text" wire:model="m_job_ar" class="form-control">
                    @error('m_job_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="title">{{ __('guardian.m_job_en') }}</label>
                    <input type="text" wire:model="m_job_en" class="form-control">
                    @error('m_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{ __('guardian.m_nid') }}</label>
                    <input type="text" wire:model="m_nid" class="form-control">
                    @error('m_nid')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{ __('guardian.m_pid') }}</label>
                    <input type="text" wire:model="m_pid" class="form-control">
                    @error('m_pid')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{ __('guardian.m_phone') }}</label>
                    <input type="text" wire:model="m_phone" class="form-control">
                    @error('m_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{ __('guardian.m_nationalityId') }}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="m_nationalityId">
                        <option selected>{{ __('guardian.choose')}}...</option>
                        @foreach($nationalities as $national)
                        <option value="{{$national->id}}">{{$national->name}}</option>
                        @endforeach
                    </select>
                    @error('m_nationalityId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputState">{{ __('guardian.m_bloodtypeId') }}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="m_bloodtypeId">
                        <option selected>{{ __('guardian.choose')}}...</option>
                        @foreach($blood_types as $blood_type)
                        <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                        @endforeach
                    </select>
                    @error('m_bloodtypeId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputZip">{{ __('guardian.m_religionId') }}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="m_religionId">
                        <option selected>{{ __('guardian.choose')}}...</option>
                        @foreach($religions as $religion)
                        <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                    @error('m_religionId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{ __('guardian.m_address') }}</label>
                <textarea class="form-control" wire:model="m_address" id="exampleFormControlTextarea1"
                    rows="4"></textarea>
                @error('m_address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-left" type="button" wire:click="back(1)">
                {{ __('guardian.back')}}
            </button>

            @if($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                wire:click="secondStepSubmitUpdate">{{ __('guardian.next')}}</button>
            @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                wire:click="secondStepSubmit">{{ __('guardian.next')}}</button>
            @endif



        </div>
    </div>
    @if($currentStep != 2)
</div>
@endif