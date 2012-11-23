<?php // Vars: $factorysPager
$ouz = new uz();
$factorysPager->setOption('ajax', true);
echo $factorysPager->renderNavigationTop();

echo _open('ul.factorys_elements');

foreach ($factorysPager as $factorys)
{
  echo _open('li.factorys_element');

	echo _tag('a', Array(), _link($factorys));
	echo "<br />";
	echo _tag('div.factorys_pre', Array(), $ouz->cutString($factorys->body, 120));

  echo _close('li');
}

echo _close('ul');
echo "<br />";
echo $factorysPager->renderNavigationBottom();