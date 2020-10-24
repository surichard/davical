<?php

$c->authenticate_hook['call'] = 'IMAP_PAM_check';
$c->authenticate_hook['config'] = array(
    'imap_url'   => '{ixecloud.com:143/imap/tls/}',
    'email_base' => 'ixecloud.com'
);

$c->admin_email  = 'admin.ixe@ixecloud.com';
$c->pg_connect[] = array( 'dsn' => 'pgsql:dbname=davical port=5432 host=postgres', 'dbuser' => 'davical', 'dbpass' => 'davical' );

include('drivers_imap_pam.php');
