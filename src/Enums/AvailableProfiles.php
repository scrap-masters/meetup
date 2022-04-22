<?php

declare(strict_types=1);

namespace Blumilk\Meetup\Core\Enums;

use Illuminate\Support\Collection;

enum AvailableProfiles: string
{
    case Facebook = "Facebook";
    case Linkedin = "Linkedin";
    case Instagram = "Instagram";
    case YouTube = "YouTube";
    case Twitter = "Twitter";
    case GitHub = "GitHub";

    public function label(): string
    {
        return __($this->value);
    }

    public static function casesToSelect(): array
    {
        $cases = AvailableProfiles::all();

        return $cases->map(
            fn(AvailableProfiles $enum): array => [
                "label" => $enum->label(),
                "value" => $enum->value,
            ],
        )->toArray();
    }

    public static function all(): Collection
    {
        return new Collection(AvailableProfiles::cases());
    }
}