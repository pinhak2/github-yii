<?php
$db2 = require __DIR__ . '/db2.php';
// test database! Important not to run tests on production or development databases
$db2['dsn'] = 'mysql:host=localhost;dbname=test';

return $db2;
