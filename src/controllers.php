<?php

$app->mount('/webhook', new Cram\Controller\WebhookControllerProvider());
$app->mount('/configure', new Cram\Controller\ConfigureControllerProvider());