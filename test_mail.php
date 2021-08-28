<?php
?>

<form action="send.php" method="post" enctype="multipart/form-data" onsubmit="send(, 'send.php')">
    <label > Ваше имя :
    <input type="text" name="name">
    </label>
    <label> Ваш email :
    <input type="text" name="email">
    </label>
    <label> Ваше сообщение :
        <input type="text" name="text">
    </label>
    <label> Выберете файл :
    <input type="file" name="myfile">
    </label>
    <input type="submit" value="Отправить">

</form>
