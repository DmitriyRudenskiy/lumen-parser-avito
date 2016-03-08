<?php
namespace App\Component\Download;

/**
 * Интерфейс загрузки ресурсов
 */
interface ResourceInterface
{
    /**
     * @return string
     */
    public function getUrl();
}