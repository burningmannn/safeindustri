<?php session_start(); error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Промэнергобезопасность</title>
    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/sortTable.js"></script>
    <script src="js/readData.js"></script>
    <script src="js/function.js"></script>
    <script src="js/auth.js"></script>
</head>
<body>
    <main class="table">
        <header id="head">   
        </header>
    </main>

    <div class="wrapper wrapper-modal" id="feedbackModal">
        <a onclick="closeModal('feedbackModal')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="feedbackForm">
            <h1>Обратная связь</h1>
            <div class="input-box">
                <input type="text" id="fullname" name="fullname" placeholder="ФИО" required>
            </div>
            <div class="input-box">
                <input type="text" id="phone" name="phone" placeholder="Номер телефона" required>
            </div>
            <div class="input-box">
                <textarea rows="2" type="text" id="messageProblem" name="messageProblem" placeholder="Сообщение" required></textarea>
            </div>
            <div id="message"></div>
            <button type="submit" name="mail" class="btn">Отправить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="authModal">
        <a onclick="closeModal('authModal')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="loginForm">
            <h1>Вход</h1>
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Логин" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Пароль" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div id="message"></div>
            <button type="submit" class="btn">Войти</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="addModalAdminka">
        <a onclick="closeModal('addModal', 'adminka')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="addFormAdminka">
            <h1>Добавление</h1>
            <input type="hidden" id="nameTable" name="nameTable" value="adminka" readonly>
            <div class="input-box" id="select">
                <select name="otdelAdminka" id="otdelAdminka">    
                </select>
            </div>
            <div class="input-box" id="select">
                <select name="categoryAdminka" id="categoryAdminka">    
                </select>
            </div>
            <div class="input-box">
                <input type="text" id="inventoryAdminka" name="inventoryAdminka" placeholder="КСО" value="" required>
            </div>
            <div class="input-box">
                <input type="text" id="titleAdminka" name="titleAdminka" placeholder="Титул" value="" required>
            </div>
            <div class="input-box" id="select">
                <select name="statusAdminka" id="statusAdminka">    
                </select>
            </div>
            <div id="message"></div>
            <button type="submit" class="btn">Добавить</button>
        </form>
    </div>
    
    <div class="wrapper wrapper-modal" id="addModalOtdel">
        <a onclick="closeModal('addModal', 'otdel')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="addFormOtdel">
            <h1>Добавление</h1>
            <input type="hidden" id="nameTable" name="nameTable" value="otdel" readonly>
            <div class="input-box">
                <input type="text" id="Otdel" name="Otdel" placeholder="Отдел" value="" required>
            </div>
            <div id="message"></div>
            <button type="submit" class="btn">Добавить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="addModalCategory">
        <a onclick="closeModal('addModal', 'category')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="addFormCategory">
            <h1>Добавление</h1>
            <input type="hidden" id="nameTable" name="nameTable" value="category" readonly>
            <div class="input-box">
                <input type="text" id="Category" name="Category" placeholder="Категория" value="" required>
            </div>
            <div id="message"></div>
            <button type="submit" class="btn">Добавить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="editModalAdminka">
        <a onclick="closeModal('editModal', 'adminka')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="editFormAdminka">
            <h1>Изменение</h1>
            <input type="hidden" id="nameTable" name="nameTable" value="adminka" readonly>
            <input type="hidden" id="idRecord" name="idRecord" value="" readonly>
            <div class="input-box" id="select">
                <select name="otdel" id="otdel">    
                </select>
            </div>
            <div class="input-box" id="select">
                <select name="category" id="category">    
                </select>
            </div>
            <div class="input-box">
                <input type="text" id="inventory" name="inventory" placeholder="КСО" value="" required>
            </div>
            <div class="input-box">
                <input type="text" id="title" name="title" placeholder="Титул" value="" required>
            </div>
            <div class="input-box" id="select">
                <select name="status" id="status">    
                </select>
            </div>
            <div id="message"></div>
            <button type="submit" class="btn">Изменить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="editModalOtdel">
        <a onclick="closeModal('editModal', 'otdel')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="editFormOtdel">
            <h1>Изменение</h1>
            <input type="hidden" id="nameTable" name="nameTable" value="otdel" readonly>
            <input type="hidden" id="iddRecord" name="iddRecord" value="" readonly>
            <div class="input-box">
                <input type="text" id="otdell" name="otdell" placeholder="Отдел" value="" required>
            </div>
            <div id="message"></div>
            <button type="submit" class="btn">Изменить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="editModalCategory">
        <a onclick="closeModal('editModal', 'category')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="editFormCategory">
            <h1>Изменение</h1>
            <input type="hidden" id="nameTable" name="nameTable" value="category" readonly>
            <input type="hidden" id="idddRecord" name="idddRecord" value="" readonly>
            <div class="input-box">
                <input type="text" id="categoryy" name="categoryy" placeholder="Категория" value="" required>
            </div>
            <div id="message"></div>
            <button type="submit" class="btn">Изменить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="deleteModalAdminka">
        <a onclick="closeModal('deleteModal', 'adminka')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="deleteFormAdminka">
            <input type="hidden" id="delNameTable" name="delNameTable" value="delAdminka" readonly>
            <input type="hidden" id="IdRecord" name="IdRecord" value="" readonly>
            <div>Действительно хотите удалить запись?</div>
            <div id="message"></div>
            <button type="submit" class="btn">Удалить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="deleteModalOtdel">
        <a onclick="closeModal('deleteModal', 'otdel')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="deleteFormOtdel">
            <input type="hidden" id="delNameTable" name="delNameTable" value="delOtdel" readonly>
            <input type="hidden" id="IdRecordOtdel" name="IdRecord" value="" readonly>
            <div id="message">Действительно хотите удалить запись?</div>
            <button type="submit" class="btn">Удалить</button>
        </form>
    </div>

    <div class="wrapper wrapper-modal" id="deleteModalCategory">
        <a onclick="closeModal('deleteModal', 'category')"><i class='bx bx-x-circle bx-md'></i></a>
        <form id="deleteFormCategory">
            <input type="hidden" id="delNameTable" name="delNameTable" value="delCategory" readonly>
            <input type="hidden" id="IdRecordCategory" name="IdRecord" value="" readonly>
            <div id="message">Действительно хотите удалить запись?</div>
            <button type="submit" class="btn">Удалить</button>
        </form>
    </div>
    <script type="module" src="js/confetti.js"></script>
</body>
</html>
