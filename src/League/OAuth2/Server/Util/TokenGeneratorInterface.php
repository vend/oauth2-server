<?php

namespace League\OAuth2\Server\Util;

interface TokenGeneratorInterface
{
    /**
     * Generate a unique access token
     *
     * @param int $len
     * @return string
     */
    public function generate($len = 40);
}
