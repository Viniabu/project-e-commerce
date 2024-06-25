<?php

if (!function_exists('varzx')) {
    function varzx($variable)
    {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
        die;
    }
}

if(!function_exists('sql')){
    function sql($query){
        $sql = $query->toSql();
            $bindings = $query->getBindings();

            foreach ($bindings as $binding) {
                $sql = preg_replace('/\?/', $binding, $sql, 1);
            }

            varzx($sql);
    }
}
