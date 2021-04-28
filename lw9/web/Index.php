<?php
require_once __DIR__ . ('/../src/common.inc.php');
$requestMethod = getRequestMethod();
if ($requestMethod === 'GET')
{
    mainPage();
}
else
{
    saveFeedbackPage();
}
