<?php

require __DIR__ . '/src/posts.php';

if (\array_key_exists('page', $_GET)) {
    try {
        $posts = postsOnPage($_GET['page']);
        header('Content-Type: application/json');
        echo \json_encode($posts);
    } catch (InvalidArgumentException $exception) {
        http_response_code(400);
    }
} else {
    $posts = postsOnPage(0);
    require __DIR__ . '/src/view.phtml';
}
