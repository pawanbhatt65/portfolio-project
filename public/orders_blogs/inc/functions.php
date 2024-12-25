<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// show short description
function short_description($text, $limit)
{
    if (strlen($text) > $limit) {
        $short_text = substr($text, 0, $limit) . "...";
        return $short_text;
    }
    return $text;
}
// make title to slug
function makeSlugFromTitle($title)
{
    $title = strtolower($title);
    $title = str_replace([' ', '.', '/', '\/'], ['-', '-', '-', '-'], $title);
    $title = preg_replace('/[^a-z0-9\-]/', '', $title);
    return $title;
}
