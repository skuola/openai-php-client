<?php

namespace OpenAI\Testing\Requests;

final class TestRequest
{
    /**
     * @var string
     */
    protected $resource;
    /**
     * @var string
     */
    protected $method;
    /**
     * @var array<string, mixed>|string|null
     */
    protected $parameters;
    /**
     * @param  array<string, mixed>|string|null  $parameters
     */
    public function __construct(string $resource, string $method, $parameters)
    {
        $this->resource = $resource;
        $this->method = $method;
        $this->parameters = $parameters;
    }

    public function resource(): string
    {
        return $this->resource;
    }

    public function method(): string
    {
        return $this->method;
    }

    /**
     * @return array<string, mixed>|string|null
     */
    public function parameters()
    {
        return $this->parameters;
    }
}
