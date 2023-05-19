<?php

namespace LibreSpeed\Resources;

use LibreSpeed\LibreSpeed;

#[\AllowDynamicProperties]
class Resource
{
    /**
     * The resource attributes.
     *
     * @var array
     */
    public $attributes;

    /**
     * The Forge SDK instance.
     *
     * @var \LibreSpeed\LibreSpeed|null
     */
    protected $httpClient;

    /**
     * Create a new resource instance.
     *
     * @param  array  $attributes
     * @param  \LibreSpeed\LibreSpeed|null  $httpClient
     * @return void
     */
    public function __construct(array $attributes, LibreSpeed $httpClient = null)
    {
        $this->attributes = $attributes;
        $this->httpClient = $httpClient;

        $this->fill();
    }

    /**
     * Fill the resource with the array of attributes.
     *
     * @return void
     */
    protected function fill()
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            $this->{$key} = $value;
        }
    }

    /**
     * Convert the key name to camel case.
     *
     * @param  string  $key
     * @return string
     */
    protected function camelCase($key)
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    /**
     * Transform the items of the collection to the given class.
     *
     * @param  array  $collection
     * @param  string  $class
     * @param  array  $extraData
     * @return array
     */
    protected function transformCollection(array $collection, $class, array $extraData = [])
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this->httpClient);
        }, $collection);
    }

    /**
     * Transform the collection of tags to a string.
     *
     * @param  array  $tags
     * @param  string|null  $separator
     * @return string
     */
    protected function transformTags(array $tags, $separator = null)
    {
        $separator = $separator ?: ', ';

        return implode($separator, array_column($tags ?? [], 'name'));
    }
}
