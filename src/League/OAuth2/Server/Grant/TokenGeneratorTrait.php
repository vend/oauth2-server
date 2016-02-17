<?php

namespace League\OAuth2\Server\Grant;

use League\OAuth2\Server\Util\DefaultGenerator;
use League\OAuth2\Server\Util\TokenGeneratorInterface;

trait TokenGeneratorTrait
{
    /**
     * @var TokenGeneratorInterface
     */
    private $tokenGenerator;

    /**
     * @param TokenGeneratorInterface $generator
     */
    public function setTokenGenerator(TokenGeneratorInterface $generator)
    {
        $this->tokenGenerator = $generator;
    }

    /**
     * @return TokenGeneratorInterface
     */
    public function getTokenGenerator()
    {
        if (!$this->tokenGenerator) {
            return new DefaultGenerator();
        }

        return $this->tokenGenerator;
    }
}
