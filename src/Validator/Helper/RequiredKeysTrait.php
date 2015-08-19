<?php

/**
 * Copyright 2015 Cloud Creativity Limited
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace CloudCreativity\JsonApi\Validator\Helper;

/**
 * Class RequiredKeysTrait
 * @package CloudCreativity\JsonApi
 */
trait RequiredKeysTrait
{

    /**
     * @var array|null
     */
    protected $_requiredKeys;

    /**
     * @param $keyOrKeys
     * @return $this
     */
    public function setRequiredKeys($keyOrKeys)
    {
        $this->_requiredKeys = is_array($keyOrKeys) ? $keyOrKeys : [$keyOrKeys];

        return $this;
    }

    /**
     * @param $keyOrKeys
     * @return $this
     */
    public function addRequiredKeys($keyOrKeys)
    {
        $keys = is_array($keyOrKeys) ? $keyOrKeys : [$keyOrKeys];

        if (!is_array($this->_requiredKeys)) {
            $this->_requiredKeys = [];
        }

        $this->_requiredKeys = array_merge($this->_requiredKeys, $keys);

        return $this;
    }

    /**
     * @return array
     */
    public function getRequiredKeys()
    {
        return (array) $this->_requiredKeys;
    }

    /**
     * @return bool
     */
    public function hasRequiredKeys()
    {
        return !empty($this->_requiredKeys);
    }

    /**
     * @param $key
     * @return bool
     */
    public function isRequiredKey($key)
    {
        return in_array($key, $this->_requiredKeys, true);
    }

    /**
     * @return $this
     */
    public function clearRequiredKeys()
    {
        $this->_requiredKeys = null;

        return $this;
    }
}