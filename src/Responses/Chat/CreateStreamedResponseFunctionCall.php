<?php

declare(strict_types=1);

namespace OpenAI\Responses\Chat;

final class CreateStreamedResponseFunctionCall
{
    /**
     * @readonly
     * @var string|null
     */
    public $name;
    /**
     * @readonly
     * @var string|null
     */
    public $arguments;
    private function __construct(?string $name, ?string $arguments)
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }
    /**
     * @param  array{name?: ?string, arguments?: ?string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['name'] ?? null, $attributes['arguments'] ?? null);
    }

    /**
     * @return array{name?: string, arguments?: string}
     */
    public function toArray(): array
    {
        $data = [];

        if (! is_null($this->name)) {
            $data['name'] = $this->name;
        }

        if (! is_null($this->arguments)) {
            $data['arguments'] = $this->arguments;
        }

        return $data;
    }
}
