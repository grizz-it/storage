<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace GrizzIt\Storage\Common;

use ArrayAccess;
use Traversable;

interface StorageInterface extends ArrayAccess, Traversable
{
    /**
     * Gets data from a specific key within the storage.
     *
     * @param string|int $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * Sets data on a specific key within the storage.
     *
     * @param string|int $key
     * @param mixed  $data
     *
     * @return void
     */
    public function set($key, $data): void;

    /**
     * Removes data from a key within a storage.
     *
     * @param string|int $key
     *
     * @return void
     */
    public function unset($key): void;

    /**
     * Checks whether the storage has data on this key.
     *
     * @param string|int $key
     *
     * @return bool
     */
    public function has($key): bool;

    /**
     * Retrieves an array of keys from the storage.
     *
     * @return string[]|int[]
     */
    public function keys(): array;
}
