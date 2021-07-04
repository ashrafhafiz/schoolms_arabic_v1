@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
{{ __('main.students_list') }}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('main.students_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('main.students_list') }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="button x-small" href="{{ route('student.create') }}">
                {{ __('main.add_student') }}
            </a>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('student.student_name') }}</th>
                                <th>{{ __('student.gender') }}</th>
                                <th>{{ __('student.dob') }}</th>
                                <th>{{ __('student.nationalityId') }}</th>
                                <th>{{ __('student.level') }}</th>
                                <th>{{ __('student.grade') }}</th>
                                <th>{{ __('student.section') }}</th>
                                <th>{{ __('student.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($students as $student)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->gender->name }}</td>
                                <td>{{ $student->dob }}</td>
                                <td>{{ $student->nationality->name }}</td>
                                <td>{{ $student->level->name }}</td>
                                <td>{{ $student->grade->name }}</td>
                                <td>{{ $student->section->name }}</td>
                                <td>
                                    <a href="{{ route('student.edit', $student->id) }}"
                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"
                                            title="{{ __('student.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete_student{{ $student->id }}"
                                        title="{{ __('student.delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{-- Delete Modal --}}
                            @include('student.delete')
                            @endforeach
                    </table>
                </div>

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