<?php

declare(strict_types=1);

namespace App\GraphQL\Root;

use Overblog\GraphQLBundle\Annotation as GQL;

#[GQL\Type]
final class Mutation
{
    #[GQL\Field(name: 'createUser', type: 'User!')]
    public array $createUser;
}
