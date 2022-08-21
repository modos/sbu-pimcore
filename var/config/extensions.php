<?php

return [
    "bundle" => [
        "Pimcore\\Bundle\\DataHubBundle\\PimcoreDataHubBundle" => [
            "enabled" => TRUE,
            "priority" => 11,
            "environments" => [

            ]
        ],
        "Pimcore\\Bundle\\DataImporterBundle\\PimcoreDataImporterBundle" => TRUE,
        "Pimcore\\Bundle\\EcommerceFrameworkBundle\\PimcoreEcommerceFrameworkBundle" => [
            "enabled" => FALSE,
            "priority" => 11,
            "environments" => [

            ]
        ]
    ]
];
