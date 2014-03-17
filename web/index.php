<?php
$app = require_once __DIR__ . '/../src/app.php';
require_once __DIR__ . '/../resources/config/prod.php';

// And away we go
$app->run();