<?php
/**
 * Created by PhpStorm.
 * User: Xepcoh
 */

class DbMySql
{
    private $mysql;

    /**
     * DbMySql constructor.
     */
    public function __construct()
    {
        $this->mysql = new mysqli('localhost', 'root', '123456.l', 'hittest');
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->mysql, $name), $arguments);
    }

}