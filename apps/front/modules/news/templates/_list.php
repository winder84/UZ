<?php // Vars: $newsPager
$ouz = new uz();
$newsPager->setOption('ajax', true);
echo $newsPager->renderNavigationTop();

echo _open('ul.news_elements');
echo _link('news/list')->text(_tag('div.news_bg', Array(), 'Актуальные новости'));
foreach ($newsPager as $news)
{
  echo _open('li.news_element');

	echo _tag('a', Array(), $news->title);
	echo "<br />";
	echo '<br />';
	echo _tag('div.news_pre', Array(), $ouz->cutString($news->body, 80));

  echo _close('li');
	echo _link($news)->set('a.news_cont')->text('Продолжение...');
	echo "<br />";
	echo "<hr />";
}

echo _close('ul');

echo $newsPager->renderNavigationBottom();