<?php

declare(strict_types=1);

namespace App\GraphQL\Resolver;

use App\GraphQL\Type\User;
use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Annotation as GQL;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use Overblog\GraphQLBundle\Definition\Resolver\QueryInterface;

// #[GQL\Provider]
final class UserResolver implements QueryInterface // Атрибуты указывать не нужно, так как мы уже указали все в Query
{
    // #[GQL\Field(
    //     name: 'user',
    //     type: 'User!',
    //     resolve: "query('App\\\\GraphQL\\\\Resolver\\\\UserResolver', info)"
    // )]
    // #[GQL\Description('Description')]
    public function __invoke(
        mixed $value,
        ArgumentInterface $args,
        ArrayObject $context,
        ResolveInfo $info
    ): User {
        $user = new User();

        $user->id = 1;
        $user->name = 'Vitaly';
        $user->age = 24;

        return $user;
    }
}
