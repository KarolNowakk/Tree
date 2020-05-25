@extends('master')

@section('content')
    <div class="d-flex flex-row justify-content-center" style="padding: 50px">
        <form class="w-25 center" method="POST" action="{{ route('store') }}">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="value">Value</label>
                <input type="number" class="form-control" id="value" name="value">
            </div>
            <input type="number" class="invisible" id="parent_node"  name="parent_node" value="{{ $parent_node->id }}" required>
            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Save Changes</button>
        </form>
    </div>
@endsection