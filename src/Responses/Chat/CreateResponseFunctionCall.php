<?php

declare(strict_types=1);

namespace OpenAI\Responses\Chat;

final class CreateResponseFunctionCall
{
    /**
     * @readonly
     * @var string
     */
    public $name;
    /**
     * @readonly
     * @var string
     */
    public $arguments;
    private function __construct(string $name, string $arguments)
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }
    /**
     * @param  array{name: string, arguments: string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['name'], $attributes['arguments']);
    }

    /**
     * @return array{name: string, arguments: string}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'arguments' => $this->arguments,
        ];
    }
}
