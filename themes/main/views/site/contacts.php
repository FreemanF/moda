<h2></h2>
<h1>Наши контакты:</h1>
<p>
    <img width="80" alt="телефоны ск дом мечты" src="<?php echo $this->themeImages; ?>loq-tel_dom_mechti.png" title="телефоны ск дом мечты" style="border: 0px none; float: left;">
</p>
<p>&nbsp;</p>
<p>
    <span style="color: #008000;">
        <strong>
            <span style="font-size: medium;">
                <span style="font-size: large;">&nbsp;&nbsp;<?php echo Setting::getCachedParam('phone1'); ?></span>
            </span>
        </strong>
    </span>
Александр
</p>
<p>
<span style="color: #008000;">
<strong>
<span style="font-size: medium;">
<span style="font-size: large;">&nbsp;&nbsp;<?php echo Setting::getCachedParam('phone2'); ?></span>
</span>
</strong>
</span>
Андрей
</p>
<p>&nbsp;</p>
<p>
<a href="mailto:info@pesthouse.ru">
    <img width="80" alt="эл.почта дом мечты" src="<?php echo $this->themeImages; ?>log-mail_dom_mechti.png" title=" эл.почта дом мечты" style="border: 0px none; float: left;">
</a>

<a href="mailto:<?php echo Setting::getCachedParam('emaill'); ?>">
    <br>
</a>
</p>
<p>
    <span style="font-size: medium;">
        <strong>
            <span style="color: #008000;">
                <span class="jslink" title="Детальная настройка ящика">
                    &nbsp;&nbsp;
                    <a href="mailto:<?php echo Setting::getCachedParam('emaill'); ?>">
                        <span style="font-size: large;"><?php echo Setting::getCachedParam('emaill'); ?></span>
                    </a>
                </span>
            </span>
        </strong>
    </span>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php echo $this->model->content_long; ?>
<p style="text-align: center;">
<span style="color: #339966;">
<strong>
<span style="font-size: medium;">Положение на карте:</span>
</strong>
</span>
</p>
<div align="center">
<p></p>
</div>
  <p>Схема проезда к выставочному образцу на Новорижском шоссе. 
  <div style="width: 600px; display: block; margin: 0 auto;">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=JlCMmbvggiD1w-7e-ISAEFZxpSVMyQ1A&width=600&height=450"></script>
  </div>
</p>
<form method="POST" action="contacts">
<table align="center" style="margin: 0 auto;">
<tbody>
<tr>
<td>Контактное лицо:</td>
</tr>
<tr>
<td align="left">
<input type="text" value="" style="width:450px" name="sender">
</td>
</tr>
<tr>
<td valign="bottom" align="left">E-Mail:</td>
</tr>
<tr>
<td align="left">
<input type="text" value="" style="width:450px" name="mail">
</td>
</tr>
<tr>
<td valign="bottom" align="left">Сообщение:</td>
</tr>
<tr>
<td valign="top" align="left">
<textarea id="message" rows="8" style="width:450px" name="message"></textarea>
</td>
</tr>
<tr>
<td valign="top" align="right" style="padding-top:8px">
<input type="hidden" name="save">
<input type="submit" value="Отправить" name="save">
</td>
</tr>
</tbody>
</table>
</form>