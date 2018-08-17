<?php

namespace Pekkis\MimeTypes\Tests\Resolver;

use Pekkis\MimeTypes\Resolver\Resolver;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Resolver
     */
    protected $resolver;

    public function provideFiles()
    {
        return array(
            array(
                'self-lussing-manatee.jpg', 'image/jpeg',
            ),
            array(
                'refcard.pdf', 'application/pdf',
            ),
            array(
                'dporssi-screenshot.png', 'image/png',
            ),
            array(
                '20th.wav', 'audio/x-wav',
            ),
        );
    }

    /**
     * @test
     * @dataProvider provideFiles
     */
    public function resolverShouldResolveCorrectType($path, $expectedType)
    {
        $path = realpath(__DIR__ . '/../../../../') . '/' . $path;
        $this->assertEquals($expectedType, $this->resolver->resolveMimeType($path));
    }

}
