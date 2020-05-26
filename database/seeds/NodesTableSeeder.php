<?php

use App\Node;
use Illuminate\Database\Seeder;

class NodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(Node::class, 240)->create();

        Node::all()->map(function ($node) {
            if ($node->id == 1) {
                $node->parent_node = null;
            } elseif ($node->id == 2) {
                $node->parent_node = 1;
                $node->description = 'Root';
                $node->order = 1;
            } else {
                $node->parent_node = $node->id < 5 ? $node->parent_node = 2 : ceil($node->id / 4);
            }

            $node->update($node->toArray());
        });
    }
}
