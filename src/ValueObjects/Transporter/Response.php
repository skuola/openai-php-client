<?php

declare(strict_types=1);

namespace OpenAI\ValueObjects\Transporter;

use OpenAI\Responses\Meta\MetaInformation;

/**
 * @template-covariant TData of array|string
 *
 * @internal
 */
final class Response
{
    /**
     * @var TData
     * @readonly
     */
    private $data;
    /**
     * @readonly
     * @var \OpenAI\Responses\Meta\MetaInformation
     */
    private $meta;
    /**
     * Creates a new Response value object.
     *
     * @param mixed[]|string $data
     */
    private function __construct(
        $data,
        MetaInformation $meta
    ) {
        $this->data = $data;
        $this->meta = $meta;
        // ..
    }

    /**
     * Creates a new Response value object from the given data and meta information.
     *
     * @param mixed[]|string $data
     * @param  array<string, array<int, string>>  $headers
     * @return Response<TData>
     */
    public static function from($data, array $headers): self
    {
        // @phpstan-ignore-next-line
        $meta = MetaInformation::from($headers);

        return new self($data, $meta);
    }

    /**
     * Returns the response data.
     *
     * @return TData
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Returns the meta information.
     */
    public function meta(): MetaInformation
    {
        return $this->meta;
    }
}
