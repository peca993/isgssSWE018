@if ($errors->any())
    <div  class="poruka alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (\Session::has('success'))
    <div class="poruka alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif

@if (\Session::has('info'))
    <div class="poruka alert alert-info">
        {!! \Session::get('info') !!}
    </div>
@endif
