<?php

function currency_format($amount)
{
    return number_format($amount, 2, ',', '.');
}

function date_time_format($date)
{
        return date('d.m.Y', $date);
}
