<?php

/*
 * Load settings & constants
 */
require ("../data/settings.php");

/*
 * Autoload and reister classes within classes directory
 */

try {
    set_include_path("../classes/");
    spl_autoload_extensions(".php");
    spl_autoload_register();
} catch (Exception $e) {
    echo "Error loading classes! <br>".$e;
}