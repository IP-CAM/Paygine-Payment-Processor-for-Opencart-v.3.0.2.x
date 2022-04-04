<?php
class ControllerExtensionPaymentPaygine extends Controller {
	private $error = array();

	public function index() {
        $this->load->language('extension/payment/paygine');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('payment_paygine', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['entry_sector'] = $this->language->get('entry_sector');
        $data['help_sector'] = $this->language->get('help_sector');
        $data['entry_password'] = $this->language->get('entry_password');
        $data['help_password'] = $this->language->get('help_password');
        $data['text_on'] = $this->language->get('text_on');
        $data['text_off'] = $this->language->get('text_off');
        $data['entry_test'] = $this->language->get('entry_test');
        $data['help_test'] = $this->language->get('help_test');

        $data['entry_kkt'] = $this->language->get('entry_kkt');
        $data['help_kkt'] = $this->language->get('help_kkt');
        $data['entry_tax'] = $this->language->get('entry_tax');
        $data['help_tax'] = $this->language->get('help_tax');

        $data['entry_status'] = $this->language->get('entry_status');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');

        $data['entry_registered_status'] = $this->language->get('entry_registered_status');
        $data['entry_pending_status'] = $this->language->get('entry_pending_status');
        $data['entry_approved_status'] = $this->language->get('entry_approved_status');
        $data['entry_rejected_status'] = $this->language->get('entry_rejected_status');
        $data['entry_timeout_status'] = $this->language->get('entry_timeout_status');
        $data['entry_error_status'] = $this->language->get('entry_error_status');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['sector'])) {
            $data['error_sector'] = $this->error['sector'];
        } else {
            $data['error_sector'] = '';
        }

        if (isset($this->error['password'])) {
            $data['error_password'] = $this->error['password'];
        } else {
            $data['error_password'] = '';
        }

        if (isset($this->request->post['payment_paygine_status'])) {
            $data['payment_paygine_status'] = $this->request->post['payment_paygine_status'];
        } else {
            $data['payment_paygine_status'] = $this->config->get('payment_paygine_status');
        }

        if (isset($this->request->post['payment_paygine_test'])) {
            $data['payment_paygine_test'] = $this->request->post['payment_paygine_test'];
        } else {
            $data['payment_paygine_test'] = $this->config->get('payment_paygine_test');
        }

        if (isset($this->request->post['payment_paygine_sort_order'])) {
            $data['payment_paygine_sort_order'] = $this->request->post['payment_paygine_sort_order'];
        } else {
            $data['payment_paygine_sort_order'] = $this->config->get('payment_paygine_sort_order');
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/dashboard&user_token=' . $this->session->data['user_token']),
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_payment'),
            'href'      => $this->url->link('extension/extension&user_token=' . $this->session->data['user_token']),
            'separator' => ' :: '
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('extension/payment/paygine&user_token=' . $this->session->data['user_token']),
            'separator' => ' :: '
        );

        $data['action'] = $this->url->link('extension/payment/paygine&user_token=' . $this->session->data['user_token']);

        $data['cancel'] = $this->url->link('extension/extension&user_token=' . $this->session->data['user_token']);

        if (isset($this->request->post['payment_paygine_sector'])) {
            $data['payment_paygine_sector'] = $this->request->post['payment_paygine_sector'];
        } else {
            $data['payment_paygine_sector'] = $this->config->get('payment_paygine_sector');
        }

        if (isset($this->request->post['payment_paygine_kkt'])) {
            $data['payment_paygine_kkt'] = $this->request->post['payment_paygine_kkt'];
        } else {
            $data['payment_paygine_kkt'] = $this->config->get('payment_paygine_kkt');
        }

        if (isset($this->request->post['payment_paygine_tax'])) {
            $data['payment_paygine_tax'] = $this->request->post['payment_paygine_tax'];
        } else {
            $data['payment_paygine_tax'] = $this->config->get('payment_paygine_tax');
        }

        if (isset($this->request->post['payment_paygine_password'])) {
            $data['payment_paygine_password'] = $this->request->post['payment_paygine_password'];
        } else {
            $data['payment_paygine_password'] = $this->config->get('payment_paygine_password');
        }

        if (isset($this->request->post['payment_paygine_two_steps'])) {
            $data['payment_paygine_two_steps'] = $this->request->post['payment_paygine_two_steps'];
        } else {
            $data['payment_paygine_two_steps'] = $this->config->get('payment_paygine_two_steps');
        }
//////////////////////////////////////////////////////////////////////////////
/// статусы
//////////////////////////////////////////////////////////////////////////////

        $data['order_statuses'] = $this->db->query("select * from ".DB_PREFIX."order_status where language_id = ".$this->config->get('config_language_id').";")->rows;

        if (isset($this->request->post['payment_paygine_registered_status'])) {
            $data['payment_paygine_registered_status'] = $this->request->post['payment_paygine_registered_status'];
        } else {
            $data['payment_paygine_registered_status'] = $this->config->get('payment_paygine_registered_status');
        }

        if (isset($this->request->post['payment_paygine_authorized_status'])) {
            $data['payment_paygine_authorized_status'] = $this->request->post['payment_paygine_authorized_status'];
        } else {
            $data['payment_paygine_authorized_status'] = $this->config->get('payment_paygine_authorized_status');
        }

        if (isset($this->request->post['payment_paygine_p2pauthorized_status'])) {
            $data['payment_paygine_p2pauthorized_status'] = $this->request->post['payment_paygine_p2pauthorized_status'];
        } else {
            $data['payment_paygine_p2pauthorized_status'] = $this->config->get('payment_paygine_p2pauthorized_status');
        }

        if (isset($this->request->post['payment_paygine_completed_status'])) {
            $data['payment_paygine_completed_status'] = $this->request->post['payment_paygine_completed_status'];
        } else {
            $data['payment_paygine_completed_status'] = $this->config->get('payment_paygine_completed_status');
        }

        if (isset($this->request->post['payment_paygine_canceled_status'])) {
            $data['payment_paygine_canceled_status'] = $this->request->post['payment_paygine_canceled_status'];
        } else {
            $data['payment_paygine_canceled_status'] = $this->config->get('payment_paygine_canceled_status');
        }

        if (isset($this->request->post['payment_paygine_blocked_status'])) {
            $data['payment_paygine_blocked_status'] = $this->request->post['payment_paygine_blocked_status'];
        } else {
            $data['payment_paygine_blocked_status'] = $this->config->get('payment_paygine_blocked_status');
        }

        if (isset($this->request->post['payment_paygine_expired_status'])) {
            $data['payment_paygine_expired_status'] = $this->request->post['payment_paygine_expired_status'];
        } else {
            $data['payment_paygine_expired_status'] = $this->config->get('payment_paygine_expired_status');
        }

/////////////////////////////////////////////////////////////////////////////
/// другие настройки (payform, order_reg, email notifications)
/////////////////////////////////////////////////////////////////////////////
        if (isset($this->request->post['payment_paygine_payform'])) {
            $data['payment_paygine_payform'] = $this->request->post['payment_paygine_payform'];
        } else {
            $data['payment_paygine_payform'] = $this->config->get('payment_paygine_payform');
        }
/////////////////////////////////////////////////////////////////////////////
        $data['callback'] = HTTP_CATALOG . 'index.php?route=payment/paygine/callback';

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/payment/paygine', $data));
	}

	public function install () {
        $this->db->query("ALTER TABLE `".DB_PREFIX."order` ADD `paygine_total` VARCHAR(15);");
        // update oc_order set paygine_total = -10 where order_id = 56;
        // $this->load->model('setting/event');
        /*$this->model_setting_event->addEvent(
            'payginecolumn', //код
            'admin/view/sale/order_list/after', //событие
            'extension/payment/paygine/eventPaygineColumnInOrdersList' //обработчик
        );*/
    }

    public function uninstall () {
        $this->db->query("ALTER TABLE `".DB_PREFIX."order` DROP `paygine_total`");
        // $this->load->model('setting/event');
        // $this->model_setting_event->deleteEventByCode('payginecolumn');
    }

	protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/payment/paygine')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['payment_paygine_sector']) {
            $this->error['warning'] = $this->language->get('error_sector');
        }

        if (!$this->request->post['payment_paygine_password']) {
            $this->error['warning'] = $this->language->get('error_password');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
	}
}