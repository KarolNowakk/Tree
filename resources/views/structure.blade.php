@extends('master')

@section('content')
<div class="container">
    {{-- <div>
        <a class="btn btn-primary mb-4 mt-4"  href="{{ route('create', 1) }}">Add New Item</a>
    </div> --}}
    <ul id="root" class="list-group list-group-flush ">
        @foreach($rootNodeChildren as $rootNodeChild)
            <li class="list-group-item" >
                <div>
                    <a data-toggle="collapse" href="#id{{ $rootNodeChild->id }}" aria-expanded="false" aria-controls="id{{ $rootNodeChild->id }}">
                        @if (count($rootNodeChild->children))
                            <span>+</span>
                        @else
                            <span> </span>
                        @endif
                        {{ $rootNodeChild->description }}
                    </a>
                    <div>
                        <a style="font-size:14px" href="{{ route('edit', $rootNodeChild->id) }}">Edit</a>
                        <a style="font-size:14px" href="{{ route('create', $rootNodeChild->id) }}">Add</a>
                    </div>
                </div>
                @if(count($rootNodeChild->children))
                    <div class="collapse" id="id{{ $rootNodeChild->id }}">
                        <ul class="list-group list-group-flush ">
                            @include('nested_child', ['children' => $rootNodeChild->children])
                        </ul>
                    </div>
                @endif  
            </li>  
        @endforeach
    </ul>
</div>
@endsection
