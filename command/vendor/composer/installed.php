<?php return array(
    'root' => array(
        'name' => 'veritrans/command_sample',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'monolog/monolog' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => 'f2156cdd55f960432c332d4da1cd53c7fccf075f',
            'type' => 'library',
            'install_path' => __DIR__ . '/../monolog/monolog',
            'aliases' => array(
                0 => '2.x-dev',
            ),
            'dev_requirement' => false,
        ),
        'psr/log' => array(
            'pretty_version' => '1.1.4',
            'version' => '1.1.4.0',
            'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0.0',
            ),
        ),
        'veritrans/command_sample' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'veritrans/tgmdk' => array(
            'pretty_version' => '1.1.5',
            'version' => '1.1.5.0',
            'reference' => '60783afaf32552e81aed07edacdb52e20a6d2893',
            'type' => 'library',
            'install_path' => __DIR__ . '/../veritrans/tgmdk',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
