<?php

namespace Reliv\ValidationRatMessages\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class GetMessagesValidationResultFieldsNestedFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return GetMessagesValidationResultFieldsNested
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        return new GetMessagesValidationResultFieldsNested(
            $serviceContainer->get(GetMessagesValidationResult::class)
        );
    }
}
