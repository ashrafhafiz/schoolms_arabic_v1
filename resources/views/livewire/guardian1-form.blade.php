@if($currentStep != 1)
<div style="display: none" class="row setup-content" id="step-1">
    @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{__('guardian.email')}}</label>
                    <input type="email" wire:model="email" class="form-control">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{__('guardian.password')}}</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{__('guardian.f_name_ar')}}</label>
                    <input type="text" wire:model="f_name_ar" class="form-control">
                    @error('f_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{__('guardian.f_name_en')}}</label>
                    <input type="text" wire:model="f_name_en" class="form-control">
                    @error('f_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{__('guardian.f_job_ar')}}</label>
                    <input type="text" wire:model="f_job_ar" class="form-control">
                    @error('f_job_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="title">{{__('guardian.f_job_en')}}</label>
                    <input type="text" wire:model="f_job_en" class="form-control">
                    @error('f_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{__('guardian.f_nid')}}</label>
                    <input type="text" wire:model="f_nid" class="form-control">
                    @error('f_nid')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{__('guardian.f_pid')}}</label>
                    <input type="text" wire:model="f_pid" class="form-control">
                    @error('f_pid')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{__('guardian.f_phone')}}</label>
                    <input type="text" wire:model="f_phone" class="form-control">
                    @error('f_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{__('guardian.f_nationalityId')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="f_nationalityId">
                        <option selected>{{__('guardian.choose')}}...</option>
                        @foreach($nationalities as $nationality)
                        <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                        @endforeach
                    </select>
                    @error('f_nationalityId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputState">{{__('guardian.f_bloodtypeId')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="f_bloodtypeId">
                        <option selected>{{__('guardian.choose')}}...</option>
                        @foreach($blood_types as $blood_type)
                        <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                        @endforeach
                    </select>
                    @error('f_bloodtypeId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputZip">{{__('guardian.f_religionId')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="f_religionId">
                        <option selected>{{__('guardian.choose')}}...</option>
                        @foreach($religions as $religion)
                        <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                    @error('f_religionId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('guardian.f_address')}}</label>
                <textarea class="form-control" wire:model="f_address" id="exampleFormControlTextarea1"
                    rows="4"></textarea>
                @error('f_address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            @if($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmitUpdate"
                type="button">{{__('guardian.next')}}
            </button>
            @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                type="button">{{__('guardian.next')}}
            </button>
            @endif

        </div>
    </div>
    @if($currentStep != 1)
</div>
@endif