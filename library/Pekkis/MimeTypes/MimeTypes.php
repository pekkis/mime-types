<?php

/**
 * This file is part of the pekkis-mime-types package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\MimeTypes;

use Dflydev\ApacheMimeTypes\PhpRepository;
use Pekkis\MimeTypes\Resolver\FinfoResolver;
use Pekkis\MimeTypes\Resolver\Resolver;

class MimeTypes
{
    /**
     * @var PhpRepository
     */
    private $repository;

    /**
     * @var array
     */
    private $extensionOverrides = [];

    public function __construct(Resolver $resolver = null)
    {
        if (!$resolver) {
            $resolver = new FinfoResolver();
        }

        $this->resolver = $resolver;
        $this->override('jpeg', 'jpg');
    }

    /**
     * Resolves file's mime type
     *
     * @param string $path
     *
     * @return string
     */
    public function resolveMimeType($path)
    {
        return $this->resolver->resolveMimeType($path);
    }

    /**
     * @return PhpRepository
     */
    private function getRepository()
    {
        if (!$this->repository) {
            $this->repository = new PhpRepository();
        }
        return $this->repository;
    }

    /**
     * @param string $mimeType
     * @return array
     */
    public function mimeTypeToExtensions($mimeType)
    {
        return $this->getRepository()->findExtensions($mimeType);
    }

    /**
     * @param string $mimeType
     * @return string
     */
    public function mimeTypeToExtension($mimeType)
    {
        $extensions = $this->mimeTypeToExtensions($mimeType);
        $extension = array_shift($extensions);


        return (isset($this->extensionOverrides[$extension])) ? $this->extensionOverrides[$extension] : $extension;
    }

    /**
     * @param string $extension
     * @return null|string
     */
    public function extensionToMimeType($extension)
    {
        return $this->getRepository()->findType($extension);
    }

    /**
     * @param string $extension
     * @param string $override
     * @return MimeTypes
     */
    public function override($extension, $override)
    {
        $this->extensionOverrides[$extension] = $override;

        return $this;
    }

    /**
     * @param string $extension
     * @return MimeTypes
     */
    public function removeOverride($extension)
    {
        unset ($this->extensionOverrides[$extension]);

        return $this;
    }
}
