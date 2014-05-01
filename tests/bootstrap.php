<?php // @codingStandardsIgnoreStart
ini_set('display_errors', 1);
error_reporting(E_ALL);

// autoload
include __DIR__ . '/../vendor/autoload.php';
/**
 * <?php
namespace EasyZipper\Zipper;

class Directory
{
private $dirToBeZippedIterator;

private $zipFilename;

public function __construct($dirToBeZipped, $zipFilename = null)
{
$this->dirToBeZippedIterator = new \RecursiveDirectoryIterator($dirToBeZipped, \FilesystemIterator::SKIP_DOTS);
if (!$zipFilename) {
$zipFilename = $dirToBeZipped . '/' . basename($dirToBeZipped) . '.zip';
}
$this->zipFilename = $zipFilename;
}

public function zip()
{
$zip = new \ZipArchive();
$zip->open($this->zipFilename, \ZipArchive::CREATE);
$recursiveIterator = new \RecursiveIteratorIterator($this->dirToBeZippedIterator);
while ($recursiveIterator->valid()) {
$file = $recursiveIterator->current();
$zip->addFile(
    $file->getPathname(),
    str_replace($this->dirToBeZippedIterator->getPath(), '', $file->getPathname())
);
$recursiveIterator->next();
}
$recursiveIterator->rewind();
$zip->close();
return $this;
}

public function getZipFilename()
{
    return $this->zipFilename;
}
}

*/