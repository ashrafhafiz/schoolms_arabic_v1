{{-- Delete Modal --}}
<div class="modal fade" id="delete_student{{ $student->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('student.destroy', 'test') }}" method="post">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $student->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ __('student.delete_student') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> {{ __('student.warning_delete') }}</p>
                    <br>
                    <strong>{{ $student->name }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('student.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('student.submit') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>