
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Главная страница</title>

    <!-- Bootstrap core CSS -->
    <link href="/view/news/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/view/news/css/blog-home.css" rel="stylesheet">

  </head>

  <body>
<!-- Add Form -->
<form class="form-horizontal" method="post" action="add-news.php">
    <fieldset>

        <!-- Form Name -->
        <legend class="col-md-4 control-label">Добавить новую новость</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Название новости</label>
            <div class="col-md-6">
                <input id="textinput" name="title" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Краткое описание </label>
            <div class="col-md-6">
                <input id="textinput" name="short_content" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="comment">Основной контент</label>
            <div class="col-md-6" ">
                <textarea id="textinput" name="content" type="text" placeholder="" class="form-control input-md" required=""></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Имя автора</label>
            <div class="col-md-6">
                <input id="textinput" name="author" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">URL на картинку</label>
            <div class="col-md-6">
                <input id="textinput" name="preview" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

         <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Категория(необязательно)</label>
            <div class="col-md-6">
                <input id="textinput" name="type" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submitButton"></label>
            <div class="col-md-8">
                <button id="submitButton" name="submitButton" class="btn btn-primary onclick="history.go(-1); return false;"">Save</button>
                <button id="cancelButton" name="cancelButton" class="btn btn-danger" onclick="history.go(-1); return false;">Cancel</button>
            </div>
        </div>

    </fieldset>
</form>

<?php
    $host = 'localhost'; 
    $user = 'root'; 
    $password = ''; 
    $db_name = 'mvc_site'; 
        
    $link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
    mysqli_query($link, "SET NAMES 'utf8'");

    if(isset($_POST['submitButton']))
    {
        $title = strip_tags(trim($_POST['title']));
        $short_content = strip_tags(trim($_POST['short_content']));
        $content = strip_tags(trim($_POST['content']));
        $author = strip_tags(trim($_POST['author']));
        $preview = strip_tags(trim($_POST['preview']));
        $type = strip_tags(trim($_POST['type']));
        $date = date('Y-m-d h:m:s');
        $query = "INSERT INTO news (title,date,short_content,content,author_name,preview,type) VALUES ('$title', '$date','$short_content', '$content', '$author', '$preview', '$type')";
        mysqli_query($link, $query);
        echo 'Новость добавлена';
    }   

?>

<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
