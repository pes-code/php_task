<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIGHTWEIGHT</title>
</head>

<body>
    <form action="fightWeight_data.php" method="post">
        <p>
            <label>身長</label>
            <input type="text" name="height">m
        </p>
        <p>
            <label>体重</label>
            <input type="text" name="weight">kg
        </p>

        <p class="button">
            <input type="submit" value="測定">
        </p>
    </form>
</body>

</html>



<?php
$height = (float)$_POST["height"]; // <input type="text" name="height">の入力値が変数($height)になる。//【キャスト】浮動少数以外の入力を受け付けないようにする。
$weight = (float)$_POST["weight"];


if (!((0 < $height) && ($height < 3))) {
    echo "身長をm(メートル)単位で正しく入力してください";  //もし浮動小数以外が入力された場合は「身長をm（メートル）で入力してください」と表示する
    exit;
}
if (!((0 < $weight) && ($weight < 300))) {
    echo "体重をkg(キログラム)単位で正しく入力してください";
    exit;
}

$bestWeight = $height ** 2 * 20; //日本肥満学会ではBMI22で計算されているが、あえて20とする。
$gapWeight = $weight - $bestWeight;

echo "適正体重" . $bestWeight . "kg";

if ($bestWeight <= 47.6) {
    echo "階級:ミニマム級";
} elseif ((47.6 < $bestWeight) && ($bestWeight <= 52.2)) {
    echo "階級:フライ級";
} elseif ((52.2 < $bestWeight) && ($bestWeight <= 56.7)) {
    echo "階級:バンタム級";
} elseif ((56.7 < $bestWeight) && ($bestWeight <= 61.2)) {
    echo "階級:フェザー級";
} elseif ((61.2 < $bestWeight) && ($bestWeight <= 65.8)) {
    echo "階級:ライト級";
} elseif ((65.8 < $bestWeight) && ($bestWeight <= 70.3)) {
    echo "階級:ウェルター級";
} elseif ((70.3 < $bestWeight) && ($bestWeight <= 77.1)) {
    echo "階級:ミドル級";
} elseif ((77.1 < $bestWeight) && ($bestWeight <= 83.9)) {
    echo "階級:ライトヘビー級";
} elseif ((83.9 < $bestWeight) && ($bestWeight <= 93.0)) {
    echo "階級:クルーザー級";
} elseif ((93.0 < $bestWeight) && ($bestWeight <= 120.2)) {
    echo "階級:ヘビー級";
} elseif (120.2 < $bestWeight) {
    echo "階級:スーパーヘビー級";
}

echo "あと" . $gapWeight . "kg";
?>