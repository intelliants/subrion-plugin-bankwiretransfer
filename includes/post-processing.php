<?php
/******************************************************************************
 *
 * Subrion - open source content management system
 * Copyright (C) 2016 Intelliants, LLC <http://www.intelliants.com>
 *
 * This file is part of Subrion.
 *
 * Subrion is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Subrion is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Subrion. If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @link http://www.subrion.org/
 *
 ******************************************************************************/

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