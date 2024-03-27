<?php

namespace Donnie\PhpTest\Kata;

class VersionManager
{

    private const MAX_VERSION_VALUES = 3;
    private const BASE_VERSION = "0.0.1";
    private int|null $major = null;
    private int|null $minor = null;
    private int|null $patch = null;
    private array $versionHistory = [];

    function __construct(string $version = "")
    {
        $validated = $this->validate($version);
        $this->setVersion($validated);
    }

    private function saveHistory()
    {
        if (!is_null($this->major)) {
            array_push($this->versionHistory, [$this->major, $this->minor, $this->patch]);
        }
    }

    private function setVersion(array $version)
    {
        $this->saveHistory();
        $this->major = $version[0];
        $this->minor = $version[1];
        $this->patch = $version[2];
        return $this;
    }

    private function validate(string $version): array
    {
        $validated = [];

        if (trim($version) === "") {
            $version = self::BASE_VERSION;
        }

        $versionAsArray = explode('.', $version);
        for ($i = 0; $i < self::MAX_VERSION_VALUES; $i++) {

            if (array_key_exists($i, $versionAsArray)) {
                if (!is_numeric($versionAsArray[$i])) {
                    throw new \Exception("Error occured while parsing version!");
                }
                array_push($validated, intval($versionAsArray[$i]));
            } else {
                array_push($validated, 0);
            }
        }

        if (implode(".", $validated) === "0.0.0") {
            $validated[self::MAX_VERSION_VALUES - 1] = 1;
        }

        return $validated;
    }

    public function major(): VersionManager
    {
        return $this->setVersion([$this->major + 1, 0, 0]);
    }

    public function minor(): VersionManager
    {
        return $this->setVersion([$this->major, $this->minor + 1, 0]);
    }

    public function patch(): VersionManager
    {
        return $this->setVersion([$this->major, $this->minor, $this->patch + 1]);
    }

    public function release(): string
    {
        return "{$this->major}.{$this->minor}.{$this->patch}";
    }

    public function rollback(): VersionManager
    {
        if (count($this->versionHistory) > 0) {
            $lastVersion = array_pop($this->versionHistory);
            return $this->setVersion($lastVersion);
        } else {
            throw new \Exception("Cannot rollback!");
        }
    }
}
