@foreach($children as $child)
	<li>	    
		<input type="checkbox" class="check-input" id="{{$child->id}}"> 
        <label {!! count($child->children) ? 'class="label-underneath"' : 'class="label-empty"' !!} for="{{$child->id}}">
			{{ $child->description }}
			<span>{{ $child->id }}</span>
		</label> 
	@if(count($child->children))
		<ul id="node">
            @include('nested_child',['children' => $child->children])
		</ul>
    @endif
	</li>
@endforeach
