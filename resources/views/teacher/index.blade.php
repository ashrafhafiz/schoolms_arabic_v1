@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
{{ __('main.teachers_list') }}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('main.teachers_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('main.teachers_list') }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="button x-small" href="{{ route('teacher.create') }}">
                {{ __('teacher.add_teacher') }}
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
                                <th>{{ __('teacher.teacher_name') }}</th>
                                <th>{{ __('teacher.gender') }}</th>
                                <th>{{ __('teacher.join_date') }}</th>
                                <th>{{ __('teacher.specialization') }}</th>
                                <th>{{ __('teacher.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($teachers as $teacher)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->gender->name }}</td>
                                <td>{{ $teacher->join_date }}</td>
                                <td>{{ $teacher->specialization->name }}</td>
                                <td>
                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"
                                            title="{{ __('grade.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete_teacher{{ $teacher->id }}"
                                        title="{{ __('grade.delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{-- Delete Modal --}}
                            <div class="modal fade" id="delete_teacher{{ $teacher->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('teacher.destroy', 'test') }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ __('teacher.delete_teacher') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p> {{ __('grade.warning_grade') }}</p>
                                                <input type="hidden" name="id" value="{{ $teacher->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('grade.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('grade.submit') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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