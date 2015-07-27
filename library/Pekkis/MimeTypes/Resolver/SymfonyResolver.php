<?php

/**
 * This file is part of the pekkis-mime-types package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\MimeTypes\Resolver;

use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;

class SymfonyResolver implements Resolver
{
    /**
     * @var MimeTypeGuesser
     */
    private $mimeTypeGuesser;

    /**
     * @return MimeTypeGuesser
     */
    private function getMimeTypeGuesser()
    {
        if (!$this->mimeTypeGuesser) {
            $this->mimeTypeGuesser = MimeTypeGuesser::getInstance();
        }

        return $this->mimeTypeGuesser;
    }

    /**
     * @param string $path
     * @return string
     */
    public function resolveMimeType($path)
    {
        $mimeType = $this->getMimeTypeGuesser()->guess($path);

        return $mimeType;
    }
}
