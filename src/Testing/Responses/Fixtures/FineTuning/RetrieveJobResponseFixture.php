<?php

namespace OpenAI\Testing\Responses\Fixtures\FineTuning;

final class RetrieveJobResponseFixture
{
    public const ATTRIBUTES = [
        'id' => 'ft-AF1WoRqd3aJAHsqc9NY7iL8F',
        'object' => 'fine_tuning.job',
        'model' => 'gpt-3.5-turbo-0613',
        'created_at' => 1614807352,
        'finished_at' => 1692819450,
        'fine_tuned_model' => 'ft:gpt-3.5-turbo-0613:gehri-dev::7qnxQ0sQ',
        'hyperparameters' => [
            'n_epochs' => 9,
        ],
        'organization_id' => 'org-jwe45798ASN82s',
        'result_files' => [
            'file-1bl05WrhsKDDEdg8XSP617QF',
        ],
        'status' => 'succeeded',
        'validation_file' => null,
        'training_file' => 'file-abc123',
        'trained_tokens' => 5049,
    ];
}
