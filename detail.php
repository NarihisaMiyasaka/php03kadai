<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php'); 
$pdo = db_comn();

//2.対象のIDを取得
$id =$_GET["id"];
// select.phpでurlにくっつけたidを拾う
// echo $id;

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt ->bindValue(':id',$id,PDO::PARAM_INT);

//実行結果
$status = $stmt->execute();

// var_dump($status);

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result =$stmt->fetch();

    // var_dump($result); //$resultは配列
}


?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ編集</title>
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
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
            <legend>USER管理</legend>
                <label>name：<input type="text" name="name" value="<?= $result['name']?>"></label><br>
                <label>lid：<input type="text" name="lid" value="<?= $result['lid']?>"></label><br>
                <label>lpw：<input type="text" name="lpw" value="<?= $result['lpw']?>"></label><br>
                <label>kanri_flg：<input type="text" name="kanri_flg" value="<?= $result['kanri_flg']?>"></label><br>
                <label>life_flg：<input type="text" name="life_flg" value="<?= $result['life_flg']?>"></label><br>
                <!-- ユーザーに見えないかたちでidを表示してnameにidを入れて引き継ぐ -->
                <input type="hidden" name="id" value="<?= $result['id']?>">               
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>