@extends('layouts.master')

@section('css')
@toastr_css

@section('title')
{{ __('main.study_levels_list') }}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('main.study_levels_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('main.study_levels_list') }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ __('level.add_new_level') }}
            </button>
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
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>{{ __('level.level_name') }}</th>
                                <th>{{ __('level.notes') }}</th>
                                <th>{{ __('level.created_at') }}</th>
                                <th>{{ __('level.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $key => $level)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $level->name }}</td>
                                <td>{!! $level->notes !!}</td>
                                <td>{{ $level->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $level->id }}" title="{{ __('level.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $level->id }}" title="{{ __('level.delete') }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- edit_modal_level -->
                            <div class="modal fade" id="edit{{ $level->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('level.edit_level') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{route('level.update',$level->id)}}" method="post">
                                                {{method_field('patch')}}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $level->id }}">
                                                        <label for="name_en" class="mr-sm-2">
                                                            {{ __('level.level_name_en') }}:
                                                        </label>
                                                        <input id="name_en" type="text" name="name_en"
                                                            class="form-control"
                                                            value="{{ $level->getTranslation('name', 'en') }}" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_ar" class="mr-sm-2">
                                                            {{ __('level.level_name_ar') }}:
                                                        </label>
                                                        <input id="name_ar" type="text" name="name_ar"
                                                            class="form-control"
                                                            value="{{ $level->getTranslation('name', 'ar') }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">
                                                        {{ __('level.notes') }}:
                                                    </label>
                                                    <textarea class="form-control" name="notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $level->notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('level.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ __('level.edit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_level -->
                            <div class="modal fade" id="delete{{ $level->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('level.delete_level') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('level.destroy',$level->id) }}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                {{ __('level.warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $level->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('level.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('level.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </tbody>
                        <tfoot>
                            {{-- <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr> --}}
                        </tfoot>

                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Add New Section Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('level.add_level') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('level.store') }}" method="POST">
                    <!-- add_form -->
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name_en" class="mr-sm-2">
                                {{ __('level.level_name_en') }}:
                            </label>
                            <input id="name_en" type="text" name="name_en" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="name_ar" class="mr-sm-2">
                                {{ __('level.level_name_ar') }}:
                            </label>
                            <input id="name_ar" type="text" name="name_ar" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">
                            {{ __('level.notes') }}:
                        </label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('level.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('level.add') }}</button>
                    </div>
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