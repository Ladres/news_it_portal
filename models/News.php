<?php


class News
{
	//Возврощает одну новость по id
	public static function getNewsItemByID($id) 
	{
		$id = intval($id);

		if($id)
		{
			$link = Db::getConnection();

			$query = "SELECT * FROM news WHERE id=".$id;
			$result = mysqli_query($link, $query) or die(mysqli_error($link));

			$newsItem=mysqli_fetch_assoc($result);
			return $newsItem;
		}
	}
	// Возвращает список новостей
	public static function getNewsList() 
	{
		//Подключаемся к бд и формируем линк в db.php
		$link = Db::getConnection();
		//Формируем тестовый запрос:
		$query = "SELECT id, title, date, short_content, preview FROM news ORDER BY id DESC";

		//Делаем запрос к БД, результат запроса пишем в $result:
		$result = mysqli_query($link, $query) or die(mysqli_error($link));

		//Выводим бд в нормальном виде:
		$i = 0;
		while($row=mysqli_fetch_assoc($result))
		{
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$newsList[$i]['preview'] = $row['preview'];
			$newsList[$i]['type'] = $row['type'];
			$i++;
		}
		return $newsList;
		
	}
	public static function getNewsItemByType($type)
	{
		$link = Db::getConnection();
		$query = "SELECT * FROM news WHERE type=".$type;

		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		$i = 0;
		while($row=mysqli_fetch_assoc($result))
		{
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$newsList[$i]['preview'] = $row['preview'];
			$newsList[$i]['type'] = $row['type'];
			$i++;
		}
		return $newsList;
	}

}
?>