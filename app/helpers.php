<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/2
 * Time: 22:31
 */

namespace App;


class helpers
{
    /**
     * Return "checked" if true
     */
    function checked($value)
    {
        return $value ? 'checked' : '';
    }

    /**
     * Return img url for headers
     */
    function page_image($value = null)
    {
        if (empty($value)) {
            $value = config('blog.page_image');
        }
        if (! starts_with($value, 'http') && $value[0] !== '/') {
            $value = config('blog.uploads.webpath') . '/' . $value;
        }

        return $value;
    }
}