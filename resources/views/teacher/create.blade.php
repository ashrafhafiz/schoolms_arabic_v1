@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
{{  __('teacher.add_teacher') }}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('teacher.add_teacher') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('teacher.add_teacher') }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{-- <a class="button x-small" href="{{ route('teacher.create') }}" data-toggle="modal"
            data-target="#exampleModal">
            {{ __('teacher.add_teacher') }}
            </a> --}}
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card card-statistics h-100">
            <div class="card-body">

                <form action="{{route('teacher.store')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ __('teacher.email')}}</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ __('teacher.password')}}</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>


                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ __('teacher.name_en')}}</label>
                            <input type="text" name="name_en" class="form-control">
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ __('teacher.name_ar')}}</label>
                            <input type="text" name="name_ar" class="form-control">
                            @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputSpecialization">{{ __('teacher.specialization') }}</label>
                            <select class="custom-select my-1 mr-sm-2" id="inputSpecialization"
                                name="specialization_id">
                                <option selected disabled>{{ __('teacher.choose') }}...</option>
                                @foreach($specializations as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                            </select>
                            @error('specialization_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputGender">{{ __('teacher.gender') }}</label>
                            <select class="custom-select my-1 mr-sm-2" id="inputGender" name="gender_id">
                                <option selected disabled>{{ __('teacher.choose') }}...</option>
                                @foreach($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            @error('gender_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ __('teacher.join_date') }}</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text" id="datepicker-action" name="join_date"
                                    data-date-format="yyyy-mm-dd" required>
                            </div>
                            @error('join_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('teacher.address')}}</label>
                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1"
                            rows="4"></textarea>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ __('teacher.next')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection