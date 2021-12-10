<?php

class Blog
{
    private $nazov;
    private $text;
    private $datum;

    public function __construct($nazov, $text, $datum)
    {
        $this->nazov = $nazov;
        $this->text = $text;
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getNazov()
    {
        return $this->nazov;
    }

    /**
     * @param mixed $nazov
     */
    public function setNazov($nazov)
    {
        $this->nazov = $nazov;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }
}