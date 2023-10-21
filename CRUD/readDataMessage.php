<?php
    error_reporting(0);
    session_start();
    require_once '../config/database_connect.php'; //Подключение к БД
    $sql = "SELECT `fio`, `phone`, `message` FROM `feedback`;";
    $res_mas = mysqli_query($connect, $sql);
    $res_mas = mysqli_fetch_all($res_mas);
?>
<thead>
    <tr>
        <th>ФИО</th>
        <th style="width: 170px;">Номер телефона</th>
        <th>Сообщение</th>
    </tr>
</thead>
<tbody>
<?php if (!empty($res_mas)) : ?>
    <?php foreach($res_mas as $mas): ?>
    <tr>
        <td> <?= $mas[0] ?> </td>
        <td> <?= $mas[1] ?> </td>
        <td> <?= $mas[2] ?> </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr><td colspan="3">Нет данных</td></tr>     
<?php endif; ?>
</tbody>