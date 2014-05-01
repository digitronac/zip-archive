P11\ZipArchive\ZipArchive
==============

Extension to PHP's ZipArchive class.
Has additional addDirectory method which is convenient for adding directories.

Example usage:
```php
$zipFile = __DIR__ . '/zipToCreate.zip';
$zipArchive = new \P11\ZipArchive\ZipArchive();
$zipArchive->open($zipFile, \ZipArchive::CREATE);
$dirWhichWeWantToZip = '/home/zip/dir';
$zipArchive->addDirectory($dirWhichWeWantToZip);
$zipArchive->close();
// $zipFile should be created now ...
```

