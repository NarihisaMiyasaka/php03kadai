<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$lid  = $_POST["lid"];
$lpw   = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];
$id = $_POST["id"];

//2. DB接続
require_once('funcs.php'); 
$pdo = db_comn();

//３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw, kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id"  );

// 4. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,PDO::PARAM_INT);


// 5. 実行
$status = $stmt->execute();

//6．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    //以下を関数化
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
  }else{
    //５．index.phpへリダイレクト
    //以下を関数化
    header("Location: select.php");
    exit();
  }