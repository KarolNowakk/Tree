<?php

namespace App\Http\Controllers;

use App\Node;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function index()
    {
        $rootNodeChildren = Node::whereNull('parent_node')->get();

        return view('structure', [
            'rootNodeChildren' => $rootNodeChildren,
        ]);
    }

    public function show(string $word)
    {
        $nodes = Node::where('description', 'like', "%{$word}%")->get();

        return response()->json($nodes);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'value' => 'required|numeric|between:0,1000',
            'description' => 'required|string|max:100',
            'parent_node' => 'required|numeric',
        ]);

        $newNode = Node::create($data);

        return redirect()->route('home');
    }

    public function destroy(Node $node)
    {
        $node->delete();

        return redirect()->route('home');
    }

    public function update(Node $node, Request $request)
    {
        $data = $request->validate([
            'value' => 'required|numeric|between:0,1000',
            'description' => 'required|string|max:100',
            'parent_node' => 'required|numeric',
        ]);
        $node->update($data);

        return redirect()->route('home');
    }

    public function edit(Node $node)
    {
        return view('edit', [
            'node' => $node,
        ]);
    }

    public function create(Node $node)
    {
        return view('create', [
            'parent_node' => $node,
        ]);
    }
}
