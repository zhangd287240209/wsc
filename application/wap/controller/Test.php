<?php


namespace app\wap\controller;


class Test extends  WapBasic
{
    public function index()
    {
        return $this->fetch();
    }
}