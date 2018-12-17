<?php
function post($name)
{
    if (isset($_POST[$name])) {
        if (is_array($_POST[$name]))
            return array_map(function ($item) {
                return htmlspecialchars(trim($item));
            }, $_POST[$name]);
        return htmlspecialchars(trim($_POST[$name]));
    }
}
function parseError($text)
{
    echo json_encode($text);
}