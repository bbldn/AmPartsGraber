<?php

namespace App\Domain\Common\Application\Helper;

class Rebuilder
{
    /**
     * @param iterable $instances
     * @param callable $callback
     * @return array
     */
    public static function rebuildByCallback(iterable $instances, callable $callback): array
    {
        $result = [];
        foreach ($instances as $instance) {
            $key = call_user_func($callback, $instance);
            if (null !== $key) {
                $result[$key] = $instance;
            }
        }

        return $result;
    }
}