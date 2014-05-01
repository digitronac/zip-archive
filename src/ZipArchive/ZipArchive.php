<?php
namespace P11\ZipArchive;

/**
 * Class ZipArchive.
 * This class wraps PHP \ZipArchive class and enriches it with addDirectory method.
 *
 * @package P11\ZipArchive
 */
class ZipArchive extends \ZipArchive
{
    /**
     * Adds directory along with its contents to \ZipArchive object.
     *
     * @param string $directoryPathname pathname of directory which will be added.
     *
     * @return $this provides fluent interface
     */
    public function addDirectory($directoryPathname)
    {
        $directoryIterator = new \RecursiveDirectoryIterator($directoryPathname, \FilesystemIterator::SKIP_DOTS);
        $recursiveIterator = new \RecursiveIteratorIterator($directoryIterator);
        while ($recursiveIterator->valid()) {
            /* @var $file \SplFileInfo */
            $file = $recursiveIterator->current();

            // no trailing slash? append one.
            if (!$this->hasTrailingSlash($directoryPathname)) {
                $directoryPathname .= '/';
            }

            if (!is_dir($file->getPathname())) {
                $this->addFile($file->getPathname(), str_replace($directoryPathname, '', $file->getPathname()));
            } else {
                $this->addEmptyDir(str_replace($directoryPathname, '', $file->getPathname()));
            }


            $recursiveIterator->next();
        }
        return $this;
    }

    /**
     * Checks if directory has trailing slash.
     *
     * @param string $directory directory to check
     *
     * @return bool true if has trailing slash
     */
    protected function hasTrailingSlash($directory)
    {
        $split = str_split($directory);
        return (end($split) === "/");
    }
}
