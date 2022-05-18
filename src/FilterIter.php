<?php


class RecursiveNoVCSIterator extends RecursiveFilterIterator
{
    public function accept(): bool
    {
        $vcsFolders = ['.git', '.github', '.svn', '.vscode', '.cache'];

        /**
         * @var SplFileInfo $file File Info
         */
        $file = $this->current();


        if ($file->isDir() && in_array($file->getFilename(), $vcsFolders)) {

            return false;
        };

        return true;
    }
}



$dirs = new RecursiveDirectoryIterator('/var/www/wms', FilesystemIterator::SKIP_DOTS);

$filter = new RecursiveNoVCSIterator($dirs);

$recurseIt = new RecursiveIteratorIterator($filter, RecursiveIteratorIterator::SELF_FIRST);



// foreach ($recurseIt as $path => $info) {
//     /**
//      * @var SplFileInfo $info Info
//      */
//     echo $info->getPathname() . PHP_EOL;
// }


class LargeImageFilter extends FilterIterator

{
    private array $safeImageTypes = ['png'];
    private int $fileSize;

    public function __construct(Iterator $it, $imageTypes, $fileSize = 50000)
    {
        parent::__construct($it);

        if (!empty($imageTypes)) {
            $this->safeImageTypes = $imageTypes;
        }

        $this->fileSize = $fileSize;
    }

    public function accept(): bool
    {
        $file = $this->current();

        if (in_array($file->getExtension(), $this->safeImageTypes) && $file->getSize() > $this->fileSize) {
            return true;
        }
        return false;
    }
}


$dirs = new DirectoryIterator('/var/www/wms/webroot/files/templates');

$filter = new LargeImageFilter($dirs, [
    'png',
    'jpeg'
], 30000);

foreach ($filter as $file) {
    echo $file . ': ' . $file->getSize() . PHP_EOL;
}

echo iterator_count($filter) . PHP_EOL;
