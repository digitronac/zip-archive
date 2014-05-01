<?php
namespace P11\ZipArchiveTest;

class ZipArchiveTest extends \PHPUnit_Framework_TestCase
{
    public function testMethodAddDirectoryShouldAddFilesAndFoldersRecursivelyToZipArchiveObject()
    {
        $zipFile = '/home/brunox/tralala.zip';
        $zipArchive = new \P11\ZipArchive\ZipArchive();
        $zipArchive->open($zipFile, \ZipArchive::CREATE);
        $zipArchive->addDirectory(__DIR__ . '/_fixtures/root');
        $zipArchive->close();
        $this->assertTrue(file_exists($zipFile));
        $zipArchive = new \P11\ZipArchive\ZipArchive();
        $zipArchive->open($zipFile);
        // all files from fixture here? 4 files and 1 empty folder
        $this->assertEquals(5, $zipArchive->numFiles);
        $zipArchive->close();
        // cleanup ... unfortunately vfsStream doesn't work with ZipArchive.
        unlink($zipFile);
    }
}