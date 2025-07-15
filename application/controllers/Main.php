<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    private $transaction_id;
    private $session_id;
    private $transaction_timeout = 1800; // Increased to 30 minutes (1800 seconds)
    private $log_path = 'application/logs/frontend/';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Operations');
        $this->load->library('session');
        $this->load->library('encryption');
        
        // Initialize logging directory
        if (!is_dir($this->log_path)) {
            mkdir($this->log_path, 0755, true);
        }
        
        $this->_initialize_transaction();
        $this->_initialize_session();
        
        $this->_log_activity('Controller initialized', [
            'session_id' => $this->session_id,
            'transaction_id' => $this->transaction_id
        ]);
    }
    
    private function _log_activity($message, $data = [])
    {
        $log_message = "[" . date('Y-m-d H:i:s') . "] " . $message . "\n";
        if (!empty($data)) {
            $log_message .= "Data: " . json_encode($data) . "\n";
        }
        $log_message .= "----------------------------------------\n";
        
        $log_file = $this->log_path . 'activity_' . date('Y-m-d') . '.log';
        file_put_contents($log_file, $log_message, FILE_APPEND);
    }
    
    private function _initialize_transaction()
    {
        $transaction_id = $this->session->userdata('transaction_id');
        $time_frame = $this->session->userdata('time_frame');
        
        $is_valid = $transaction_id && $time_frame && 
                   (time() - $time_frame <= $this->transaction_timeout);
        
        if (!$is_valid) {
            $transaction_id = $this->Operations->OTP(9);
            $time_frame = time();
            
            $this->session->set_userdata([
                'transaction_id' => $transaction_id,
                'time_frame' => $time_frame
            ]);
            
            $this->_log_activity('New transaction initialized', [
                'transaction_id' => $transaction_id
            ]);
        }
        
        $this->transaction_id = $transaction_id;
    }
    
    private function _initialize_session()
    {
        $this->session_id = $this->session->userdata('session_id');
        
        // Extend session timeout
        $this->session->set_userdata([
            'last_activity' => time()
        ]);
    }
    
    private function _check_session_timeout()
    {
        $last_activity = $this->session->userdata('last_activity');
        if ($last_activity && (time() - $last_activity > $this->transaction_timeout)) {
            $this->_log_activity('Session timeout', [
                'last_activity' => $last_activity,
                'current_time' => time()
            ]);
            return false;
        }
        
        // Update last activity time
        $this->session->set_userdata('last_activity', time());
        return true;
    }
    
    private function _handle_api_response($response, $redirect_on_fail = 'logout', $redirect_on_success = 'home')
    {
        $this->_log_activity('API response received', ['response' => $response]);
        
        $decode = json_decode($response, true);
        
        if (!$decode) {
            $this->_log_activity('Invalid API response', ['raw_response' => $response]);
            $this->session->set_flashdata('msg', 'Invalid server response');
            redirect($redirect_on_fail);
            return false;
        }
        
        $status = $decode['status'] ?? '';
        $message = $decode['message'] ?? '';
        $data = $decode['data'] ?? [];
        
        switch ($status) {
            case 'fail':
                $this->_log_activity('API request failed', [
                    'message' => $message,
                    'data' => $data
                ]);
                $this->session->set_flashdata('msg', $message);
                redirect($redirect_on_fail);
                break;
                
            case 'success':
                $this->_log_activity('API request succeeded', [
                    'message' => $message,
                    'data' => $data
                ]);
                if ($redirect_on_success) {
                    $this->session->set_flashdata('msg', $message);
                    redirect($redirect_on_success);
                }
                return $data;
                
            case 'error':
                $this->_log_activity('API request error', [
                    'message' => $message,
                    'data' => $data
                ]);
                if ($redirect_on_success) {
                    $this->session->set_flashdata('msg', $message);
                    redirect($redirect_on_success);
                }
                return $data;
                
            default:
                $this->_log_activity('Unknown API response status', [
                    'status' => $status,
                    'message' => $message
                ]);
                $this->session->set_flashdata('msg', 'Something went wrong');
                redirect($redirect_on_fail);
        }
        
        return false;
    }
    // ========================================
    // AUTHENTICATION ROUTES
    // ========================================
    
    public function index()
    {
        $this->load->view('login');
    }
    
    public function login()
    {
        $this->load->view('login');
    }
    
    public function signup()
    {
        $this->load->view('signup');
    }
    
    // ========================================
    // DASHBOARD ROUTES
    // ========================================
    
    public function home()
    {
        if (!$this->_check_session_timeout()) {
            $this->session->set_flashdata('msg', 'Your session has expired. Please login again.');
            redirect('logout');
            return;
        }
        
        try {
            $data = $this->_get_home_data();
            
            if ($data !== false) {
                $this->load->view('includes/header');
                $this->load->view('home', $data);
                $this->load->view('includes/footer', $data);
            }
        } catch (Exception $e) {
            $this->_log_activity('Home page error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            $this->session->set_flashdata('msg', 'An error occurred while loading the page');
            redirect('logout');
        }
    }
    
    public function test()
    {
        $data = $this->_get_home_data();
        
        if ($data !== false) {
            $this->load->view('includes/header');
            $this->load->view('home_test', $data);
            $this->load->view('includes/footer_test', $data);
        }
    }
    
    public function transactions()
    {
        $data = $this->_get_home_data();
        
        if ($data !== false) {
            $this->load->view('includes/header');
            $this->load->view('transactions', $data);
            $this->load->view('includes/footer');
        }
    }
    
    public function agency()
    {
        $data = $this->_get_home_data();
        
        if ($data !== false) {
            $this->load->view('includes/header');
            $this->load->view('agent_register');
            $this->load->view('includes/footer', $data);
        }
    }
    
    /**
     * Get home data from API
     */
    private function _get_home_data()
    {
        $url = APP_INSTANCE . 'home_data';
        $body = ['session_id' => $this->session_id];
        
        $response = $this->Operations->CurlPost($url, $body);
        return $this->_handle_api_response($response, 'logout', null);
    }
    
    // ========================================
    // USER MANAGEMENT
    // ========================================
    
    public function changepassword()
    {
        $this->load->view('includes/header');
        $this->load->view('changepassword');
        $this->load->view('includes/footer');
    }
    
    public function passwordupdate()
    {
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirmpassword');
        
        // Basic validation
        if (empty($password) || empty($confirm_password)) {
            $this->session->set_flashdata('msg', 'Password fields cannot be empty');
            redirect('changepassword');
            return;
        }
        
        if ($password !== $confirm_password) {
            $this->session->set_flashdata('msg', 'Passwords do not match');
            redirect('changepassword');
            return;
        }
        
        $url = APP_INSTANCE . 'passwordupdate';
        $body = [
            'session_id' => $this->session_id,
            'password' => $password,
            'confirmpassword' => $confirm_password
        ];
        
        $response = $this->Operations->CurlPost($url, $body);
        $this->_handle_api_response($response);
    }
    
    // ========================================
    // FINANCIAL OPERATIONS
    // ========================================
    
    public function DepositFromMpesa()
    {
        $phone = $this->input->post('phone');
        $amount = $this->input->post('amount');
        
        if (empty($phone) || empty($amount) || !is_numeric($amount)) {
            $this->session->set_flashdata('msg', 'Invalid phone number or amount');
            redirect('home');
            return;
        }
        
        $url = APP_INSTANCE . 'deposit_mpesa';
        $body = [
            'session_id' => $this->session_id,
            'phone' => $phone,
            'amount' => $amount
        ];
        
        $response = $this->Operations->CurlPost($url, $body);
        $this->_handle_api_response($response);
    }
    
    public function WithdrawToMpesa()
    {
        $phone = $this->input->post('phone');
        $amount = $this->input->post('amount');
        
        if (empty($phone) || empty($amount) || !is_numeric($amount)) {
            $this->session->set_flashdata('msg', 'Invalid phone number or amount');
            redirect('home');
            return;
        }
        
        $url = APP_INSTANCE . 'mpesa_withdraw';
        $body = [
            'session_id' => $this->session_id,
            'phone' => $phone,
            'amount' => $amount
        ];
        
        $response = $this->Operations->CurlPost($url, $body);
        $this->_handle_api_response($response);
    }
    
    public function DepositToDeriv()
    {
        $cr_number = $this->input->post('crNumber');
        $amount = $this->input->post('amount');
        
        if (empty($cr_number) || empty($amount) || !is_numeric($amount)) {
            $this->session->set_flashdata('msg', 'Invalid CR number or amount');
            redirect('home');
            return;
        }
        
        // Validate amount is positive
        if ($amount <= 0) {
            $this->session->set_flashdata('msg', 'Amount must be greater than 0');
            redirect('home');
            return;
        }
        
        $url = APP_INSTANCE . 'deriv_deposit';
        $body = [
            'session_id' => $this->session_id,
            'crNumber' => strtoupper($cr_number),
            'amount' => $amount
        ];
        
        $response = $this->Operations->CurlPost($url, $body);
        $this->_handle_api_response($response);
    }
    
    public function WithdrawFromDeriv()
    {
        $cr_number = $this->input->post('crNumber_withdraw');
        $amount = $this->input->post('deriv_amount');
        
        if (empty($cr_number) || empty($amount) || !is_numeric($amount)) {
            $this->session->set_flashdata('msg', 'Invalid CR number or amount');
            redirect('home');
            return;
        }
        
        // Validate amount is positive
        if ($amount <= 0) {
            $this->session->set_flashdata('msg', 'Amount must be greater than 0');
            redirect('home');
            return;
        }
        
        $url = APP_INSTANCE . 'deriv_withdraw';
        $body = [
            'session_id' => $this->session_id,
            'crNumber' => strtoupper($cr_number),
            'amount' => $amount
        ];
        
        $response = $this->Operations->CurlPost($url, $body);
        $this->_handle_api_response($response);
    }
    
    public function p2p_transfer()
    {
        $wallet_id = $this->input->post('wallet_id');
        $send_amount = $this->input->post('amount');
        
        if (empty($wallet_id) || empty($send_amount) || !is_numeric($send_amount)) {
            $this->session->set_flashdata('msg', 'Invalid wallet ID or amount');
            redirect('home');
            return;
        }
        
        $url = APP_INSTANCE . 'send_p2p';
        $body = [
            'session_id' => $this->session_id,
            'wallet_id' => $wallet_id,
            'send_amount' => $send_amount
        ];
        
        $response = $this->Operations->CurlPost($url, $body);
        $this->_handle_api_response($response, 'home', 'home');
    }
    
    // ========================================
    // PAYMENT PROCESSING
    // ========================================
    
    public function process_checkout()
    {
        $amount = $this->input->post('amount');
        $unique_id = $this->input->post('unique_id');
        $partner_id = $this->input->post('partner_id');
        
        if (empty($amount) || empty($unique_id) || !is_numeric($amount)) {
            $this->session->set_flashdata('msg', 'Invalid checkout data');
            redirect('home');
            return;
        }
        
        // Generate secure token
        $token = $this->_generate_payment_token($amount, $unique_id, $partner_id);
        
        // Store token in session
        $this->session->set_userdata('checkout_token', $token);
        
        // Redirect to external payment gateway
        redirect("https://stepakash.com/login");
    }
    
    public function stepakash_callback()
    {
        $token = $this->session->userdata('checkout_token');
        
        if (!$token) {
            $this->session->set_flashdata('msg', 'Invalid payment session');
            redirect('home');
            return;
        }
        
        $decoded_data = $this->_decode_payment_token($token);
        
        if ($this->_validate_payment_data($decoded_data)) {
            $this->_complete_payment($decoded_data);
        } else {
            $this->session->set_flashdata('msg', 'Invalid payment data');
            redirect('home');
        }
    }
    
    public function payment_form()
    {
        $token = $this->session->userdata('checkout_token');
        
        if (!$token) {
            redirect('home');
            return;
        }
        
        $decoded_data = $this->_decode_payment_token($token);
        
        if ($this->_validate_payment_data($decoded_data)) {
            $data = [
                'amount' => $decoded_data['amount'],
                'uniqueId' => $decoded_data['uniqueId'],
                'partner_id' => $decoded_data['partner_id']
            ];
            
            $this->load->view('includes/header');
            $this->load->view('checkout_confirmation', $data);
            $this->load->view('includes/footer_test');
        } else {
            $this->session->set_flashdata('msg', 'Invalid payment session');
            redirect('home');
        }
    }
    
    public function payment_confirmation()
    {
        $unique_id = $this->input->post('unique_id');
        $partner_id = $this->input->post('partner_id');
        $amount = $this->input->post('amount');
        
        if (empty($unique_id) || empty($partner_id) || empty($amount)) {
            $this->session->set_flashdata('msg', 'Invalid payment data');
            redirect('home');
            return;
        }
        
        $url = APP_INSTANCE . 'pay_now';
        $body = [
            'partner_id' => $partner_id,
            'amount' => $amount,
            'session_id' => $this->session_id
        ];
        
        $response = $this->Operations->CurlPost($url, $body);
        $this->_handle_api_response($response, 'logout', null);
        
        // Clear checkout token after successful payment
        $this->session->unset_userdata('checkout_token');
        redirect('home');
    }
    
    // ========================================
    // PAYMENT HELPER METHODS
    // ========================================
    
    /**
     * Generate encrypted payment token
     */
    private function _generate_payment_token($amount, $unique_id, $partner_id)
    {
        $data = [
            'amount' => $amount,
            'uniqueId' => $unique_id,
            'partner_id' => $partner_id,
            'timestamp' => time()
        ];
        
        return $this->encryption->encrypt(json_encode($data));
    }
    
    /**
     * Decode payment token
     */
    private function _decode_payment_token($token)
    {
        try {
            $decrypted = $this->encryption->decrypt($token);
            return json_decode($decrypted, true);
        } catch (Exception $e) {
            return false;
        }
    }
    
    /**
     * Validate payment token data
     */
    private function _validate_payment_data($data)
    {
        if (!is_array($data)) {
            return false;
        }
        
        // Check required fields
        $required_fields = ['amount', 'partner_id', 'uniqueId'];
        foreach ($required_fields as $field) {
            if (!isset($data[$field])) {
                return false;
            }
        }
        
        // Validate amount
        if (!is_numeric($data['amount']) || $data['amount'] <= 0) {
            return false;
        }
        
        // Check token age (prevent replay attacks)
        if (isset($data['timestamp'])) {
            $token_age = time() - $data['timestamp'];
            if ($token_age > 3600) { // 1 hour timeout
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * Complete payment processing
     */
    private function _complete_payment($data)
    {
        // Process payment with validated data
        $this->session->set_flashdata('msg', 'Payment completed successfully!');
        redirect('home');
    }
    
    // ========================================
    // TESTING/DEBUG METHODS
    // ========================================
    
    public function mytest()
    {
        // For testing purposes only
        echo "Transaction ID: " . $this->transaction_id;
    }
    
    public function invoice_payment()
    {
        // Placeholder for invoice payment functionality
        // TODO: Implement invoice payment logic
    }
}