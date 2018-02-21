<?php

namespace Reliv\ValidationRatMessages\Api;

use Reliv\ArrayProperties\Property;
use Reliv\ValidationRat\Model\ValidationResult;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class GetMessageParamsFromOptions implements GetMessageParams
{
    /**
     * @param ValidationResult $validationResult
     * @param array            $options
     *
     * @return array
     */
    public function __invoke(
        ValidationResult $validationResult,
        array $options = []
    ): array {
        $messageParams = Property::getArray(
            $options,
            self::OPTION_MESSAGE_PARAMS,
            []
        );

        $messageParams = array_merge(
            $messageParams,
            Property::getArray(
                $validationResult->getDetails(),
                self::OPTION_MESSAGE_PARAMS,
                []
            )
        );

        return $messageParams;
    }
}
