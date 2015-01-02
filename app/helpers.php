<?php

function setActive($route, $class = 'active')
{
    return Request::is($route) ? $class : '';
}