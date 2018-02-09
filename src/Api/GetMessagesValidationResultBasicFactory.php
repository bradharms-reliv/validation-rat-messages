<?php

namespace Reliv\ValidationRatMessages\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class GetMessagesValidationResultBasicFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return GetMessagesValidationResultBasic
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        $config = $serviceContainer->get('config');

        return new GetMessagesValidationResultBasic(
            $config['validation-rat-messages'],
            GetMessagesValidationResultBasic::DEFAULT_MESSAGE
        );
    }
}
