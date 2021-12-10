<?php

interface IStorage
{
    public function getAllData();
    public function store(Blog $blog);
    public function delete($CisloZmazaneho);
    public function update(Blog $blog);
}