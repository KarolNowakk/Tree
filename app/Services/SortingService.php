<?php

namespace App\Services;

use App\Node;

class SortingService
{
    public static function sortChildrenByValue(Node $node)
    {
        $children = $node->children->toArray();
        usort($children, function ($a, $b) {
            return $a['value'] <=> $b['value'];
        });

        foreach ($children as $key => $child) {
            Node::find($child['id'])->update(['order' => $key + 1]);
        }
    }

    public static function updateOrder(Node $parent, $oldOrder)
    {
        $children = $parent->children->toArray();

        usort($children, function ($a, $b) use ($oldOrder) {
            if ($a['order'] == $b['order']) {
                if ($a['order'] < $oldOrder) {
                    return $b['updated_at'] <=> $a['updated_at'];
                }

                return $a['updated_at'] <=> $b['updated_at'];
            }

            return $a['order'] <=> $b['order'];
        });

        foreach ($children as $key => $child) {
            Node::find($child['id'])->update(['order' => $key + 1]);
        }
    }
}
