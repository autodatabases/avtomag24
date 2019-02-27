<?php
$h = \AutoResource\Packages\Customer\Helpers\CustomerPhoneHelper::getInstance();

$class = '';
$msg = '';
if (!$h->isValidPhone($value)) {
	$class = $class_warning;
	$msg = $message;
}

echo "<span class='{$class}' title='{$msg}'>{$value}</span>";?>