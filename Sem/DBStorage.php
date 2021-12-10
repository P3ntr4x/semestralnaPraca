<?php

class DBStorage implements IStorage
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', 'dtb456', 'db1');
        $this->checkDBErrors();
    }

    public function getAllData()
    {
        $result = [];
        $sql = "SELECT * from blog";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0)
        {
            while ($record = $dbResult->fetch_assoc())
            {
                $result[] = new Blog($record['nazov'], $record['text'], $record['datum']);
            }
        }
        return $result;
    }

    public function store(Blog $blog)
    {
        $stmt = $this->db->prepare("INSERT INTO blog(nazov, text, datum) VALUES (?, ?, ?)");
        $nazov = $blog->getNazov();
        $text = $blog->getText();
        $datum = $blog->getDatum('db');
        $stmt->bind_param('sss', $nazov, $text, $datum);
        $stmt->execute();
        $this->checkDBErrors();
    }

    public function delete($CisloZmazaneho)
    {
        $sql = "DELETE FROM blog WHERE id=$CisloZmazaneho";
        $this->checkDBErrors();
    }

    public function update(Blog $blog)
    {

    }

    private function checkDBErrors()
    {
        if ($this->db->error) {
            die("DB error" . $this->db->error);
        }
    }
}