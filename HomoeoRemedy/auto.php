<?php
echo json_encode(
    array_map(
        function ($tag) {
            return [
                'label' => $tag,
                'value' => $tag
            ];
        },
        array_filter(
            explode(',', file_get_contents('saved.txt')),
            function ($tag) {
                $term = strtolower($_GET['term']);
                $len = strlen($term);
                
                if (strtolower(substr($tag, 0, $len)) === $term) {
                    return true;
                }

                return false;
            }
        )
    )
);