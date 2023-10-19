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
 * @implements ResponseContract<array{id: string, object: string, model: string, created_at: int, finished_at: ?int, fine_tuned_model: ?string, hyperparameters: array{n_epochs: int|string}, organization_id: string, result_files: array<int, string>, status: string, validation_file: ?string, training_file: string, trained_tokens: ?int}>
 */
final class RetrieveJobResponse implements ResponseContract, ResponseHasMetaInformationContract
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
     * @var string
     */
    public $model;
    /**
     * @readonly
     * @var int
     */
    public $createdAt;
    /**
     * @readonly
     * @var int|null
     */
    public $finishedAt;
    /**
     * @readonly
     * @var string|null
     */
    public $fineTunedModel;
    /**
     * @readonly
     * @var \OpenAI\Responses\FineTuning\RetrieveJobResponseHyperparameters
     */
    public $hyperparameters;
    /**
     * @readonly
     * @var string
     */
    public $organizationId;
    /**
     * @var array<int, string>
     * @readonly
     */
    public $resultFiles;
    /**
     * @readonly
     * @var string
     */
    public $status;
    /**
     * @readonly
     * @var string|null
     */
    public $validationFile;
    /**
     * @readonly
     * @var string
     */
    public $trainingFile;
    /**
     * @readonly
     * @var int|null
     */
    public $trainedTokens;
    /**
     * @readonly
     * @var \OpenAI\Responses\Meta\MetaInformation
     */
    private $meta;
    /**
     * @use ArrayAccessible<array{id: string, object: string, model: string, created_at: int, finished_at: ?int, fine_tuned_model: ?string, hyperparameters: array{n_epochs: int|string}, organization_id: string, result_files: array<int, string>, status: string, validation_file: ?string, training_file: string, trained_tokens: ?int}>
     */
    use ArrayAccessible;

    use Fakeable;
    use HasMetaInformation;

    /**
     * @param  array<int, string>  $resultFiles
     */
    private function __construct(string $id, string $object, string $model, int $createdAt, ?int $finishedAt, ?string $fineTunedModel, RetrieveJobResponseHyperparameters $hyperparameters, string $organizationId, array $resultFiles, string $status, ?string $validationFile, string $trainingFile, ?int $trainedTokens, MetaInformation $meta)
    {
        $this->id = $id;
        $this->object = $object;
        $this->model = $model;
        $this->createdAt = $createdAt;
        $this->finishedAt = $finishedAt;
        $this->fineTunedModel = $fineTunedModel;
        $this->hyperparameters = $hyperparameters;
        $this->organizationId = $organizationId;
        $this->resultFiles = $resultFiles;
        $this->status = $status;
        $this->validationFile = $validationFile;
        $this->trainingFile = $trainingFile;
        $this->trainedTokens = $trainedTokens;
        $this->meta = $meta;
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{id: string, object: string, model: string, created_at: int, finished_at: ?int, fine_tuned_model: ?string, hyperparameters: array{n_epochs: int|string}, organization_id: string, result_files: array<int, string>, status: string, validation_file: ?string, training_file: string, trained_tokens: ?int}  $attributes
     */
    public static function from(array $attributes, MetaInformation $meta): self
    {
        return new self($attributes['id'], $attributes['object'], $attributes['model'], $attributes['created_at'], $attributes['finished_at'], $attributes['fine_tuned_model'], RetrieveJobResponseHyperparameters::from($attributes['hyperparameters']), $attributes['organization_id'], $attributes['result_files'], $attributes['status'], $attributes['validation_file'], $attributes['training_file'], $attributes['trained_tokens'], $meta);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'object' => $this->object,
            'model' => $this->model,
            'created_at' => $this->createdAt,
            'finished_at' => $this->finishedAt,
            'fine_tuned_model' => $this->fineTunedModel,
            'hyperparameters' => $this->hyperparameters->toArray(),
            'organization_id' => $this->organizationId,
            'result_files' => $this->resultFiles,
            'status' => $this->status,
            'validation_file' => $this->validationFile,
            'training_file' => $this->trainingFile,
            'trained_tokens' => $this->trainedTokens,
        ];
    }
}
