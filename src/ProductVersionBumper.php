<?php

namespace Elegasoft\ProductVersion;

/**
 * @property array $currentVersion
 */
class ProductVersionBumper
{
    public function __construct(string $currentVersion)
    {
        $this->currentVersion = $this->extractSemver($currentVersion);
    }

    private function extractSemver(string $currentVersion): array
    {
        $withoutTrailingTagInfo = explode('-', $currentVersion)[0];
        $withoutLetters = str_replace('v', '', $withoutTrailingTagInfo);
        $flippedStrippedVersion = array_reverse(explode('.', $withoutLetters));
        return [
            'major' => (int)$flippedStrippedVersion[2] ?? 0,
            'minor' => (int)$flippedStrippedVersion[1] ?? 0,
            'patch' => (int)$flippedStrippedVersion[0] ?? 0,
        ];
    }

    public static function from(string $currentVersion): self
    {
        return new self($currentVersion);
    }

    public function bumpMajor(): string
    {
        $this->currentVersion['major']++;
        $this->currentVersion['minor'] = 0;
        $this->currentVersion['patch'] = 0;

        return $this->returnBumpedVersion();
    }

    private function returnBumpedVersion()
    {
        return implode('', [
            'v',
            $this->currentVersion['major'],
            '.',
            $this->currentVersion['minor'],
            '.',
            $this->currentVersion['patch'],
        ]);
    }

    public function bumpMinor(): string
    {
        $this->currentVersion['minor']++;
        $this->currentVersion['patch'] = 0;

        return $this->returnBumpedVersion();
    }

    public function bumpPatch(): string
    {
        $this->currentVersion['patch']++;
        return $this->returnBumpedVersion();
    }
}