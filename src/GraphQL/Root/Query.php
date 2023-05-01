<?php

declare(strict_types=1);

namespace App\GraphQL\Root;

use Overblog\GraphQLBundle\Annotation as GQL;

#[GQL\Type]
final class Query
{
    #[GQL\Field(name: 'characters', type: '[Character!]!')]
    public array $characters;

    #[GQL\Field(name: 'humans', type: '[Human!]!')]
    public array $humans;

    #[GQL\Field(name: 'direwolves', type: '[Direwolf!]!')]
    public array $direwolves;

    #[GQL\Field(name: 'user', type: 'User!', resolve: 'query("App\\\\GraphQL\\\\Resolver\\\\UserResolver", value, args, context, info)')]
    public array $user;
}
