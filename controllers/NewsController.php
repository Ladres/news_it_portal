<?php

include_once ROOT. '/models/News.php';

class NewsController 
{
	public function actionIndex()
	{
		$newsList = array();
		$newsList = News::getNewsList(); 

		/*echo '<pre>';
		print_r($newsList);
		echo '</pre>';*/

		require_once(ROOT .'/view/news/index.php');

		return true;
	}

	public function actionView($id)
	{
		if ($id) 
		{
			$newsItem = News::getNewsItemByID($id);

			echo '<pre>';
			print_r($newsItem);
			echo '</pre>';
		}

		return true;
	}
}

?>