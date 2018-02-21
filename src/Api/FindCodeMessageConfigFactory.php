<?php

namespace Reliv\ValidationRatMessages\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class FindCodeMessageConfigFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return FindCodeMessageConfig
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        $appConfig = $serviceContainer->get('config');

        return new FindCodeMessageConfig(
            $appConfig['validation-rat-messages'],
            FindCodeMessageConfig::DEFAULT_INVALID_MESSAGE
        );
    }
}
