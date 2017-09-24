<?php
/**
 * Created by PhpStorm.
 * User: Xepcoh
 * Date: 24.09.2017
 * Time: 20:46
 */

require_once ('DbMySql.php');

class ArticleList
{
    private $lang = 'en';
    private $mySql;
    private const langList = ['ru', 'en'];

    public function __construct()
    {
        $this->mySql = new DbMySql();
    }

    public function setLang(string $lang) {
        if (in_array($lang, self::langList)) {
            $this->lang = $lang;
        }
    }

    public function getList() :array {
        $result = [];
        $i = 0;
        $sql = 'SELECT * FROM (SELECT
  a.pid,
  a.status,
  a.lang,
  a.content->>"$.title.title" AS title,
  a.content->>"$.title.title_image" AS img,
  a.content->>"$.url" as url,
  d.name author
FROM articles_data a
INNER JOIN articles b
ON b.id = a.pid
  INNER JOIN authors d
  ON b.author_id = d.id
WHERE a.lang = \''.$this->lang.'\'
ORDER BY b.date_added DESC
LIMIT 5) c ORDER BY status';

        if($mysqlResult = $this->mySql->query($sql)) {
            while ($row = $mysqlResult->fetch_assoc()) {
                $result[++$i] = $row;
            }
        }
        return $result;
    }

}