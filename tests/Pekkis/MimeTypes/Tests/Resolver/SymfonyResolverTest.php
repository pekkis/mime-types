<?php

namespace Pekkis\MimeTypes\Tests\Resolver;

use Pekkis\MimeTypes\Resolver\SymfonyResolver;

class SymfonyResolverTest extends TestCase
{
    public function setUp()
    {
        if (!class_exists('Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser')) {
            $this->markTestSkipped('Symfony MimeTypeGuesser not loadable');
        }

        parent::setUp();
        $this->resolver = new SymfonyResolver();
    }

}
