<?php

namespace RadicalLoop\Eod\Traits;

trait Actionable
{
    /**
     * A symbol or code
     *
     * @var string
     */
    protected $symbol;
    /**
     * extra query params
     *
     * @var array
     */
    protected $params;

    /**
     * setter for symbol and query params
     *
     * @param string $symbol
     * @param array $params
     * @return void
     */
    public function setParams($symbol, $params)
    {
        $this->symbol = $symbol;
        $this->params = $params;
    }

    /**
     * make call to api
     *
     * @param string $dataType
     * @return string
     */
    public function getData($dataType = self::DATA_TYPE_JSON)
    {
        $params = array_merge($this->params, ['fmt' => $dataType]);
        return $this->get($this->symbol, $params);
    }

    /**
     * return json data
     *
     * @return string
     */
    public function json()
    {
        return $this->getData(self::DATA_TYPE_JSON);
    }

    /**
     * download file
     *
     * @param string $fileName
     * @return string
     */
    public function download($fileName = 'file.csv')
    {
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        return $this->getData(self::DATA_TYPE_CSV);
    }

    /**
     * save file locally
     *
     * @param string $fileName
     * @param boolean $overwrite
     * @return void
     */
    public function save($fileName, $overwrite = false)
    {
        if (file_exists($fileName) && !$overwrite) {
            throw new \ErrorException('File already exist', 400);
        } elseif (!file_exists(dirname($fileName))) {
            mkdir(dirname($fileName), 0755, true);
        }
        $this->saveToDisk($fileName);
    }

    /**
     * save file to disk
     *
     * @param string $fileName
     * @return void
     */
    protected function saveToDisk($fileName)
    {
        $content = $this->getData(self::DATA_TYPE_CSV);
        file_put_contents($fileName, $content);
    }
}
