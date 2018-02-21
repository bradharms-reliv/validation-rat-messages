<?php

namespace Reliv\ValidationRatMessages\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ParseMessageParamsSingleBracketsFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return ParseMessageParamsSingleBrackets
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        return new ParseMessageParamsSingleBrackets();
    }
}
