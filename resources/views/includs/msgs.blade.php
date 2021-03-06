@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger rounded"><ul><i>{{$error}}</i></ul></div>
    @endforeach
@endif
@if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif