<?php

declare(strict_types=1);

namespace OpenAI\ValueObjects\Transporter;

use OpenAI\Enums\Transporter\ContentType;
use OpenAI\ValueObjects\ApiKey;

/**
 * @internal
 */
final class Headers
{
    /**
     * @var array<string, string>
     * @readonly
     */
    private $headers;
    /**
     * Creates a new Headers value object.
     *
     * @param  array<string, string>  $headers
     */
    private function __construct(array $headers)
    {
        $this->headers = $headers;
        // ..
    }

    /**
     * Creates a new Headers value object
     */
    public static function create(): self
    {
        return new self([]);
    }

    /**
     * Creates a new Headers value object with the given API token.
     */
    public static function withAuthorization(ApiKey $apiKey): self
    {
        return new self([
            'Authorization' => "Bearer {$apiKey->toString()}",
        ]);
    }

    /**
     * Creates a new Headers value object, with the given content type, and the existing headers.
     * @param \OpenAI\Enums\Transporter\ContentType::* $contentType
     */
    public function withContentType($contentType, string $suffix = ''): self
    {
        return new self(array_merge($this->headers, ['Content-Type' => $contentType->value.$suffix]));
    }

    /**
     * Creates a new Headers value object, with the given organization, and the existing headers.
     */
    public function withOrganization(string $organization): self
    {
        return new self(array_merge($this->headers, ['OpenAI-Organization' => $organization]));
    }

    /**
     * Creates a new Headers value object, with the newly added header, and the existing headers.
     */
    public function withCustomHeader(string $name, string $value): self
    {
        return new self(array_merge($this->headers, [$name => $value]));
    }

    /**
     * @return array<string, string> $headers
     */
    public function toArray(): array
    {
        return $this->headers;
    }
}
