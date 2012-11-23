<?php // Vars: $news
echo '<div class="news_show_block">';
	echo _tag('h2.news_title', array(), $news->title);
	echo '<br>';
	echo _media($news->Image)->size(200)->set('.news_image');
	echo '<br>';
	echo _tag('h4.news_body', array(), $news->body);
echo '</div>';