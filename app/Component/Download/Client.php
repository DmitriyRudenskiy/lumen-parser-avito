<?php
namespace App\Component\Download;


class Client
{
    const DELAY = 0;

    const GOOD_HTTP_CODE = 200;

    /**
     * Последний полученный HTTP код
     * @var int
     */
    private $code;

    /**
     * Общее количество байт при загрузке
     * @var int
     */
    private $size;

    /**
     * Последний использованный URL
     * @var string
     */
    private $url;

    /**
     * @var
     */
    private $error;

    public function setUrl($url)
    {
        if(!$url || !is_string($url) || ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)){
            // TODO: добавить логирование
            return null;
        }
    }

    public function get($url)
    {
        if (self::DELAY > 0) {
            sleep(self::DELAY);
        }

        // Создаем дескриптор cURL
        $ch = curl_init();

        // set some cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        // Запускаем
        $result = curl_exec($ch);

        // Разбор запроса
        $this->code = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->size = (int)curl_getinfo($ch, CURLINFO_SIZE_DOWNLOAD);
        $this->url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        $this->error =(curl_errno($ch) !== 0) ? curl_error($ch) : null;

        // Close handle
        curl_close($ch);

        return $result;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    public function isValid()
    {
        if ($this->getCode() == self::GOOD_HTTP_CODE
            && $this->getSize() > 0
            && $this->getError() === null) {
            return true;
        }

        return false;
    }

    public function __toString()
    {
        return sprintf(
            "Code:%d\nLoad: %d\nUrl: %s\nError: %s",
            $this->getCode(),
            $this->getSize(),
            $this->getUrl(),
            $this->getError()
        );
    }
}