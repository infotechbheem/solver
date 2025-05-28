<?php

use Carbon\Carbon;

function __formatDate($date)
{
    return Carbon::parse($date)->format('d-m-Y');
}
function __formatDateAndTime($date)
{
    return Carbon::parse($date)->format('d-m-Y h:i:A');
}
function __formatTime($date)
{
    return Carbon::parse($date)->format('h:i:A');
}
