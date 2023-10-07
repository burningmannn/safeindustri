<?php
    error_reporting(0);
    
    error_reporting(0);
    
    session_start();
    require_once '../config/database_connect.php'; //Подключение к БД
    $sql = "SELECT tec.id, dep.nameDepartament, cat.nameCategory, tec.inventory, tec.title, stat.name, tec.status_technic FROM technic tec LEFT JOIN departament dep ON tec.departament = dep.id_departament LEFT JOIN category cat ON tec.category = cat.id_category LEFT JOIN status stat ON tec.status_technic = stat.id;";
    $res_mas = mysqli_query($connect, $sql);
    $res_mas = mysqli_fetch_all($res_mas);
?>
<thead>
    <tr>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']): ?>
        <th><a class="status add" onclick="openModal('addModal', 'adminka')"><i class='bx bx-plus'></i></a></th>
        <?php endif; ?>
        <th class="sortable sort-arrow">Id <i class="sort-arrow fas fa-sort"></i></th>
        <th class="sortable sort-arrow">Отдел <i class="sort-arrow fas fa-sort"></i></th>
        <th class="sortable sort-arrow">Категория <i class="sort-arrow fas fa-sort"></i></th>
        <th class="sortable sort-arrow">КСО <i class="sort-arrow fas fa-sort"></i></th>
        <th class="sortable sort-arrow">Титул <i class="sort-arrow fas fa-sort"></i></th>
        <th class="sortable sort-arrow">Статус <i class="sort-arrow fas fa-sort"></i></th>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']): ?>
        <th>Меню</th>
        <?php endif; ?>
    </tr>
</thead>
<tbody>
<?php if (!empty($res_mas)) : ?>
    <?php foreach($res_mas as $mas): ?>
    <tr>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']): ?>
        <td></td>
        <?php endif; ?>
        <td> <strong> <?= $mas[0] ?>  </strong> </td>
        <td> <?= $mas[1] ?> </td>
        <td> <?= $mas[2] ?> </td>
        <td> <?= $mas[3] ?> </td>
        <td> <?= $mas[4] ?> </td>
        <td>
            <?php 
            switch ($mas[6]) {
                case 1:
                    echo "<p class=\"status equipment\"> $mas[5] </p>";
                    break;
                case 2:
                    echo "<p class=\"status warehouse\"> $mas[5] </p>";
                    break;
                case 3:
                    echo "<p class=\"status decomissioned\"> $mas[5] </p>";
                    break;
                default:
                    echo "<p class=\"status\"> $mas[5] </p>";
            }
            ?>
        </td>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']): ?>
        <td>
            <div class = "status link">
                <a class="status good" onclick="openModal('editModal', 'adminka', <?= $mas[0] ?>)"><i class='bx bx-edit' ></i></a>
                <a class="status bad"  onclick="openModal('deleteModal', 'adminka', <?= $mas[0] ?>)"><i class='bx bx-trash'></i></a> 
            </div>
        </td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr><td colspan="7">Нет данных</td></tr>     
<?php endif; ?>
</tbody>