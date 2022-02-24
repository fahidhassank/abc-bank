<?php

// Autoloaded in composer.json

function currencyFormat($amount)
{
    return number_format($amount, 2, '.', ',');
}
