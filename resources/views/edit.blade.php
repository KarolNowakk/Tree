@extends('master')

@section('content')
    <div class="d-flex flex-row justify-content-center" style="padding-top: 50px">
        <form class="w-25 center" method="POST" action="{{ route('update',  $node->id) }}">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="description">Change Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $node->description }}" required>
            </div>
            <div class="form-group">
                <label for="value">Change Value</label>
                <input type="number" class="form-control" id="value" name="value" value="{{ $node->value }}" required>
            </div>
            @if ($node->parent_node == 1)
                <input type="number" class="invisible" id="order" name="order" value="1" required>
            @else
                <div class="form-group">
                    <label for="order">Change Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ $node->order }}" required>
                </div>
            @endif
            
            @if ($node->parent_node == 1)
                <input type="text" id="search" class="form-control" value="Root Note"  readonly>
            @else
                <label for="search">Parent Node</label>
                <input type="text" id="search" class="form-control" value="{{ $node->parent->description }}">
            @endif
            
            <div id="match-list"></div>
            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Save Changes</button>
            <input type="number" class="invisible" id="parent_node" name="parent_node" value="{{ $node->parent_node }}">    
        </form>
    </div>
    @if ($node->parent_node != 1)
        <div class="d-flex flex-row justify-content-center" >
            <form class="w-25 center" method="POST" action="{{ route('destroy',  $node->id) }}">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-danger" style="margin-top: 10px">Delete</button>
            </form>
        </div>
    @endif
    <script src="/js/autocomplete.js"></script>
@endsection