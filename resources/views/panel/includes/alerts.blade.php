@if (session('sucess'))
<div class = "alert alert-success">
    {{ session('sucess') }}
</div>
@endif
</div>

<div class = "messages">
@if (session('error'))
<div class = "alert alert-error">
    {{ session('error') }}
</div>
@endif

<div class = "messages">
    @if (session('error'))
    <div class = "alert alert-info">
        {{ session('message') }}
    </div>
    @endif
