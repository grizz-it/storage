<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace GrizzIt\Storage\Component;

use GrizzIt\Storage\Common\StorageInterface;
use GrizzIt\Storage\Exception\DataNotFoundException;
use IteratorAggregate;
use ArrayIterator;

class ObjectStorage implements IteratorAggregate, StorageInterface
{
    /**
     * Contains the data of the storage.
     *
     * @var array
     */
    private $data;

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Gets data from a specific key within the storage.
     *
     * @param string|int $key
     *
     * @return mixed
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->data[$key];
        }

        throw new DataNotFoundException($key);
    }

    /**
     * Sets data on a specific key within the storage.
     *
     * @param string|int $key
     * @param mixed  $data
     *
     * @return void
     */
    public function set($key, $data): void
    {
        $this->data[$key] = $data;
    }

    /**
     * Removes data from a key within a storage.
     *
     * @param string|int $key
     *
     * @return void
     */
    public function unset($key): void
    {
        unset($this->data[$key]);
    }

    /**
     * Checks whether the storage has data on this key.
     *
     * @param  string|int $key
     *
     * @return bool
     */
    public function has($key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * Retrieves an array of keys from the storage.
     *
     * @return string[]|int[]
     */
    public function keys(): array
    {
        return array_keys($this->data);
    }

    /**
     * @param string|int $offset
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return $this->has($offset);
    }

    /**
     * @param string|int $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @param string|int $offset
     * @param mixed  $value
     *
     * @return void
     */
    public function offsetSet($offset, $value) : void
    {
        $this->set($offset, $value);
    }

    /**
     * @param string|int $offset
     *
     * @return void
     */
    public function offsetUnset($offset) : void
    {
        $this->unset($offset);
    }

    /**
     * Retrieves the iterator.
     *
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }
}
