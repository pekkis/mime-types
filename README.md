# pekkis/mime-types

A library for handling mime types

## Use cases

- Resolve a file's mime type (via different strategies if necessary)
- Resolve a file extension's mime type
- Resolve a mime type's file extension(s) and override if needed.


## Quickstart

```php
<?php

use Pekkis\MimeTypes\MimeTypes;

$mt = new MimeTypes();

// Resolve mime type
$mimeType = $mt->resolveMimeType($pathToFile);

// Extension to mime type
$mimeType = $mt->extensionToMimeType($extension);

// Mime type to extension
$extension = $mt->mimeTypeToExtension('image/jpeg');

// Don't like .jpeg extension? override it.
$mt->override('jpeg', 'jpg');

```
