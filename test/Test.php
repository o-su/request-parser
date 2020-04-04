<?php declare(strict_types=1);

require_once('../src/RequestParser.php');

use RequestParser\RequestParser;

$parser = new RequestParser();

echo $parser->getClientIp();
echo $parser->getReferer();
echo $parser->getHost();
echo $parser->getUserAgent();
echo $parser->getLanguage();
echo $parser->getUrl();
echo $parser->getHttpMethod();
echo $parser->getProtocol();
echo $parser->getQuery();
echo $parser->getBody();
print_r($parser->getHeaders());
