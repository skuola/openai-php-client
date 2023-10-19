<?php

namespace OpenAI\Responses\Meta;

final class MetaInformationOpenAI
{
    /**
     * @readonly
     * @var string|null
     */
    public $model;
    /**
     * @readonly
     * @var string|null
     */
    public $organization;
    /**
     * @readonly
     * @var string|null
     */
    public $version;
    /**
     * @readonly
     * @var int
     */
    public $processingMs;
    public function __construct(?string $model, ?string $organization, ?string $version, int $processingMs)
    {
        $this->model = $model;
        $this->organization = $organization;
        $this->version = $version;
        $this->processingMs = $processingMs;
    }
    /**
     * @param  array{model: ?string, organization: ?string, version: ?string, processingMs: int}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['model'], $attributes['organization'], $attributes['version'], $attributes['processingMs']);
    }
}
