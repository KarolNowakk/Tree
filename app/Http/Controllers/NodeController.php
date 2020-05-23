<?php

namespace App\Http\Controllers;

use App\Node;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function index()
    {
        $rootNodeChildren = Node::where('parent_node', '==', 0)->get();

        return view('content', [
            'rootNodeChildren' => $rootNodeChildren,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'value' => 'required|numeric|between:0,1000',
            'description' => 'required|string|max:100',
            'parent_node' => 'required|numeric',
        ]);

        $newNode = Node::create($data);

        return response()->json($newNode);
    }

    public function delete(Node $node)
    {
        $node->delete();
    }

    public function update(Request $request, Node $node)
    {
        $data = $request->validate([
            'value' => 'required|numeric|between:0,1000',
            'description' => 'required|string|max:100',
            'parent_node' => 'required|numeric',
        ]);

        $node->update($data);
    }
}
