<?php

declare(strict_types=1);

namespace OpenAI\Responses\FineTuning;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Contracts\ResponseHasMetaInformationContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Responses\Concerns\HasMetaInformation;
use OpenAI\Responses\Meta\MetaInformation;
use OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{object: string, data: array<int, array{object: string, id: string, created_at: int, level: string, message: string, data: array{step: int, train_loss: float, train_mean_token_accuracy: float}|null, type: string}>, has_more: bool}>
 */
final class ListJobEventsResponse implements ResponseContract, ResponseHasMetaInformationContract
{
    /**
     * @readonly
     * @var string
     */
    public $object;
    /**
     * @var array<int, ListJobEventsResponseEvent>
     * @readonly
     */
    public $data;
    /**
     * @readonly
     * @var bool
     */
    public $hasMore;
    /**
     * @readonly
     * @var \OpenAI\Responses\Meta\MetaInformation
     */
    private $meta;
    /**
     * @use ArrayAccessible<array{object: string, data: array<int, array{object: string, id: string, created_at: int, level: string, message: string, data: array{step: int, train_loss: float, train_mean_token_accuracy: float}|null, type: string}>, has_more: bool}>
     */
    use ArrayAccessible;

    use Fakeable;
    use HasMetaInformation;

    /**
     * @param  array<int, ListJobEventsResponseEvent>  $data
     */
    private function __construct(string $object, array $data, bool $hasMore, MetaInformation $meta)
    {
        $this->object = $object;
        $this->data = $data;
        $this->hasMore = $hasMore;
        $this->meta = $meta;
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{object: string, data: array<int, array{object: string, id: string, created_at: int, level: string, message: string, data: array{step: int, train_loss: float, train_mean_token_accuracy: float}|null, type: string}>, has_more: bool}  $attributes
     */
    public static function from(array $attributes, MetaInformation $meta): self
    {
        $data = array_map(function (array $result) : ListJobEventsResponseEvent {
            return ListJobEventsResponseEvent::from(
                $result
            );
        }, $attributes['data']);

        return new self($attributes['object'], $data, $attributes['has_more'], $meta);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'object' => $this->object,
            'data' => array_map(static function (ListJobEventsResponseEvent $response) : array {
                return $response->toArray();
            }, $this->data),
            'has_more' => $this->hasMore,
        ];
    }
}
