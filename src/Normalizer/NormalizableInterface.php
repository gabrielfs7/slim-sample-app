<?php

namespace SlimSampleApp\Normalizer;

interface NormalizableInterface
{
    public function normalize($resource): array;

    public function canNormalize($resource): bool;
}