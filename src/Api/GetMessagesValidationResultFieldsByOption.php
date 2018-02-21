<?php

namespace Reliv\ValidationRatMessages\Api;

use Psr\Container\ContainerInterface;
use Reliv\ArrayProperties\Property;
use Reliv\ValidationRat\Model\ValidationResultFields;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class GetMessagesValidationResultFieldsByOption implements GetMessagesValidationResultFields
{
    const OPTION_FORMAT = 'validation-rat-messages-format';

    protected $formatConfig;
    protected $serviceContainer;
    protected $defaultFormat;

    /**
     * @param array              $formatConfig
     * @param ContainerInterface $serviceContainer
     * @param string             $defaultFormat
     */
    public function __construct(
        array $formatConfig,
        ContainerInterface $serviceContainer,
        string $defaultFormat
    ) {
        $this->formatConfig = $formatConfig;
        $this->serviceContainer = $serviceContainer;
        $this->defaultFormat = $defaultFormat;
    }

    /**
     * @param ValidationResultFields $validationResultFields
     * @param array                  $options
     *
     * @return array
     * @throws \Exception
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ValidationResultFields $validationResultFields,
        array $options = []
    ): array {
        $formatName = Property::getString(
            $options,
            self::OPTION_FORMAT,
            $this->defaultFormat
        );

        $formatServiceName = Property::getString(
            $this->formatConfig,
            $formatName
        );

        if (empty($formatServiceName)) {
            throw  new \Exception(
                'Format: (' . $formatName . ') is not defined in config'
            );
        }

        $formatService = $this->serviceContainer->get($formatServiceName);

        if (!$formatService instanceof GetMessagesValidationResultFields) {
            throw  new \Exception(
                'Format: (' . $formatName . ') with service: (' . $formatServiceName . ')'
                . ' must be instance of: ' . GetMessagesValidationResultFields::class
            );
        }

        return $formatService->__invoke(
            $validationResultFields,
            $options
        );
    }
}
