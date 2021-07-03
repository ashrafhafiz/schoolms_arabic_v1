@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@toastr_css

@section('title')
{{ __('grade.title_page') }}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('grade.grades_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('grade.grades_list') }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex flex-row justify-content-start align-items-baseline">
            <button type="button" class="button x-small mx-2" data-toggle="modal" data-target="#exampleModal">
                {{ __('grade.add_grade') }}
            </button>

            <button type="button" class="button x-small mx-2" id="delete-selected">
                {{ __('grade.delete_selected') }}
            </button>

            <form action="{{ route('filter') }}" method="post" class="mx-2">
                @csrf
                <select class="selectpicker show-tick" style="height: 50px !important;" data-style="btn-success"
                    name="level_id" required onchange="this.form.submit()">
                    <option value="" selected disabled>{{ __('grade.sreach_by_grade') }}</option>
                    @foreach ($levels as $level)
                    <option value="{{ $level->id }}"
                        {{ (isset($selected_level) && $level->id == $selected_level) ? "selected" : ""}}>
                        {{ $level->name }}</option>
                    @endforeach
                </select>
            </form>
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
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="checkAll('box1', this)"></th>
                                <th>#</th>
                                <th>{{ __('grade.grade_name') }}</th>
                                <th>{{ __('grade.level_name') }}</th>
                                <th>{{ __('grade.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ((isset($details)))
                            <?php $grades = $details; ?>
                            @else
                            <?php $grades = $grades; ?>
                            @endif
                            <?php $i = 0; ?>
                            @foreach ($grades as $grade)
                            <tr>
                                <td><input type="checkbox" class="box1" name="" id="" value="{{ $grade->id }}"></td>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $grade->name }}</td>
                                <td>{{ $grade->level->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $grade->id }}" title="{{ __('grade.edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $grade->id }}" title="{{ __('grade.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_grade -->
                            <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('grade.edit_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('grade.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name_ar"
                                                            class="mr-sm-2">{{ __('grade.grade_name_ar') }}
                                                            :</label>
                                                        <input id="name_ar" type="text" name="name_ar"
                                                            class="form-control"
                                                            value="{{ $grade->getTranslation('name', 'ar') }}" required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                            class="mr-sm-2">{{ __('grade.grade_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $grade->getTranslation('name', 'en') }}"
                                                            name="name_en" required>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">
                                                        {{ __('grade.level_name') }}:
                                                    </label>
                                                    <select class="form-control form-control-lg"
                                                        id="exampleFormControlSelect1" name="level_id">
                                                        {{-- <option value="{{ $grade->level->id }}">
                                                        {{ $grade->level->name }}
                                                        </option> --}}
                                                        @foreach ($levels as $level)
                                                        <option value="{{ $level->id }}"
                                                            {{ ($level->id == $grade->level->id) ? "selected" : "" }}>
                                                            {{ $level->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('grade.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ __('grade.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delete_modal_grade -->
                            <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('grade.delete_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('grade.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ __('grade.warning_grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('grade.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('grade.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add_modal_grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('grade.add_grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('grade.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>

                                    <div class="row">

                                        <div class="col">
                                            <label for="name_en" class="mr-sm-2">{{ __('grade.grade_name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" required />
                                        </div>


                                        <div class="col">
                                            <label for="name_ar" class="mr-sm-2">{{ __('grade.grade_name_ar') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" required />
                                        </div>


                                        <div class="col">
                                            <label for="level_id" class="mr-sm-2">{{ __('grade.level_name') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="level_id">
                                                    @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="name_en" class="mr-sm-2">{{ __('grade.actions') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                value="{{ __('grade.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button"
                                        value="{{ __('grade.add_row') }}" />
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('grade.close') }}</button>
                                <button type="submit" class="btn btn-success">{{ __('grade.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Delete Selected Records --}}
<div class="modal fade" id="delete_selected" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('grade.delete_grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete.selected') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ __('grade.warning_grade') }}
                    <input class="text" type="hidden" id="delete_selected_items" name="delete_selected_items" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('grade.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('grade.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@toastr_js
@toastr_render

<script type="text/javascript">
    function checkAll(className, element) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (element.checked) {
            for (var i = 0; i<l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i<l; i++) {
                elements[i].checked = false;
            }
        }  
    }
</script>

<script type="text/javascript">
    $(function () {
        $('#delete-selected').click(function () {
            var selected = new Array();
            $("#datatable input[type='checkbox']:checked").each(function(){
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_selected').modal('show');
                $('input[id="delete_selected_items"]').val(selected);
            }
        });
    });
</script>

@endsection