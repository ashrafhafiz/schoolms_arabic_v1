@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ __('main.add_student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ __('main.add_student') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ route('student.store') }}" autocomplete="off">
                    @csrf
                    <h6 style="color: blue; font-weight: bold">
                        {{ __('student.personal_information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('student.name_en') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="name_en" type="text">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('student.name_ar') }} : <span class="text-danger">*</span></label>
                                <input type="text" name="name_ar" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('student.email') }} : <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('student.password') }} : <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">{{ __('student.gender') }} :
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected disabled>{{ __('student.choose') }}...</option>
                                    @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nationality_id">{{ __('student.nationalityId') }} :
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationality_id">
                                    <option selected disabled>{{ __('student.choose') }}...</option>
                                    @foreach($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="blood_type_id">{{ __('student.bloodtypeId') }} : </label>
                                <select class="custom-select mr-sm-2" name="blood_type_id">
                                    <option selected disabled>{{ __('student.choose') }}...</option>
                                    @foreach($blood_types as $blood_type)
                                    <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{ __('student.dob') }} :</label>
                                <input class="form-control" type="text" id="datepicker-action" name="dob"
                                    data-date-format="yyyy-mm-dd">
                            </div>
                        </div>

                    </div>

                    <h6 style="color: blue; font-weight: bold">
                        {{ __('student.academic_information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="level_id">{{ __('student.level') }} :
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="level_id">
                                    <option selected disabled>{{ __('student.choose') }}...</option>
                                    @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="grade_id">{{ __('student.grade') }} :
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">{{ __('student.section') }} :
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="section_id">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="guardian_id">{{ __('student.guardian') }} :
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="guardian_id">
                                    <option selected disabled>{{ __('student.choose') }}...</option>
                                    @foreach($guardians as $guardian)
                                    <option value="{{ $guardian->id }}">{{ $guardian->f_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{ __('student.academic_year') }} :
                                    <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{ __('student.choose') }}...</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++) <option
                                        value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ __('student.submit') }}</button>
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
<script>
    $(document).ready(function () {
            $('select[name="level_id"]').on('change', function () {
                var level_id = $(this).val();
                if (level_id) {
                    $.ajax({
                        url: "{{ URL::to('gradesperlevel') }}/" + level_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="grade_id"]').empty();
                            $('select[name="grade_id"]').append('<option selected disabled >{{ __('student.choose') }}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="grade_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
</script>


<script>
    $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('sectionspergrade') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option selected disabled >{{ __('student.choose') }}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
</script>
@endsection