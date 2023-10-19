<?php

declare(strict_types=1);

namespace OpenAI\Responses\Files;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Contracts\ResponseHasMetaInformationContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Responses\Concerns\HasMetaInformation;
use OpenAI\Responses\Meta\MetaInformation;
use OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{id: string, object: string, created_at: int, bytes: int, filename: string, purpose: string, status: string, status_details: array<array-key, mixed>|string|null}>
 */
final class RetrieveResponse implements ResponseContract, ResponseHasMetaInformationContract
{
    /**
     * @readonly
     * @var string
     */
    public $id;
    /**
     * @readonly
     * @var string
     */
    public $object;
    /**
     * @readonly
     * @var int
     */
    public $bytes;
    /**
     * @readonly
     * @var int
     */
    public $createdAt;
    /**
     * @readonly
     * @var string
     */
    public $filename;
    /**
     * @readonly
     * @var string
     */
    public $purpose;
    /**
     * @readonly
     * @var string
     */
    public $status;
    /**
     * @var array<array-key, mixed>|null
     * @readonly
     */
    public $statusDetails;
    /**
     * @readonly
     * @var \OpenAI\Responses\Meta\MetaInformation
     */
    private $meta;
    /**
     * @use ArrayAccessible<array{id: string, object: string, created_at: int, bytes: int, filename: string, purpose: string, status: string, status_details: array<array-key, mixed>|string|null}>
     */
    use ArrayAccessible;

    use Fakeable;
    use HasMetaInformation;

    /**
     * @param  array<array-key, mixed>|null  $statusDetails
     */
    private function __construct(string $id, string $object, int $bytes, int $createdAt, string $filename, string $purpose, string $status, $statusDetails, MetaInformation $meta)
    {
        $this->id = $id;
        $this->object = $object;
        $this->bytes = $bytes;
        $this->createdAt = $createdAt;
        $this->filename = $filename;
        $this->purpose = $purpose;
        $this->status = $status;
        $this->statusDetails = $statusDetails;
        $this->meta = $meta;
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{id: string, object: string, created_at: int, bytes: int, filename: string, purpose: string, status: string, status_details: array<array-key, mixed>|string|null}  $attributes
     */
    public static function from(array $attributes, MetaInformation $meta): self
    {
        return new self($attributes['id'], $attributes['object'], $attributes['bytes'], $attributes['created_at'], $attributes['filename'], $attributes['purpose'], $attributes['status'], $attributes['status_details'], $meta);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'object' => $this->object,
            'bytes' => $this->bytes,
            'created_at' => $this->createdAt,
            'filename' => $this->filename,
            'purpose' => $this->purpose,
            'status' => $this->status,
            'status_details' => $this->statusDetails,
        ];
    }
}
