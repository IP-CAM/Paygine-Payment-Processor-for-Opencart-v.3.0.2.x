<?php
// Heading
$_['heading_title']			= 'Paygine (Credit Card / Debit Card)';

// Text
$_['text_payment']			= 'Payment';
$_['text_success']			= 'Changes are applied';
$_['text_paygine']			= '<a onclick="window.open(\'http://www.paygine.ru/\');"><img src="view/image/payment/paygine.png" alt="Paygine" title="Paygine" style="border: 1px solid #EEEEEE;" /><br /></a>';

// Entry
$_['entry_sector']			= 'Sector ID';
$_['entry_password']		= 'Password';
$_['entry_test']			= 'Work mode';
$_['text_on']				= 'Test mode';
$_['text_off']				= 'Production mode';
$_['entry_kkt']		    	= 'Send data for KKT';
$_['entry_tax']		    	= 'NDS code value for KKT';

$_['entry_status']			= 'Status';
$_['entry_sort_order']		= 'Sort Order';

// Help
$_['help_sector']			= 'Merchant identifier in Paygine system';
$_['help_password']			= 'The digital signature password can be found in Paygine merchant cabinet';
$_['help_test']				= 'The payment will be processed in test mode, but money will not withdrawn';
$_['help_kkt']		    	= '1 - \'Yes\', 0 - \'No\'';
$_['help_tax']		    	= '1 – NDS 18%
2 – NDS 10%
3 – NDS 18/118
4 – NDS 10/110
5 – NDS 0%
6 – no NDS';

// Error
$_['error_permission']		= 'You do not have permission to modify payment Paygine';
$_['error_sector']			= 'Sector ID field is required';
$_['error_password']		= 'Password field is required';

// statuses
$_['entry_registered_status'] = 'Заказ зарегистрирован в ПЦ и не содержит успешных Операций.';
$_['entry_authorized_status'] = 'В рамках Заказа успешно проведена Операция типа AUTHORIZE';
$_['entry_p2pauthorized_status'] = 'В рамках Заказа успешно проведена операция типа P2PDEBIT';
$_['entry_completed_status'] = 'Заказ успешно оплачен';
$_['entry_canceled_status'] = 'Заказ отменен';
$_['entry_blocked_status'] = 'Заказ заблокирован внутренними правилами ПЦ';
$_['entry_expired_status'] = 'Заказ с истекшим сроком действия';