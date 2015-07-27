<?php

namespace Pekkis\MimeTypes\Tests;

use Pekkis\MimeTypes\MimeTypes;
use Pekkis\MimeTypes\Resolver\Resolver;

class MimeTypesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function invalidMimeTypeShouldNotResolveToExtension()
    {
        $mimeType = new MimeTypes();
        $this->assertCount(0, $mimeType->mimeTypeToExtensions('gran/lusso'));
    }

    public function provideMimeTypesAndExtensions()
    {
        return array(
            array('image/jpeg', 'jpg'),
            array('image/png', 'png'),
            array('video/x-msvideo', 'avi'),
            array('application/vnd.oasis.opendocument.text', 'odt')
        );
    }

    /**
     * @dataProvider provideMimeTypesAndExtensions
     * @test
     */
    public function mimeTypesShouldResolveToExtensions($mimeType, $expectedExtension)
    {
        $mimeTypes = new MimeTypes();
        $extensions = $mimeTypes->mimeTypeToExtensions($mimeType);
        $this->assertGreaterThanOrEqual(1, count($extensions));
        $this->assertContains($expectedExtension, $extensions);
    }

    /**
     * @dataProvider provideMimeTypesAndExtensions
     * @test
     */
    public function extensionShouldResolveToMimeType($expectedMimeType, $extension)
    {
        $mimeType = new MimeTypes();
        $mimetype = $mimeType->extensionToMimeType($extension);
        $this->assertEquals($expectedMimeType, $mimetype);
    }

    /**
     * @test
     */
    public function extensionsCanBeOverridden()
    {
        $mimeType = new MimeTypes();
        $this->assertEquals('jpg', $mimeType->mimeTypeToExtension('image/jpeg'));
        $this->assertEquals('png', $mimeType->mimeTypeToExtension('image/png'));

        $this->assertEquals(
            'tussi',
            $mimeType->removeOverride('jpg')->override('png', 'tussi')->mimeTypeToExtension('image/png')
        );
    }

    /**
     * @test
     */
    public function resolverCanBeSet()
    {
        $resolver = $this->prophesize(Resolver::class)->reveal();
        $mt = new MimeTypes($resolver);
        $this->assertAttributeSame($resolver, 'resolver', $mt);
    }
}
