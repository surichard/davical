<?php

$c->authenticate_hook['call'] = 'IMAP_PAM_check';
$c->authenticate_hook['config'] = array(
    'imap_url'   => '{example.com:143/imap/tls/}',
    'email_base' => 'example.com'
);

$c->admin_email  = 'admin@example.com';
$c->pg_connect[] = array( 'dsn' => 'pgsql:dbname=davical port=5432 host=postgres', 'dbuser' => 'davical', 'dbpass' => 'davical' );

include('drivers_imap_pam.php');