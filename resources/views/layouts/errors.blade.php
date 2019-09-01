@if ($errors->any())
    <div class="alert alert-dismissable alert-danger">
        <ul style="list-style-type:none;">
            <button type="button" class="close" data-dismiss="alert" area-level="close">
                <span area-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() as $error)
                <div class="text-center"><li class="text-center mt-3"><h6>{!! $error !!}</h6></li></div>
            @endforeach
        </ul>
    </div>
@endif