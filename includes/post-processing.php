<?php
//##copyright##

if (isset($action) && in_array($action, array('canceled', 'completed')))
{
	if ('completed' == $action)
	{
		$transaction = $temp_transaction;

		if (!$error)
		{
			$transaction['email'] = iaUsers::getIdentity()->email;
			$transaction['reference_id'] = iaUtil::generateToken();
			$transaction['gateway_name'] = 'bankwiretransfer';

			$user = explode(' ', iaUsers::getIdentity()->fullname);

			$order['txn_id'] = $transaction['reference_id'];
			$order['payment_status'] = iaLanguage::get('pending');
			$order['payer_email'] = $transaction['email'];
			$order['payment_gross'] = $transaction['amount'];
			$order['payment_date'] = $transaction['date'];
			$order['mc_currency'] = $transaction['currency'];
			$order['first_name'] = $user[0];
			$order['last_name'] = isset($user[1]) ? $user[1] : '';
		}
	}
}