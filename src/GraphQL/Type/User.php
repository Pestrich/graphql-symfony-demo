<?php

declare(strict_types=1);

namespace App\GraphQL\Type;

use Overblog\GraphQLBundle\Annotation as GQL;

#[GQL\Type]
final class User
{
    #[GQL\Field]
    public int $id;

    #[GQL\Field]
    public string $name;

    #[GQL\Field]
    public int $age;
}
