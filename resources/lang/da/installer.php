<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'app' => [
        'slogan' => 'CMS til fremtiden'
    ],
    'welcome' => [
        'header' => 'Velkommen',
        'intro'     => 'Du er nu igang med at installere Laracore på denne hjemmeside',
        'choose_lang' => 'Vælg sprog',
        'lang_note' => "Vælg venligst det ønskede sprog til din hjemmeside.<br>Bemærk at ikke alle sprog er komplet oversatte fra starten,<br>dog kan andre udviklere udbyde disse oversættelser."
    ],
    'license' => [
        'header' => 'Licensaftale',
        'note' => "Laracore er bygget på open-source teknologi og- programbiblioteker. Disse er licenseret under MIT licensaftalen.<br>Disse biblioteker inkluderer, men er ikke begrænset til, Bootstrap, Laravel og jQuery",
        'accept' => 'Jeg accepterer licensaftalen'
    ],
    'requirements' => [
        'header' => 'Krav til applikationen',
        'info' => "Dit webhotel opfylder ikke kravene til at køre Laracore.<br>Gennemse venligst nedenstående liste og løs evt. problemer før du fortsætter"
    ],
    'check_again' => 'Kontroller igen',
    'database' => [
        'header' => 'Konfigurer database',
        'intro' => 'Vælg venligst den korrekte type database til dette website',
        'mysql' => 'MySQL eller MariaDB',
        'sqlsrv' => 'Microsoft SQL Server',
        'sqlite' => 'SQLite',
        'db_database' => 'Databasenavn',
        'db_username' => 'Databasebruger',
        'db_password' => 'Database adgangskode',
        'adv_notes' => 'Disse felter er ikke påkrævet for at køre installationen på MySQL, dog skal de udfyldes hvis Microsoft SQL Server anvendes',
        'db_prefix' => 'Præfix på tabeller',
        'test' => 'Test forbindelse'
    ],
    'adv_settings' => 'Avancerede indstillinger',
    'adv_settings' => 'Avancerede indstillinger',
    'hostname' => 'Værtsnavn',
    'port' => 'Port',
    'site' => [
        'header' => 'Konfigurer website',
        'intro' => 'Udfyld venligst felterne nedenfor med de korrekte informationer',
        'info' => 'Website information',
        'name' => 'Website navn',
        'email' => 'Website e-mail adresse',
        'email_note' => 'Denne e-mail adresse vil blive brugt som afsender på enhver e-mail der udsendes fra websitet, med mindre at et modul overstyrer dette med en alternativ opsætning',
        'admin' => [
            'header' => 'Administrator konto',
            'email' => 'Administrator e-mail',
            'name' => 'Administrator navn',
            'password' => 'Administrator adgangskode',
            'password_again' => 'Gentag administrator adgangskode'
        ]
    ],
    'username' => 'Brugernavn',
    'password' => 'Adgangskode',
    'regional' => [
        'header' => 'Regionale indstillinger'
    ],
    'install' => 'Installer',
    'done' => 'Færdig',
    'installing' => 'Installerer',
    'complete' => 'Gennemført',
    'finish' => [
        'header' => 'Tillykke',
        'info' => "Din nye hjemmeside er nu installeret.<br>Du kan enten gå direkte til hjemmesiden og se det dine besøgende vil se,<br>eller gå til administrationen for at skrive indhold og tilpasse din hjemmeside"
    ],
    'failed' => [
        'header' => 'Installationen fejlede',
        'info' => "Installation og konfiguration af Laracore blev ikke gennemført.<br>Nedenfor vises en oversigt over hvad der gik galt. For flere detaljer, se venligst logfilen."
    ]
];
