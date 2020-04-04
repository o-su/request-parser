<?php declare(strict_types=1);

namespace RequestParser;

class RequestParser
{
    private ?string $clientIp = null;
    private ?string $referer = null;
    private ?string $host = null;
    private ?string $userAgent = null;
    private ?string $language = null;
    private ?string $httpMethod = null;
    private ?string $protocol = null;
    private ?string $query = null;

    public function __construct()
    {
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $this->clientIp = $_SERVER['REMOTE_ADDR'];
        }

        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->referer = $_SERVER['HTTP_REFERER'];
        }

        if (isset($_SERVER['HTTP_HOST'])) {
            $this->host = $_SERVER['HTTP_HOST'];
        }

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $this->language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        }

        if (isset($_SERVER['REQUEST_METHOD'])) {
            $this->httpMethod = $_SERVER['REQUEST_METHOD'];
        }

        if (isset($_SERVER['REQUEST_SCHEME'])) {
            $this->protocol = $_SERVER['REQUEST_SCHEME'];
        }

        if (isset($_SERVER['QUERY_STRING'])) {
            $this->query = $_SERVER['QUERY_STRING'];
        }
    }

    public function getClientIp(): ?string
    {
        return $this->clientIp;
    }

    public function getReferer(): ?string
    {
        return $this->referer;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getUrl(): ?string
    {
        if (isset($this->protocol) && isset($this->host) && isset($_SERVER['REQUEST_URI'])) {
            return "{$this->protocol}://{$this->host}{$_SERVER['REQUEST_URI']}";
        } else {
            return null;
        }
    }

    public function getHttpMethod(): ?string
    {
        return $this->httpMethod;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function getBody(): ?string
    {
        return file_get_contents("php://input");
    }

    public function getHeaders(): array
    {
        return getallheaders();
    }
}
