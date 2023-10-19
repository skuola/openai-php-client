<?php

namespace OpenAI\Testing\Resources\Concerns;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Responses\StreamResponse;
use OpenAI\Testing\ClientFake;
use OpenAI\Testing\Requests\TestRequest;

trait Testable
{
    public function __construct(protected ClientFake $fake)
    {
    }

    abstract protected function resource(): string;

    /**
     * @param  array<string, mixed>|string  $parameters
     * @return \OpenAI\Contracts\ResponseContract|\OpenAI\Responses\StreamResponse|string
     */
    protected function record(string $method, $parameters = null)
    {
        return $this->fake->record(new TestRequest($this->resource(), $method, $parameters));
    }

    /**
     * @param callable|int $callback
     */
    public function assertSent($callback = null): void
    {
        $this->fake->assertSent($this->resource(), $callback);
    }

    /**
     * @param callable|int $callback
     */
    public function assertNotSent($callback = null): void
    {
        $this->fake->assertNotSent($this->resource(), $callback);
    }
}
