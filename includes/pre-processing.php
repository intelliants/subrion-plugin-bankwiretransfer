<?php
//##copyright##

if ($iaCore->get('bankwiretransfer_payment_details'))
{
	$member = iaUsers::getIdentity(true);

	$iaMailer = $iaCore->factory('mailer');

	$iaMailer->loadTemplate('bankwiretransfer_payment_details');
	$iaMailer->addAddress($member['email'], $member['fullname']);
	$iaMailer->setReplacements('bank_details', $iaCore->get('wiretransfer_bank_details'));

	$iaMailer->send();
}