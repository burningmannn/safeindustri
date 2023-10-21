<?php
    error_reporting(0);
    
    session_start();
    require_once '../config/database_connect.php'; //Подключение к БД
    $sql = "SELECT id_category, nameCategory FROM category ORDER BY category.nameCategory ASC;";
    $res_mas = mysqli_query($connect, $sql);
    $res_mas = mysqli_fetch_all($res_mas);
?>
<thead>
    <tr>
        <th style="text-align: left;width: 60px;"><a class="status add" onclick="openModal('addModal', 'category')"><i class='bx bx-plus'></i></a></th>
        <th>Категория</th>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']): ?>
        <th>Меню</th>
        <?php endif; ?>
    </tr>
</thead>
<tbody>
<?php if (!empty($res_mas)) : ?>
    <?php foreach($res_mas as $mas): ?>
    <tr>
        <td></td>
        <td> <?= $mas[1] ?> </td>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']): ?>
        <td>
            <div class = "status link">
                <a class="status good" onclick="openModal('editModal', 'category', <?= $mas[0] ?>)"><i class='bx bx-edit' ></i></a>
                <a class="status bad"  onclick="openModal('deleteModal', 'category', <?= $mas[0] ?>)"><i class='bx bx-trash'></i></a> 
            </div>
        </td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr><td colspan="3">Нет данных</td></tr>     
<?php endif; ?>
</tbody>