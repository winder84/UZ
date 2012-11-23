<?php // Vars: $podrazdeleniaPager

echo $podrazdeleniaPager->renderNavigationTop();

echo _open('ul.elements');

foreach ($podrazdeleniaPager as $podrazdelenia)
{
  echo _open('li.element');

    echo _link($podrazdelenia);

  echo _close('li');
}

echo _close('ul');

echo $podrazdeleniaPager->renderNavigationBottom();