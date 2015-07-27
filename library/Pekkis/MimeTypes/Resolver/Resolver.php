<?php

/**
 * This file is part of the pekkis-mime-types package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\MimeTypes\Resolver;

/**
 * Mime type resolver
 */
interface Resolver
{
    public function resolveMimeType($path);
}
