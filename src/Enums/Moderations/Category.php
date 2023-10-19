<?php

declare(strict_types=1);

namespace OpenAI\Enums\Moderations;

class Category
{
    public const Hate = 'hate';
    public const HateThreatening = 'hate/threatening';
    public const Harassment = 'harassment';
    public const HarassmentThreatening = 'harassment/threatening';
    public const SelfHarm = 'self-harm';
    public const SelfHarmIntent = 'self-harm/intent';
    public const SelfHarmInstructions = 'self-harm/instructions';
    public const Sexual = 'sexual';
    public const SexualMinors = 'sexual/minors';
    public const Violence = 'violence';
    public const ViolenceGraphic = 'violence/graphic';
}
