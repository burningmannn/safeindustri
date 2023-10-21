<?php
    error_reporting(0);
    session_start();
    if (empty($_SESSION['user'])):
?>
<section class="table_body">
    <table id="info-table">
        <?php include 'readDataTechnic.php'; ?>
    </table>
</section>
<?php else: ?>
<div class="slider_tabs">
    <input type="radio" name="slider" id="slider1" checked="">
    <input type="radio" name="slider" id="slider2">
    <input type="radio" name="slider" id="slider3">
    <input type="radio" name="slider" id="slider4">
    <div class="labels">
        <label for="slider1"></label>
        <label for="slider2"></label>
        <label for="slider3"></label>
        <label for="slider4"></label>
    </div>
    <div class="hero_content">
        <div class="hero_box slider1_bg" id="table-container">
            <table id="tableTechnic" class="tableTechnic">
                <?php include 'readDataTechnic.php'; ?>
            </table>
        </div>
        <div class="hero_box slider2_bg">
            <table id="info-table" class="tableDepartament">
                <?php include_once 'readDataDepartament.php'; ?>
            </table>
        </div>
        <div class="hero_box slider3_bg">
            <table id="info-table" class="tableCategory">
                <?php include_once 'readDataCategory.php'; ?>
            </table>
        </div>
        <div class="hero_box slider4_bg">
            <table id="info-table">
                <?php include_once 'readDataMessage.php'; ?>
            </table>
        </div>
    </div>
</div>
<?php endif;?>
