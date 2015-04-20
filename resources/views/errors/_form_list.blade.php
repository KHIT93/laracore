@if($errors->any())
<div class="col-sm-12 alert alert-danger alert-important">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif