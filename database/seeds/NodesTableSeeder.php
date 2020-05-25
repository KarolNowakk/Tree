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
            } else {
                $node->parent_node = $node->id < 4 ? $node->parent_node = 1 : floor($node->id / 4);
            }

            $node->update($node->toArray());
        });
    }
}
