function openModal(nameModal = "", nameTable="", id = -1){
    try {
        switch (nameModal) {
            case "feedbackModal":
                document.getElementById('feedbackModal').style.display = 'block';
                break;
            case "authModal":
                document.getElementById('authModal').style.display = 'block';
                break;
            case "addModal":
                switch(nameTable){
                    case "adminka":
                        loadDataForAddModal(nameModal, nameTable);
                        break;
                    case "otdel":
                        document.getElementById('addModalOtdel').style.display = 'block';
                        break;
                    case "category":
                        document.getElementById('addModalCategory').style.display = 'block';
                        break;
                    default:
                        console.log("Таблица не найдена!");
                }
                break;
            case "editModal":
                switch(nameTable){
                    case "adminka":
                        if (id != -1) {
                            loadDataForEditModal(nameModal, nameTable, id);
                        }
                        break;
                    case "otdel":
                        if (id != -1) {
                            loadDataForEditOtdel(nameModal, nameTable, id)
                        }
                        break;
                    case "category":
                        if (id != -1) {
                            loadDataForEditCategory(nameModal, nameTable, id)
                        }
                        break;
                    default:
                        console.log("Таблица не найдена!");
                }
                break;
            case "deleteModal":
                switch(nameTable){
                    case "adminka":
                        if (id != -1){
                            document.getElementById('IdRecord').value = id;
                            document.getElementById('deleteModalAdminka').style.display = 'block';
                        }
                    break;
                    case "otdel":
                        $('#deleteFormOtdel .btn').css('display', 'block');
                        $('#deleteFormOtdel #message').html("Действительно хотите удалить запись?");
                        if (id != -1){
                            document.getElementById('IdRecordOtdel').value = id;
                            document.getElementById('deleteModalOtdel').style.display = 'block';
                        }
                    break;
                    case "category":
                        $('#deleteFormCategory .btn').css('display', 'block');
                        $('#deleteFormCategory #message').html("Действительно хотите удалить запись?");
                        if (id != -1){
                            document.getElementById('IdRecordCategory').value = id;
                            document.getElementById('deleteModalCategory').style.display = 'block';
                        }
                    break;
                    default:
                        console.log("Таблица не найдена!");
                }
                break;
            default:
                console.log("Форма не найдена!");
    }
    } catch(e) {
        console.log("Возникла проблема с формой!!!");
        console.log('Ошибка ' + e.name + ":" + e.message + "\n" + e.stack);
    }
}	

function closeModal(nameModal = "", nameTable="", id = -1){
    try {
        switch (nameModal) {
            case "feedbackModal":
                document.getElementById('feedbackModal').style.display = 'none';
                document.getElementById('feedbackForm').reset()
                document.getElementById('message').innerHTML = '';
                document.getElementById('message').style.display = "none";
                break;
            case "authModal":
                document.getElementById('authModal').style.display = 'none';
                document.getElementById('loginForm').reset()
                $('#loginForm #message').innerHTML = '';
                $('#loginForm #message').css('display', 'none');
                break;
            case "addModal":
                switch(nameTable){
                    case "adminka":
                        document.getElementById('addModalAdminka').style.display = 'none';
                        document.getElementById('addFormAdminka').reset();
                        $('#addFormAdminka #message').empty();
                        $('#otdelAdminka').empty();
                        $('#categoryAdminka').empty();
                        $('#statusAdminka').empty();
                        break;
                    case "otdel":
                        document.getElementById('addModalOtdel').style.display = 'none';
                        document.getElementById('addFormOtdel').reset();
                        $('#addFormOtdel #message').empty();
                        break;
                    case "category":
                        document.getElementById('addModalCategory').style.display = 'none';
                        document.getElementById('addFormCategory').reset();
                        $('#addFormCategory #message').empty();
                        break;
                    default:
                        console.log("Форма не найдена!");
                }
                break;
            case "editModal":
                switch(nameTable){
                    case "adminka":
                        document.getElementById('editModalAdminka').style.display = 'none';
                        document.getElementById('idRecord').value = "";
                        document.getElementById('editFormAdminka').reset()
                        break;
                    case "otdel":
                        document.getElementById('editModalOtdel').style.display = 'none';
                        document.getElementById('iddRecord').value = "";
                        document.getElementById('editFormOtdel').reset()
                        break;
                    case "category":
                        document.getElementById('editModalCategory').style.display = 'none';
                        document.getElementById('idddRecord').value = "";
                        document.getElementById('editFormCategory').reset()
                        break;
                    default:
                        console.log("Форма не найдена!");
                }
                break;
            case "deleteModal":
                switch(nameTable){
                    case "adminka":
                        document.getElementById('IdRecord').value = "";
                        document.getElementById('deleteModalAdminka').style.display = 'none';
                        break;
                    case "otdel":
                        document.getElementById('IdRecordOtdel').value = "";
                        document.getElementById('deleteModalOtdel').style.display = 'none';
                        $('#deleteFormOtdel #message').html("Действительно хотите удалить запись?");
                        break;
                    case "category":
                        document.getElementById('IdRecordCategory').value = "";
                        document.getElementById('deleteModalCategory').style.display = 'none';
                        $('#deleteFormCategory #message').html("Действительно хотите удалить запись?");
                        break;
                    default:
                        console.log("Таблица не найдена!");
                }
                break;
            default:
                console.log("Форма не найдена!");
    }
    } catch(e) {
        console.log("Возникла проблема с формой!!!");
        console.log('Ошибка ' + e.name + ":" + e.message + "\n" + e.stack);
    }
}

function loadDataForAddModal(nameModal = "", nameTable="", id = -1){
    $.ajax({
        type: 'GET',
        url: 'CRUD/loadDataForForm.php?nameModal=' + nameModal + '&nameTable=' + nameTable + '&id=' + id,
        dataType: 'json',
        cache: false,
        processData: false,
        async: true,
        contentType: false,
        success: function(responce) {
            if (responce.status) {
                $('#otdelAdminka').empty();
                $('#categoryAdminka').empty();
                $('#statusAdminka').empty();
                const departament = Object.entries(responce.departament);
                const category = Object.entries(responce.category);
                const status = Object.entries(responce.status_technic);

                departament.forEach(([key, value]) => {
                    $('#otdelAdminka').append('<option id="otdelOption" value="'+value.id_departament+'">'+value.nameDepartament+'</option>');
                });

                category.forEach(([key, value]) => {
                    $('#categoryAdminka').append('<option id="categoryOption" value="'+value.id_category+'">'+value.nameCategory+'</option>');
                });

                status.forEach(([key, value]) => {
                    $('#statusAdminka').append('<option id="statusOption" value="'+value.id_status+'">'+value.nameStatus+'</option>');
                });

                document.getElementById('addModalAdminka').style.display = 'block';
            } else {
                console.log(responce.message);
            }
        },
        error: function(){
            console.log("Возникла ошибка при выполнении php");
        },
    });
}

function loadDataForEditModal(nameModal = "", nameTable="", id = -1){
    $.ajax({
        type: 'GET',
        url: 'CRUD/loadDataForForm.php?nameModal=' + nameModal + '&nameTable=' + nameTable + '&id=' + id,
        dataType: 'json',
        cache: false,
        processData: false,
        async: true,
        contentType: false,
        success: function(responce) {
            if (responce.status) {
                $('#otdel option').remove();
                $('#category option').remove();
                $('#status option').remove();
                const data = responce.data;
                const departament = Object.entries(responce.departament);
                const category = Object.entries(responce.category);
                const status = Object.entries(responce.status_technic);

                const idDepartament = data.departament;
                const idCategory = data.category;
                const idStatus = data.status_technic;

                departament.forEach(([key, value]) => {
                    if(idDepartament == value.id_departament){
                        $('#otdel').append('<option id="otdelOption" value="'+value.id_departament+'" selected>'+value.nameDepartament+'</option>');
                    } else {
                        $('#otdel').append('<option id="otdelOption" value="'+value.id_departament+'">'+value.nameDepartament+'</option>');
                    }
                });

                category.forEach(([key, value]) => {
                    if(idCategory == value.id_category){
                        $('#category').append('<option id="categoryOption" value="'+value.id_category+'" selected>'+value.nameCategory+'</option>');
                    } else {
                        $('#category').append('<option id="categoryOption" value="'+value.id_category+'">'+value.nameCategory+'</option>');
                    }
                });

                status.forEach(([key, value]) => {
                    if(idStatus == value.id_status){
                        $('#status').append('<option id="statusOption" value="'+value.id_status+'" selected>'+value.nameStatus+'</option>');
                    } else {
                        $('#status').append('<option id="statusOption" value="'+value.id_status+'">'+value.nameStatus+'</option>');
                    }
                });

                document.getElementById('title').value = data.title;
                document.getElementById('inventory').value = data.inventory;
                document.getElementById('idRecord').value = id;
                document.getElementById('editModalAdminka').style.display = 'block';
            } else {
                console.log(responce.message);
            }
        },
        error: function(){
            console.log("Возникла ошибка при выполнении php");
        },
    });
}

function loadDataForEditOtdel(nameModal = "", nameTable="", id = -1){
    $.ajax({
        type: 'GET',
        url: 'CRUD/loadDataForForm.php?nameModal=' + nameModal + '&nameTable=' + nameTable + '&id=' + id,
        dataType: 'json',
        cache: false,
        async: true,
        processData: false,
        contentType: false,
        success: function(responce) {
            if (responce.status) {
                const data = responce.departament[0]["nameOtd"];
                document.getElementById('otdell').value = data;
                document.getElementById('editModalOtdel').style.display = 'block';
                document.getElementById('iddRecord').value = id;
            } else {
                console.log(responce.message);
            }
        },
        error: function(){
            console.log("Возникла ошибка при выполнении php");
        },
    });
}

function loadDataForEditCategory(nameModal = "", nameTable="", id = -1){
    $.ajax({
        type: 'GET',
        url: 'CRUD/loadDataForForm.php?nameModal=' + nameModal + '&nameTable=' + nameTable + '&id=' + id,
        dataType: 'json',
        cache: false,
        async: true,
        processData: false,
        contentType: false,
        success: function(responce) {
            if (responce.status) {
                const data = responce.category[0]["nameCat"];
                document.getElementById('categoryy').value = data;
                document.getElementById('editModalCategory').style.display = 'block';
                document.getElementById('idddRecord').value = id;
            } else {
                console.log(responce.message);
            }
        },
        error: function() {
            console.log("Возникла ошибка при выполнении php");
        },
    });
}

$(document).ready(function(){
    
    /* Отправка сообщении */
    $('#feedbackForm').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'config/feedback.php',
            async: true,
            dataType: 'json',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    $('#feedbackForm #message').html(data.message);
                } else {
                    $('#feedbackForm #message').html(data.message);
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });
    });
    
    /* Добавление записи в основной БД*/
    $('#addFormAdminka').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/addDataTable.php',
            async: true,
            dataType: 'json',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("addModal", "adminka");
                    get_technic();
                } else {
                    $('#addFormAdminka #message').html(data.message);
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });
    });

    /* Добавление записи в таблицу отдел */
    $('#addFormOtdel').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/addDataTable.php',
            async: true,
            dataType: 'json',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("addModal", "otdel");
                    get_otdel();
                } else {
                    $('#addFormOtdel #message').html(data.message);
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });
    });

    /* Добавление записи в таблицу категория */
    $('#addFormCategory').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/addDataTable.php',
            async: true,
            dataType: 'json',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("addModal", "category");
                    get_category();
                } else {
                    $('#addFormCategory #message').html(data.message);
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });
    });
    
    /* Изменение записи в основной БД*/
    $('#editFormAdminka').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/updateDataTable.php',
            async: true,
            dataType: 'json',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("editModal", "adminka");
                    get_technic();
                } else {
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });
    });

    /* Изменение записи таблице Отдел*/
    $('#editFormOtdel').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/updateDataTable.php',
            dataType: 'json',
            async: true,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("editModal", "otdel");
                    get_otdel();
                    get_technic();
                } else {
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });   
    });

    /* Изменение записи таблице Категория*/
    $('#editFormCategory').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/updateDataTable.php',
            dataType: 'json',
            async: true,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("editModal", "category");
                    get_category();
                    get_technic();
                } else {
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });

        
    });

    /* Удаление записи из основной бд */
    $('#deleteFormAdminka').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/deleteDataTable.php',
            dataType: 'json',
            data: formData,
            async: true,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("deleteModal", "adminka");
                    get_technic();
                } else {
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        }); 
    });

    /* Удаление записи из таблицы Отдел */
    $('#deleteFormOtdel').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/deleteDataTable.php',
            dataType: 'json',
            data: formData,
            async: true,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("deleteModal", "otdel");
                    get_otdel();
                    get_technic();
                } else {
                    $('#deleteFormOtdel #message').html(data.message);
                    $('#deleteFormOtdel .btn').css('display', 'none');
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        }); 
    });

    /* Удаление записи из таблицы Категория */
    $('#deleteFormCategory').submit(function(e){
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'CRUD/deleteDataTable.php',
            dataType: 'json',
            data: formData,
            async: true,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("deleteModal", "category");
                    get_category();
                    get_technic();
                } else {
                    $('#deleteFormCategory #message').html(data.message);
                    $('#deleteFormCategory .btn').css('display', 'none');
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        }); 
    });
});

function menuShow() {
	let menuMobile = document.querySelector('.mobile-menu');
	if (menuMobile != null){
		if (menuMobile.classList.contains('open')) {
			menuMobile.classList.remove('open');
			document.querySelector('.icon').src = "img/menu.png";
		} else {
			menuMobile.classList.add('open');
			document.querySelector('.icon').src = "img/close.png";
		}
	}
}