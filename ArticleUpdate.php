<?php
/**
 * Created by PhpStorm.
 * User: Xepcoh
 * Date: 24.09.2017
 * Time: 21:14
 */

require_once ('DbMySql.php');
class ArticleUpdate
{
    private $mySql;
    private $pid;
    private $lang = 'en';
    private const langList = ['ru', 'en'];
    private const stateList = [0, 1, 2, 3];

    public function __construct(int $pid, string $lang)
    {
        if (in_array($lang, self::langList)) {
            $this->lang = $lang;
        }
        $this->pid = $pid;
        $this->mySql = new DbMySql();
    }

    public function updateState(int $state) {
        if(!in_array($state, self::stateList)) {
            return;
        }
echo $state;
        $sql = 'UPDATE articles_data SET status='.$state.' WHERE pid =\''.$this->pid.'\' AND lang =\''.$this->lang.'\'';
        $this->mySql->query($sql);
    }

}