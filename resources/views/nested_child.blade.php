@foreach($children as $child)
	<li class="list-group-item">
		<div>
			<a class="" data-toggle="collapse" href="#id{{ $child->id }}" aria-expanded="false" aria-controls="id{{ $child->id }}">
			@if (count($child->children))
				<span>+</span>
			@else
				<span> </span>
			@endif
				{{ $child->description }}
			</a>
			<div>
				<a style="font-size:14px" href="{{ route('edit', $child->id) }}">Edit</a>
				<a style="font-size:14px" href="{{ route('create', $child->id) }}">Add</a>
			</div>
		</div>
		@if(count($child->children))
			<div class="collapse" id="id{{ $child->id }}">
				<ul class="list-group list-group-flush">
					@include('nested_child', ['children' => $child->children])
				</ul>
			</div>
		@endif  
	</li>  
@endforeach
