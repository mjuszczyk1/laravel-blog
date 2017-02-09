@section('sidebar')
    <aside class="col-sm-3 offset-sm-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Built to learn Laravel.</p>
        </div>
        @if(!empty($archives))
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    @foreach($archives as $data)
                        <li><a href="/?month={{$data['month']}}&year={{$data['year']}}">{{$data['month'] . ' ' . $data['year']}}</a></li>
                    @endforeach
                </ol>
            </div>
        @endif
    </aside>
@stop