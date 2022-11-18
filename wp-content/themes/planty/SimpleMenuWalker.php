<?php

class SimpleMenuWalker extends Walker
{ 
    public function walk($elements, $max_depth, ...$args)
    {
        $nbItems = count($elements);

        foreach ($elements as $k => $item) {
            if (current_user_can('administrator') && $nbItems === $k) {
                $list[] = '<a href="' . get_admin_url() .'" class="menu__link">Admin</a>';
            }

            $class = $nbItems === $k ? 'menu__link menu__link--btn' : 'menu__link';

            $list[] = '<a href="' . $item->url .'" class="' . $class .'">' . $item->title . '</a>';
        }

        return join(' ', $list ?? []);
    }
}
