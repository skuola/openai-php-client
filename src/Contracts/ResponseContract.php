<?php

declare(strict_types=1);

namespace OpenAI\Contracts;

use ArrayAccess;

/**
 * @template TArray of array
 *
 * @extends ArrayAccess<key-of<TArray>, value-of<TArray>>
 *
 * @internal
 */
interface ResponseContract extends ArrayAccess
{
    /**
     * Returns the array representation of the Response.
     *
     * @return TArray
     */
    public function toArray(): array;

    /**
     * @param mixed $offset
     */
    public function offsetExists($offset): bool;

    /**
     * @template TOffsetKey of key-of<TArray>
     *
     * @param mixed $offset
     * @return TArray[TOffsetKey]
     */
    public function offsetGet($offset);

    /**
     * @template TOffsetKey of key-of<TArray>
     *
     * @param mixed $offset
     * @param mixed $value
     * @return never
     */
    public function offsetSet($offset, $value);

    /**
     * @template TOffsetKey of key-of<TArray>
     *
     * @param mixed $offset
     * @return never
     */
    public function offsetUnset($offset);
}
