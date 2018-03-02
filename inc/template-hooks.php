<?php

if ( ! defined( 'ABSPATH' ) ) exit;

foreach (glob(plugin_dir_path(__FILE__) . 'hooks/*.php') as $filename)
{
    include_once $filename;
}