@foreach($children as $child)
	<li class="list-group-item">
		<div>
			<a style="text-decoration:none" data-toggle="collapse" href="#id{{ $child->id }}" aria-expanded="false" aria-controls="id{{ $child->id }}">
			@if (count($child->children))
				<span>+</span>
			@else
				<span> </span>
			@endif
				{{ $child->description }} <span style="color:#777">Value: {{ $child->value }}</span>
			</a>
			@can('manage-nodes')
				<div>
					<a style="font-size:14px px-3" class="px-2" href="{{ route('edit', $child->id) }}">Edit</a>
					<a style="font-size:14px px-3" class="px-2" href="{{ route('create', $child->id) }}">Add</a>
					@if(count($child->children))
						<a style="font-size:14px px-3" class="px-2" href="{{ route('sortChildren', $child->id) }}">Sort Children</a>
					@endif 
				</div>
			@endcan
		</div>
		@if(count($child->children))
			<div class="collapse show-all" id="id{{ $child->id }}">
				<ul class="list-group list-group-flush">
					@include('nested_child', ['children' => $child->children])
				</ul>
			</div>
		@endif  
	</li>  
@endforeach
