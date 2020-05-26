<?php

namespace App\Http\Controllers;

use App\Node;
use App\Services\SortingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-nodes')->except(['index', 'show']);
    }

    public function index()
    {
        $rootNodeChildren = Node::where('parent_node', 1)->get();

        return view('main-structure', [
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
        $data = $this->validator($request->all())->validate();
        $parent = Node::findOrFail($data['parent_node']);
        Node::create($data);

        if ($data['order'] == 1) {
            SortingService::updateOrder($parent, 2);
        } else {
            SortingService::updateOrder($parent, $data['order']);
        }

        return redirect()->route('home');
    }

    public function destroy(Node $node)
    {
        $node->delete();

        return redirect()->route('home');
    }

    public function update(Node $node, Request $request)
    {
        $data = $this->validator($request->all())->validate();
        $oldOrder = $node->order;
        $node->update($data);
        if ($oldOrder != $data['order']) {
            SortingService::updateOrder($node->parent, $oldOrder);
        }

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

    public function sortChildren(Node $node)
    {
        SortingService::sortChildrenByValue($node);

        return redirect()->route('home');
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'value' => 'required|numeric|between:0,1000',
            'description' => 'required|string|max:100',
            'parent_node' => 'required|numeric',
            'order' => 'required|numeric|gt:0',
        ]);
    }
}
