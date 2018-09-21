<?php

namespace App\Helpers;


class Helper
{
    /**
     * @param $array
     * @param int $parent_id
     * @param int $level
     * @return array
     */
    public static function arrayFormSelect($array, $parent_id = null, $level = 0)
    {
        $tree = [];

        foreach ($array as $item) {
            if ($item->parent_id == $parent_id) {
                $tree[$item->id] = str_repeat('- - ', $level) . $item->name;
                $child = static::arrayFormSelect($array, $item->id, $level + 1);
                $tree = $tree + $child;
            }
        }

        return $tree;
    }

    /**
     * @param $array
     * @param int $parent_id
     * @return array
     */
    public static function arrayToTree($array, $parent_id = null)
    {
        $tree = collect();

        foreach ($array as $item) {
            if ($item->parent_id == $parent_id) {
                $tree[] = collect([
                    'id' => $item->id,
                    'slug' => $item->slug,
                    'name' => $item->name,
                    'children' => static::arrayToTree($array, $item->id),
                ]);
            }
        }

        return $tree;
    }

    public static function toTree($array, $parent_id = null)
    {
        $tree = collect();

        foreach ($array as $item) {
            if ($item->parent_id == $parent_id) {
                $tree[] = collect([
                    'id' => $item->id,
                    'body' => $item->body,
                    'user_id' => $item->user->id,
                    'user_name' => $item->user->name,
                    'time' => $item->created_at,
                    'children' => static::toTree($array, $item->id),
                ]);
            }
        }

        return $tree;
    }

    /**
     * @param $tree
     * @return array
     */
    public static function treeToArray($tree, $parent_id = null)
    {
        $array = [];

        foreach ($tree as $sort => $value) {
            $array[] = [$value['id'], $parent_id, ++$sort];

            if (isset($value['children'])) {
                $children = static::treeToArray($value['children'], $value['id']);
                $array = array_merge($array, $children);
            }
        }

        return $array;
    }

    /**
     * @param $array
     * @param $parent_id
     * @return array|\Illuminate\Support\Collection|static
     */
    public static function breadcrumb($array, $parent_id)
    {
        $result = collect();

        if ($parent_id != null) {
            foreach ($array as $item) {
                if ($item->id == $parent_id) {
                    $result[] = collect([
                        'name' => $item->name,
                        'slug' => $item->slug,
                    ]);
                    $parent = static::breadcrumb($array, $item->parent_id);
                    $result = $result->merge($parent);
                }
            }
        }

        return $result;
    }
}