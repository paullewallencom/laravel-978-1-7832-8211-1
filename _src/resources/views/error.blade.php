@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <p>There where some errors on the page</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('message'))
    <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>

    </div>
@endif

@if(Session::has('status'))
        <div class="alert alert-success">
            <p>{{ Session::get('status') }}</p>
        </div>
@endif