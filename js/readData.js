function get_header(){
    $.ajax({
        url: 'CRUD/readHeader.php',
        dataType: "html",
        async: true,
        success: function(response){
            $('#head').html(response)
        },
        error: function(){
            console.log("Данные не выгружены get_header()");
        },
    });
}

//Функция вывода всех таблиц
function get_all_records(){
    $.ajax({
        url: 'CRUD/readSlider.php',
        dataType: "html",
        async: true,
        success: function(response){
            if ($('.table_body')) {
                $('.table_body').remove();
            }
            if ($('.slider_tabs')) {
                $('.slider_tabs').remove();
            }
            $('#head').after(response);
            initSorting();
        },
        error: function(){
            console.log("Данные не выгружены get_all_records()");
        },
    });
}

//Функция для вывода основной таблицы
function get_technic(){
    $.ajax({
        url: 'CRUD/readDataTechnic.php',
        dataType: "html",
        async: true,
        success: function(response){
            if ($('.tableTechnic')) {
                $('.tableTechnic').empty();
            }
            // Найти элемент <script> по его атрибуту src
            var scriptElement = document.querySelector('script[src="js/sortTable.js"]');

            // Проверить, что элемент найден
            if (scriptElement) {
            // Получить родительский элемент <head> или <body>
            var parentElement = scriptElement.parentNode;

            // Удалить элемент <script> из родительского элемента
            parentElement.removeChild(scriptElement);
            }
            $('.tableTechnic').html(response);
            initSorting();
            
        },
        error: function(){
            console.log("Данные не выгружены get_technic()");
        },
    });
}

//Функция для вывода отдела
function get_otdel(){
    $.ajax({
        url: 'CRUD/readDataDepartament.php',
        dataType: "html",
        async: true,
        success: function(response){
            if ($('.tableDepartament')) {
                $('.tableDepartament').empty();
            }
            $('.tableDepartament').html(response);
        },
        error: function(){
            console.log("Данные не выгружены get_otdel()");
        },
    });
}

//Функция для вывода категории
function get_category(){
    $.ajax({
        url: 'CRUD/readDataCategory.php',
        dataType: "html",
        async: true,
        success: function(response){
            if ($('.tableCategory')) {
                $('.tableCategory').empty();
            }
            $('.tableCategory').html(response);
        },
        error: function(){
            console.log("Данные не выгружены get_category()");
        },
    });
}

get_header();
get_all_records();  