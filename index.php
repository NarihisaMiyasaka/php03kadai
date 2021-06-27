<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>0628課題</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>USER管理</legend>
                <label>name：<input type="text" name="name"></label><br>
                <label>lid：<input type="text" name="lid"></label><br>
                <label>lpw：<input type="text" name="lpw"></label><br>
                <label>kanri_flg：<input type="text" name="kanri_flg"></label><br>
                <label>life_flg：<input type="text" name="life_flg"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
