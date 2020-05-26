@extends('master')

@section('content')
<div class="container">
    <ul id="root" class="list-group list-group-flush ">
        <button class="btn btn-primary mt-2 mb-2" id="toggle-all" style="max-width:100px"></button> 
        @foreach($rootNodeChildren as $rootNodeChild)
            <li class="list-group-item">
                <div>
                    <a {!! count($rootNodeChild->children) ? 'class="not-empty"' : 'class="empty"' !!} 
                        data-toggle="collapse" href="#id{{ $rootNodeChild->id }}" aria-expanded="false" aria-controls="id{{ $rootNodeChild->id }}">

                        {{ $rootNodeChild->description }}  <span style="color:#777">Value: {{ $rootNodeChild->value }}</span>
                    </a>
                    @can('manage-nodes')
                        <div>
                            <a style="font-size:14px" class="px-2" href="{{ route('edit', $rootNodeChild->id) }}">Edit</a>
                            <a style="font-size:14px" class="px-2" href="{{ route('create', $rootNodeChild->id) }}">Add</a>
                            @if(count($rootNodeChild->children))
                                <a style="font-size:14px" class="px-2" href="{{ route('sortChildren', $rootNodeChild->id) }}">Sort Children</a>
                            @endif
                        </div>
                    @endcan
                </div>
                @if(count($rootNodeChild->children))
                    <div class="collapse show-all" id="id{{ $rootNodeChild->id }}">
                        <ul class="list-group list-group-flush ">
                            @include('nested_child', ['children' => $rootNodeChild->children])
                        </ul>
                    </div>
                @endif  
            </li>  
        @endforeach
    </ul>
</div>
<script src="/js/expand.js"></script>
@endsection