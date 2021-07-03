@extends('layouts.master')

@section('css')
@toastr_css

@section('title')
{{ __('section.title_page') }}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('section.sections_lists') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('section.sections_lists') }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                {{ __('section.add_section') }}
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
                <div class="accordion gray plus-icon round">

                    @foreach ($levels as $level)

                    <div class="acd-group">
                        <a href="#" class="acd-heading">{{ $level->name }}</a>
                        <div class="acd-des">

                            <div class="row">
                                <div class="col-xl-12 mb-30">
                                    <div class="card card-statistics h-100">
                                        <div class="card-body">
                                            <div class="d-block d-md-flex justify-content-between">
                                                <div class="d-block">
                                                </div>
                                            </div>
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th>{{ __('section.section_name') }}
                                                            </th>
                                                            <th>{{ __('section.grade_name') }}</th>
                                                            <th>{{ __('section.status') }}</th>
                                                            <th>{{ __('section.actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($level->sections as $section)
                                                        <tr>
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $section->name }}</td>
                                                            <td>{{ $section->grade->name }}
                                                            </td>
                                                            <td>
                                                                @if ($section->status === 1)
                                                                <label
                                                                    class="badge badge-success">{{ __('section.active') }}</label>
                                                                @else
                                                                <label
                                                                    class="badge badge-danger">{{ __('section.inactive') }}</label>
                                                                @endif

                                                            </td>
                                                            <td>

                                                                <a href="#"
                                                                               class="btn btn-outline-info btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#edit{{ $section->id }}">{{ __('section.edit') }}</a>
                                                                <a href="#"
                                                                               class="btn btn-outline-danger btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#delete{{ $section->id }}">{{ __('section.delete') }}</a>
                                                            </td>
                                                        </tr>


                                                        {{-- Edit Section Modal --}}
                                                        <div class="modal fade" id="edit{{ $section->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            style="font-family: 'Cairo', sans-serif;"
                                                                            id="exampleModalLabel">
                                                                            {{ __('section.edit_section') }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span
                                                                                        aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form
                                                                            action="{{ route('section.update', 'test') }}"
                                                                            method="POST">
                                                                            {{ method_field('patch') }}
                                                                            {{ csrf_field() }}
                                                                            <div class="row">
                                                                                <input id="id" type="hidden" name="id"
                                                                                    class="form-control"
                                                                                    value="{{ $section->id }}">

                                                                                <div class="col">
                                                                                    <label for="name_en"
                                                                                        class="control-label">{{ __('section.section_name_en') }}</label>
                                                                                    <input type="text" id="name_en"
                                                                                        name="name_en"
                                                                                        class="form-control"
                                                                                        value="{{ $section->getTranslation('name', 'en') }}">
                                                                                </div>

                                                                                <div class="col">
                                                                                    <label for="name_ar"
                                                                                        class="control-label">{{ __('section.section_name_ar') }}</label>
                                                                                    <input type="text" id="name_ar"
                                                                                        name="name_ar"
                                                                                        class="form-control"
                                                                                        value="{{ $section->getTranslation('name', 'ar') }}">
                                                                                </div>

                                                                            </div>
                                                                            <br>

                                                                            <div class="col">
                                                                                <label for="inputName"
                                                                                    class="control-label">{{ __('section.level_name') }}</label>
                                                                                <select name="level_id"
                                                                                    class="custom-select"
                                                                                    onclick="console.log($(this).val())">
                                                                                    <!--placeholder-->
                                                                                    <option value="{{ $level->id }}">
                                                                                        {{ $level->name }}
                                                                                    </option>
                                                                                    @foreach ($levels as $level)
                                                                                    <option value="{{ $level->id }}">
                                                                                        {{ $level->name }}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <br>

                                                                            <div class="col">
                                                                                <label for="inputName"
                                                                                    class="control-label">{{ __('section.grade_name') }}</label>
                                                                                <select name="grade_id"
                                                                                    class="custom-select">
                                                                                    <option
                                                                                        value="{{ $section->grade->id }}">
                                                                                        {{ $section->grade->name }}
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <br>

                                                                            <div class="col">
                                                                                <div class="form-check">

                                                                                    @if ($section->status === 1)
                                                                                    <input type="checkbox" checked
                                                                                        class="form-check-input"
                                                                                        name="status"
                                                                                        id="exampleCheck1">
                                                                                    @else
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        name="status"
                                                                                        id="exampleCheck1">
                                                                                    @endif
                                                                                    <label class="form-check-label"
                                                                                        for="exampleCheck1">{{ __('section.status') }}</label>
                                                                                    <br>
                                                                                    <div class="col">
                                                                                        <label for="inputName"
                                                                                            class="control-label">{{ __('teacher.teacher_name') }}</label>
                                                                                        <select multiple
                                                                                            name="teacher_id[]"
                                                                                            class="form-control"
                                                                                            id="exampleFormControlSelect2">
                                                                                            <optgroup
                                                                                                label="Existing Teachers">
                                                                                                @foreach($section->teachers
                                                                                                as $teacher)
                                                                                                <option selected
                                                                                                    value="{{$teacher['id']}}">
                                                                                                    {{$teacher['name']}}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </optgroup>
                                                                                            <option value=""
                                                                                                class="divider"
                                                                                                style="color: #000;"
                                                                                                disabled></option>
                                                                                            <optgroup
                                                                                                label="Available Teachers">
                                                                                                @foreach($teachers as
                                                                                                $teacher)
                                                                                                <option
                                                                                                    value="{{$teacher->id}}">
                                                                                                    {{$teacher->name}}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ __('section.close') }}</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">{{ __('section.submit') }}</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- delete_section_modal -->
                                                        <div class="modal fade" id="delete{{ $section->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                            class="modal-title" id="exampleModalLabel">
                                                                            {{ __('section.delete_section') }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span
                                                                                        aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('section.destroy', 'test') }}"
                                                                            method="post">
                                                                            {{ method_field('Delete') }}
                                                                            @csrf
                                                                            {{ __('section.warning_section') }}
                                                                            <input id="id" type="hidden" name="id"
                                                                                class="form-control"
                                                                                value="{{ $section->id }}">
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ __('section.close') }}</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">{{ __('section.submit') }}</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

<!--Add New Section Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                    {{ __('section.add_section') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('section.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col">
                            <input type="text" name="name_en" class="form-control"
                                placeholder="{{ __('section.section_name_en') }}">
                        </div>

                        <div class="col">
                            <input type="text" name="name_ar" class="form-control"
                                placeholder="{{ __('section.section_name_ar') }}">
                        </div>

                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName" class="control-label">{{ __('section.level_name') }}</label>
                        <select name="level_id" class="custom-select" onchange="$(this).val()">
                            <!--placeholder-->
                            <option value="" selected disabled>
                                {{ __('section.select_level') }}
                            </option>
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}"> {{ $level->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName" class="control-label">{{ __('section.grade_name') }}</label>
                        <select name="grade_id" class="custom-select">

                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName" class="control-label">{{ __('teacher.teacher_name') }}</label>
                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('section.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ __('section.submit') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script type="text/javascript">
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
                            $.each(data, function (key, value) {
                                $('select[name="grade_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
</script>

@endsection