<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'name' => 'Simple PHP Website',
        'site_url' => '',
        'pretty_uri' => false,
        'nav_menu' => [
            '' => 'Home',
            'about-us' => 'About Us',
            'products' => 'Products',
            'contact' => 'Contact',
            'phpinfo' => 'KotoKoto',
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v1.1.4',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
