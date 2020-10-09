<?php

namespace Doctrine\DBAL\Query;

use Doctrine\DBAL\DBALException;

use function implode;

/**
 * @psalm-immutable
 */
class QueryException extends DBALException
{
    /**
     * @param string   $alias
     * @param string[] $registeredAliases
     *
     * @return QueryException
     */
    public static function unknownAlias($alias, $registeredAliases)
    {
        return new self("The given alias '" . $alias . "' is not part of " .
            'any FROM or JOIN clause table. The currently registered ' .
            'aliases are: ' . implode(', ', $registeredAliases) . '.');
    }

    /**
     * @param string   $alias
     * @param string[] $registeredAliases
     *
     * @return QueryException
     */
    public static function nonUniqueAlias($alias, $registeredAliases)
    {
        return new self("The given alias '" . $alias . "' is not unique " .
            'in FROM and JOIN clause table. The currently registered ' .
            'aliases are: ' . implode(', ', $registeredAliases) . '.');
    }
}