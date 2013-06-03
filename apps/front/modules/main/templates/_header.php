<?php

if(strpos($_SERVER['REQUEST_URI'],'podrazdelenias')!==false) {
	echo '<a class="head_text_stuc">АГРОПРОМЫШЛЕННЫЙ ХОЛДИНГ<br>ЮГА РОССИИ</a>';
};

if(strpos($_SERVER['REQUEST_URI'],'produktyi-i-uslugi')!==false) {
	echo '<a class="head_text_press-tsentr">АГРОПРОМЫШЛЕННЫЙ ХОЛДИНГ<br>ЮГА РОССИИ</a>';
};

if(strpos($_SERVER['REQUEST_URI'],'adresnaya-kniga')!==false) {
	echo '<a class="head_text_adresnaya-kniga">АГРОПРОМЫШЛЕННЫЙ ХОЛДИНГ<br>ЮГА РОССИИ</a>';
};
?>