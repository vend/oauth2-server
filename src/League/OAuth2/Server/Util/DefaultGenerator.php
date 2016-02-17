<?php
/**
 * OAuth 2.0 Secure key generator
 *
 * @package     php-loep/oauth2-server
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) 2013 PHP League of Extraordinary Packages
 * @license     http://mit-license.org/
 * @link        http://github.com/php-loep/oauth2-server
 */

namespace League\OAuth2\Server\Util;

class DefaultGenerator implements TokenGeneratorInterface
{
    /**
     * Generate a new unique token
     * 
     * @param  int    $len Length of the generated token
     * @return string
     */
    public function generate($len = 40)
    {
        // We generate twice as many bytes here because we want to ensure we have
        // enough after we base64 encode it to get the length we need because we
        // take out the "/", "+", and "=" characters.
        $bytes = openssl_random_pseudo_bytes($len * 2, $strong);

        // We want to stop execution if the key fails because, well, that is bad.
        if ($bytes === false || $strong === false) {
            // @codeCoverageIgnoreStart
            throw new \Exception('Error Generating Key');
            // @codeCoverageIgnoreEnd
        }

        return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $len);
    }
}
