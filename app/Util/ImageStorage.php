<?php
namespace App\Util;


class ImageStorage
{
    /**
     * @param $fileName
     * @return string
     */
    protected static function getSubDir($fileName)
    {
        return substr($fileName, 0, 2) . DIRECTORY_SEPARATOR. substr($fileName, 2, 2);
    }

    /**
     * Проверяем создание директории
     *
     * @param string $dir
     * @return bool
     */
    protected static function checkDir($dir)
    {
        if (!realpath($dir)) {
            mkdir($dir, 0777, true);
            return true;
        }

        if (is_writable($dir)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $root
     * @param string $fileName
     * @return string
     */
    public static function getAbsolutePath($root, $fileName)
    {
        $dir = $root . DIRECTORY_SEPARATOR . self::getSubDir($fileName);

        self::checkDir($dir);

        return $dir . DIRECTORY_SEPARATOR . $fileName;
    }

    /**
     * @param string $fileName
     * @return string
     */
    public static function getWebPath($fileName)
    {
        return self::getSubDir($fileName) . DIRECTORY_SEPARATOR . $fileName;
    }
}