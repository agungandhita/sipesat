<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Typography Settings
    |--------------------------------------------------------------------------
    | Define the fonts used in the template.
    | You can use Google Fonts or any other font family.
    */
    'typography' => [
        'font_family' => "'Inter', sans-serif",
        'google_fonts_url' => 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
    ],

    /*
    |--------------------------------------------------------------------------
    | Color Settings
    |--------------------------------------------------------------------------
    | Define the primary and secondary colors used throughout the template.
    | These will be injected as CSS variables.
    */
    'colors' => [
        'primary' => '#2563eb', // blue-600
        'primary_hover' => '#1d4ed8', // blue-700
        'secondary' => '#4338ca', // indigo-700
        'bg_gradient_start' => '#2563eb',
        'bg_gradient_end' => '#4338ca',
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Settings
    |--------------------------------------------------------------------------
    | Paths to the images used in the template.
    */
    'images' => [
        'logo' => 'img/logo-desa.png',
        'logo_fallback' => 'img/lamongan.png',
        'hero_bg_opacity' => '0.2',
    ],

    /*
    |--------------------------------------------------------------------------
    | Content Settings
    |--------------------------------------------------------------------------
    | Default content for various sections.
    */
    'content' => [
        'village_name' => 'Desa Gedongboyountung',
        'village_location' => 'Kecamatan Turi, Kabupaten Lamongan, Provinsi Jawa Timur',
        'village_district' => 'Turi',
        'village_city' => 'Lamongan',
        'village_province' => 'Jawa Timur',
        'vision' => 'Mewujudkan pelayanan masyarakat yang profesional dan transparan demi kemajuan dan kesejahteraan masyarakat Desa.',
        'missions' => [
            'Meningkatkan kualitas pelayanan masyarakat yang profesional, mudah diakses, dan transparan.',
            'Mendorong pembangunan infrastruktur desa untuk mendukung kemajuan ekonomi dan sosial masyarakat.',
            'Mengembangkan potensi sumber daya manusia dan sumber daya alam untuk kesejahteraan bersama.',
            'Mewujudkan lingkungan desa yang bersih, aman, dan nyaman sebagai tempat tinggal yang ideal.'
        ],
        'borders' => [
            'north' => 'Desa Sukoanyar',
            'east' => 'Desa Kemlagilor',
            'south' => 'Desa Sukorejo',
            'west' => 'Desa Balun',
        ],
        'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.757476831033!2d112.38317765!3d-7.05141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77ef6e8a09695d%3A0x8673a067000e401d!2sGedongboyountung%2C%20Turi%2C%20Lamongan%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
    ]
];
