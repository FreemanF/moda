<h2>Онлайн заказ.</h2>
             
                           
<form action="online_zakaz" method="POST" enctype="multipart/form-data">
<div>
	Вы хотите: 
  <label>
    <input type="radio" name="anketa" value="order" onclick="$('.switch').toggle();" checked="checked" />заказать
  </label>
  <label>
    <input type="radio" name="anketa" value="question" onclick="$('.switch').toggle();" />задать вопрос
  </label>
</div>
  <table id="anketa" align="center" style="margin: 0 auto;">
    <tr class="switch">
      <td>Фамилия Имя Отчество:</td>
    </tr>
    <tr class="switch">
      <td align="left"><input type="text" name="fio" style="width:450px" value=""></td>
    </tr>
    <tr class="switch">
      <td valign="bottom" align="left">Дата рождения:</td>
    </tr>
    <tr class="switch">
      <td align="left"><input type="text" name="birthday"  style="width:450px" value=""></td>
    </tr>
    <tr class="switch">
      <td>Телефон мобильный:</td>
    </tr>
    <tr class="switch">
      <td align="left"><input type="text" name="mobile" style="width:450px" value=""></td>
    </tr>
    <tr class="switch">
      <td align="left">Телефон домашний (если есть):</td>
    </tr>
    <tr class="switch">
      <td align="left"><input type="text" name="phone" style="width:450px" value=""></td>
    </tr>
    <tr class="switch">
      <td>Серия номер и дата выдачи паспорта:</td>
    </tr>
    <tr class="switch">
      <td align="left"><input type="text" name="paspnumber" style="width:450px" value=""></td>
    </tr>
    <tr class="switch">
      <td align="left">Кем выдан паспорт:</td>
    </tr>
    <tr class="switch">
      <td align="left"><input type="text" name="paspdist" style="width:450px" value=""></td>
    </tr>
    <tr class="switch">
      <td align="left">Адрес застройки:</td>
    </tr>
    <tr class="switch">
      <td align="left"><input type="text" name="address"  style="width:450px" value=""></td>
    </tr>
    <tr class="switch"  style="display: none">
      <td>Контактное лицо:</td>
    </tr>
    <tr class="switch"  style="display: none">
      <td align="left"><input type="text" name="sender" style="width:450px" value=""></td>
    </tr>
    <tr>
      <td valign="bottom" align="left">E-Mail:</td>
    </tr>
    <tr>
      <td align="left"><input type="text" name="mail"  style="width:450px" value=""></td>
    </tr>
    <tr>
      <td align="left" valign="bottom">Сообщение:</td>
    </tr>
    <tr>
      <td  align=left valign="top"><textarea name="message" id="message" style="width:450px" rows="8"></textarea></td>
    </tr>
    <tr>
      <td align="left">Файл(не более 2МБайт): <input type="file" name="file" /></td>
    </tr>
    <tr>
      <td align="left">Проверочный код: 15 плюс 10 равно <input type="text" name="capcha" style="width: 30px;" /> <input type="hidden" name="save" />
        <input name="save" type="submit" value="Отправить" /></td>
    </tr>
  </table>
</form>