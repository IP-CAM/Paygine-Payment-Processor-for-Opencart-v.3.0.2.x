<?php
// Heading
$_['heading_title']			= 'Paygine (Дебетовая / Кредитная карта)';

// Text
$_['text_payment']			= 'Оплата';
$_['text_success']			= 'Изменения применены';
$_['text_paygine']			= '<a onclick="window.open(\'http://www.paygine.net/\');"><img src="view/image/payment/paygine.png" alt="Paygine" title="Paygine" style="border: 1px solid #EEEEEE;" /><br /></a>';

// Entry
$_['entry_sector']			= 'Sector ID';
$_['entry_password']		= 'Пароль';
$_['entry_test']			= 'Режим работы';
$_['text_on']				= 'Тестовый режим';
$_['text_off']				= 'Рабочий режим';
$_['entry_kkt']		    	= 'Передавать данные на свою ККТ';
$_['entry_tax']		    	= 'Код ставки НДС для ККТ';

$_['entry_status']			= 'Статус';
$_['entry_sort_order']		= 'Порядок сортировки';

// Help
$_['help_sector']			= 'Номер клиента в системе Paygine';
$_['help_password']			= 'Пароль для электронно-цифровой подписи Вы можете найти в личном кабинете Paygine';
$_['help_test']				= 'В тестовом режиме оплата принимается, но средства с клиента не списываются';
$_['help_kkt']		    	= '1 - \'Да\', 0 - \'Нет\'';
$_['help_tax']		    	= '1 – ставка НДС 18%
2 – ставка НДС 10%
3 – ставка НДС расч. 18/118
4 – ставка НДС расч. 10/110
5 – ставка НДС 0%
6 – НДС не облагается';

// Error
$_['error_permission']		= 'У Вас недостаточно прав для редактирования этого модуля';
$_['error_sector']			= 'Необходимо заполнить Sector ID';
$_['error_password']		= 'Необходимо заполнить пароль для электронной подписи';

// statuses
$_['entry_registered_status'] = 'Заказ зарегистрирован в ПЦ и не содержит успешных Операций.';
$_['entry_authorized_status'] = 'В рамках Заказа успешно проведена Операция типа AUTHORIZE';
$_['entry_p2pauthorized_status'] = 'В рамках Заказа успешно проведена операция типа P2PDEBIT';
$_['entry_completed_status'] = 'Заказ успешно оплачен';
$_['entry_canceled_status'] = 'Заказ отменен';
$_['entry_blocked_status'] = 'Заказ заблокирован внутренними правилами ПЦ';
$_['entry_expired_status'] = 'Заказ с истекшим сроком действия';