<?php

namespace Reliv\ValidationRatMessages\Api;

use Reliv\ValidationRat\Model\ValidationResult;
use Reliv\ValidationRatMessages\Model\Result;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class GetMessagesValidationResultBasic implements GetMessagesValidationResult
{
    protected $findCodeMessage;
    protected $parseMessageParams;
    protected $getMessageParams;

    /**
     * @param FindCodeMessage    $findCodeMessage
     * @param ParseMessageParams $parseMessageParams
     * @param GetMessageParams   $getMessageParams
     */
    public function __construct(
        FindCodeMessage $findCodeMessage,
        ParseMessageParams $parseMessageParams,
        GetMessageParams $getMessageParams
    ) {
        $this->findCodeMessage = $findCodeMessage;
        $this->parseMessageParams = $parseMessageParams;
        $this->getMessageParams = $getMessageParams;
    }

    /**
     * @param ValidationResult $validationResult
     * @param array            $options
     *
     * @return array ['{code}' => '{message}']
     */
    public function __invoke(
        ValidationResult $validationResult,
        array $options = []
    ): array {
        $code = $validationResult->getCode();

        // We don not care about validity, only if there is a code
        if (empty($code)) {
            return [
                Result::KEY_CODE => null,
                Result::KEY_MESSAGE => null,
            ];
        }

        $message = $this->findCodeMessage->__invoke($code, $options);

        $message = $this->parseMessageParams->__invoke(
            $message,
            $this->getMessageParams->__invoke(
                $validationResult,
                $options
            )
        );

        return [
            Result::KEY_CODE => $code,
            Result::KEY_MESSAGE => $message,
        ];
    }
}
