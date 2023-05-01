<?php

declare(strict_types=1);

namespace App\GraphQL\Type;

use Overblog\GraphQLBundle\Annotation as GQL;

#[GQL\Type]
final class Human
{
    #[GQL\Field]
    public int $id;

    #[GQL\Field]
    public string $name;
}
