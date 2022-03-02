<?php

return [
        [
            'condition' => '#^/news/([a-z]+)/([0-9]+)/#',
            'rule' => 'sid=$1&id=$2',
            'path' => "/news/index.php"
        ],
];
