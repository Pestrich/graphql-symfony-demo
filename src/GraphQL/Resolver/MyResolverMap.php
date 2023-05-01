<?php

declare(strict_types=1);

namespace App\GraphQL\Resolver;

use App\Repository\Characters;
use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use Overblog\GraphQLBundle\Resolver\ResolverMap;

final class MyResolverMap extends ResolverMap
{
    protected function map(): array
    {
        return [
            'Query' => [
                // Почему-то запрос не попадает в функцию, если определять Query через атрибуты (через yaml/graphql
                // типы попадает)
                self::RESOLVE_FIELD => static function (
                    mixed $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info,
                ): ?array {
                    return match ($info->fieldName) {
                        'characters' => Characters::getCharacters(),
                        'humans' => Characters::getHumans($info),
                        'direwolves' => Characters::getDirewolves(),
                        // 'author' => $this->queryService->findAuthor((int)$args['id']),
                        // 'authors' => $this->queryService->getAllAuthors(),
                        // 'findBooksByAuthor' => $this->queryService->findBooksByAuthor($args['name']),
                        // 'books' => $this->queryService->findAllBooks(),
                        // 'findBooksByGenre' => $this->queryService->findBooksByGenre($args['genre']),
                        // 'book' => $this->queryService->findBookById((int)$args['id']),
                        default => null,
                    };
                },
                // 'humans' => [Characters::class, 'getHumans'],
                'characters' => static function (
                    mixed $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ): array {
                    return Characters::getCharacters(); // Здесь может быть стандартное обращение к сервису
                },
                'humans' => static function (
                    mixed $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ): array {
                    return Characters::getHumans($info); // Здесь может быть стандартное обращение к сервису
                },
                'direwolves' => static function (
                    mixed $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ): array {
                    return Characters::getDirewolves(); // Здесь может быть стандартное обращение к сервису
                },
            ],
            'Mutation' => [
                self::RESOLVE_FIELD => function (
                    mixed $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ) {
                    return match ($info->fieldName) {
                        // 'createAuthor' => $this->mutationService->createAuthor($args['author']),
                        // 'updateBook' => $this->mutationService->updateBook((int)$args['id'], $args['book']),
                        default => null
                    };
                },
            ],
        ];
    }
}
