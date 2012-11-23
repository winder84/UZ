<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rustam
 * Date: 25.10.12
 * Time: 16:04
 * To change this template use File | Settings | File Templates.
 */
class uz {
	function cutString($string, $maxlen) {
		$len = (mb_strlen($string) > $maxlen)
			? mb_strripos(mb_substr($string, 0, $maxlen), ' ')
			: $maxlen
		;
		$cutStr = mb_substr($string, 0, $len);
		if(substr($cutStr,strlen($cutStr) - 1) == ',') {
			$cutStr = substr($cutStr, 0, strlen($cutStr) - 1);
		}
		return (mb_strlen($string) > $maxlen)
			? '"' . $cutStr . '..."'
			: '"' . $cutStr . '"'
			;
	}
}
