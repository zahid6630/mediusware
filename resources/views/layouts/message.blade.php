@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! Session::get('success') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
@if(Session::has('unsuccess'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    {!! Session::get('unsuccess') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <li>{{ $error }}</li>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endforeach
@endif