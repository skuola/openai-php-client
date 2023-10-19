<?php

declare(strict_types=1);

namespace OpenAI\Responses\Audio;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Contracts\ResponseHasMetaInformationContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Responses\Concerns\HasMetaInformation;
use OpenAI\Responses\Meta\MetaInformation;
use OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{task: ?string, language: ?string, duration: ?float, segments: array<int, array{id: int, seek: int, start: float, end: float, text: string, tokens: array<int, int>, temperature: float, avg_logprob: float, compression_ratio: float, no_speech_prob: float, transient: bool}>, text: string}>
 */
final class TranslationResponse implements ResponseContract, ResponseHasMetaInformationContract
{
    /**
     * @readonly
     * @var string|null
     */
    public $task;
    /**
     * @readonly
     * @var string|null
     */
    public $language;
    /**
     * @readonly
     * @var float|null
     */
    public $duration;
    /**
     * @var array<int, TranslationResponseSegment>
     * @readonly
     */
    public $segments;
    /**
     * @readonly
     * @var string
     */
    public $text;
    /**
     * @readonly
     * @var \OpenAI\Responses\Meta\MetaInformation
     */
    private $meta;
    /**
     * @use ArrayAccessible<array{task: ?string, language: ?string, duration: ?float, segments: array<int, array{id: int, seek: int, start: float, end: float, text: string, tokens: array<int, int>, temperature: float, avg_logprob: float, compression_ratio: float, no_speech_prob: float, transient: bool}>, text: string}>
     */
    use ArrayAccessible;

    use Fakeable;
    use HasMetaInformation;

    /**
     * @param  array<int, TranslationResponseSegment>  $segments
     */
    private function __construct(?string $task, ?string $language, ?float $duration, array $segments, string $text, MetaInformation $meta)
    {
        $this->task = $task;
        $this->language = $language;
        $this->duration = $duration;
        $this->segments = $segments;
        $this->text = $text;
        $this->meta = $meta;
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{task: ?string, language: ?string, duration: ?float, segments: array<int, array{id: int, seek: int, start: float, end: float, text: string, tokens: array<int, int>, temperature: float, avg_logprob: float, compression_ratio: float, no_speech_prob: float, transient: bool}>, text: string}  $attributes
     */
    public static function from($attributes, MetaInformation $meta): self
    {
        if (is_string($attributes)) {
            $attributes = ['text' => $attributes];
        }

        $segments = isset($attributes['segments']) ? array_map(function (array $result) : TranslationResponseSegment {
            return TranslationResponseSegment::from(
                $result
            );
        }, $attributes['segments']) : [];

        return new self($attributes['task'] ?? null, $attributes['language'] ?? null, $attributes['duration'] ?? null, $segments, $attributes['text'], $meta);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'task' => $this->task,
            'language' => $this->language,
            'duration' => $this->duration,
            'segments' => array_map(static function (TranslationResponseSegment $result) : array {
                return $result->toArray();
            }, $this->segments),
            'text' => $this->text,
        ];
    }
}
