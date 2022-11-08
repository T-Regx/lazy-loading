<?php

function allPosts()
{
    return [
        ['title' => 'Mój pierwszy post', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
        ['title' => 'Mój drugi post', 'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.'],
        ['title' => 'Mój trzeci post', 'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'],
        ['title' => 'Mój czwarty post', 'content' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
        ['title' => 'Mój piąty post', 'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.'],
        ['title' => 'Mój szósty post', 'content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.'],
        ['title' => 'Mój siódmy post', 'content' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.'],
    ];
}

function postsOnPage($page)
{
    if ($page < 0) {
        throw new InvalidArgumentException("Invalid page: $page");
    }
    $pageSize = 3;
    return \array_slice(allPosts(), $page * $pageSize, $pageSize);
}
