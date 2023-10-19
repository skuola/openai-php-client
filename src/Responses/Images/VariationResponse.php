<?php

declare(strict_types=1);

namespace OpenAI\Responses\Images;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Contracts\ResponseHasMetaInformationContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Responses\Concerns\HasMetaInformation;
use OpenAI\Responses\Meta\MetaInformation;
use OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{created: int, data: array<int, array{url?: string, b64_json?: string}>}>
 */
final class VariationResponse implements ResponseContract, ResponseHasMetaInformationContract
{
    /**
     * @readonly
     * @var int
     */
    public $created;
    /**
     * @var array<int, VariationResponseData>
     * @readonly
     */
    public $data;
    /**
     * @readonly
     * @var \OpenAI\Responses\Meta\MetaInformation
     */
    private $meta;
    /**
     * @use ArrayAccessible<array{created: int, data: array<int, array{url?: string, b64_json?: string}>}>
     */
    use ArrayAccessible;

    use Fakeable;
    use HasMetaInformation;

    /**
     * @param  array<int, VariationResponseData>  $data
     */
    private function __construct(int $created, array $data, MetaInformation $meta)
    {
        $this->created = $created;
        $this->data = $data;
        $this->meta = $meta;
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{created: int, data: array<int, array{url?: string, b64_json?: string}>}  $attributes
     */
    public static function from(array $attributes, MetaInformation $meta): self
    {
        $results = array_map(function (array $result) : VariationResponseData {
            return VariationResponseData::from(
                $result
            );
        }, $attributes['data']);

        return new self($attributes['created'], $results, $meta);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'created' => $this->created,
            'data' => array_map(static function (VariationResponseData $result) : array {
                return $result->toArray();
            }, $this->data),
        ];
    }
}
