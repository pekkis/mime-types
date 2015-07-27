<?php

/**
 * This file is part of the pekkis-mime-types package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\MimeTypes\Resolver;

use finfo;

class FinfoResolver implements Resolver
{
    /**
     * @param string $path
     * @return string
     */
    public function resolveMimeType($path)
    {
        $fileinfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileinfo->file($path);

        return $mimeType;
    }
}
