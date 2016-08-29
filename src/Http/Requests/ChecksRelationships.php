<?php

/**
 * Copyright 2016 Cloud Creativity Limited
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

namespace CloudCreativity\LaravelJsonApi\Http\Requests;

use CloudCreativity\JsonApi\Contracts\Http\Requests\RequestInterface;
use CloudCreativity\JsonApi\Contracts\Http\RequestInterpreterInterface;
use Neomerx\JsonApi\Exceptions\JsonApiException;

/**
 * Class ChecksRelationships
 * @package CloudCreativity\JsonApi
 */
trait ChecksRelationships
{

    /**
     * Get the allowed has-one relationships
     *
     * @return string[]
     */
    abstract protected function allowedRelationships();

    /**
     * @param RequestInterface $request
     * @throws JsonApiException
     */
    protected function checkRelationshipName(RequestInterface $request)
    {
        $name = $request->getRelationshipName();

        if (!in_array($name, $this->allowedRelationships(), true)) {
            throw new JsonApiException([], 404);
        }
    }
}
