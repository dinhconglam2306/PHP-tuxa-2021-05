<?php
class IndexModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable('rss');
	}

	public function listRss()
	{
		$query = "SELECT `link` FROM `rss` WHERE `status` = 'active' ORDER BY `ordering`";
		$url = $this->listRecord($query);
		return $url;
	}
}
