<?php
/**
 * Auth Controller API Test Script
 * 
 * This script tests all endpoints of the Auth controller by sending real requests
 * to your backend and displaying the responses in a user-friendly format.
 */

// Configuration
define('API_BASE_URL', 'http://localhost/stepakashapi/index.php/Auth/');
date_default_timezone_set('Africa/Nairobi');

// Test Data - Modify these according to your test cases
$testData = [
    'existing_user' => [
        'phone' => '+254712345678',
        'password' => 'correctpassword'
    ],
    'new_user' => [
        'phone' => '+254798765432',
        'password' => 'newpassword123',
        'confirmpassword' => 'newpassword123',
        'account_number' => 'CR12345678'
    ],
    'admin_user' => [
        'email' => 'admin@example.com',
        'password' => 'adminpassword'
    ]
];

/**
 * Make API request with proper headers and data
 */
function makeApiRequest($endpoint, $data = [], $method = 'POST') {
    $url = API_BASE_URL . $endpoint;
    
    $ch = curl_init();
    
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json'
        ],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HEADER => true
    ];
    
    if ($method === 'POST') {
        $options[CURLOPT_POSTFIELDS] = json_encode($data);
    }
    
    curl_setopt_array($ch, $options);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    
    curl_close($ch);
    
    return [
        'http_code' => $httpCode,
        'headers' => $headers,
        'body' => $body,
        'json' => json_decode($body, true)
    ];
}

/**
 * Display test results in a formatted way
 */
function displayTestResult($testName, $result) {
    $statusClass = ($result['http_code'] >= 200 && $result['http_code'] < 300) ? 'success' : 'error';
    
    echo "<div class='test-result $statusClass'>";
    echo "<h3>$testName</h3>";
    echo "<p><strong>Status Code:</strong> {$result['http_code']}</p>";
    echo "<p><strong>URL:</strong> " . htmlspecialchars(API_BASE_URL . $testName) . "</p>";
    
    echo "<h4>Request Data:</h4>";
    echo "<pre>" . json_encode($GLOBALS['lastRequestData'], JSON_PRETTY_PRINT) . "</pre>";
    
    echo "<h4>Response:</h4>";
    if (isset($result['json'])) {
        echo "<pre>" . json_encode($result['json'], JSON_PRETTY_PRINT) . "</pre>";
    } else {
        echo "<pre>" . htmlspecialchars($result['body']) . "</pre>";
    }
    
    if ($result['http_code'] >= 400) {
        echo "<p class='error-message'><strong>Error:</strong> " . 
             htmlspecialchars($result['json']['message'] ?? 'Unknown error') . "</p>";
    }
    
    echo "</div>";
}

// Run tests when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedTests = $_POST['tests'] ?? [];
    
    echo "<div class='test-results-container'>";
    echo "<h2>Test Results</h2>";
    
    // Login Test
    if (in_array('login', $selectedTests)) {
        $GLOBALS['lastRequestData'] = [
            'phone' => $testData['existing_user']['phone'],
            'password' => $testData['existing_user']['password'],
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ];
        
        $result = makeApiRequest('login', $GLOBALS['lastRequestData']);
        displayTestResult('login', $result);
        
        // Store session data if login was successful
        if ($result['http_code'] === 200 && $result['json']['status'] === 'success') {
            $GLOBALS['userSession'] = $result['json']['data'];
        }
    }
    
    // Failed Login Test
    if (in_array('failed_login', $selectedTests)) {
        $GLOBALS['lastRequestData'] = [
            'phone' => $testData['existing_user']['phone'],
            'password' => 'wrongpassword',
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ];
        
        $result = makeApiRequest('login', $GLOBALS['lastRequestData']);
        displayTestResult('failed_login', $result);
    }
    
    // Signup Test
    if (in_array('signup', $selectedTests)) {
        $GLOBALS['lastRequestData'] = $testData['new_user'];
        $result = makeApiRequest('CreateAccount', $GLOBALS['lastRequestData']);
        displayTestResult('CreateAccount', $result);
    }
    
    // Send OTP Test
    if (in_array('sendotp', $selectedTests)) {
        $GLOBALS['lastRequestData'] = [
            'phone' => $testData['existing_user']['phone']
        ];
        
        $result = makeApiRequest('sendotp', $GLOBALS['lastRequestData']);
        displayTestResult('sendotp', $result);
        
        // Store OTP data if successful
        if ($result['http_code'] === 200 && $result['json']['status'] === 'success') {
            $GLOBALS['otpData'] = $result['json']['data'];
        }
    }
    
    // Verify OTP Test (requires successful sendotp first)
    if (in_array('verifyotp', $selectedTests) && isset($GLOBALS['otpData'])) {
        $GLOBALS['lastRequestData'] = [
            'otp' => $GLOBALS['otpData']['otp']
        ];
        
        $result = makeApiRequest('verifyOtp', $GLOBALS['lastRequestData']);
        displayTestResult('verifyOtp', $result);
    }
    
    // Admin Login Test
    if (in_array('adminLogin', $selectedTests)) {
        $GLOBALS['lastRequestData'] = $testData['admin_user'];
        $result = makeApiRequest('adminLogin', $GLOBALS['lastRequestData']);
        displayTestResult('adminLogin', $result);
    }
    
    // Get User IP Test
    if (in_array('getUserIP', $selectedTests)) {
        $result = makeApiRequest('getUserIP', [], 'GET');
        displayTestResult('getUserIP', $result);
    }
    
    echo "</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Auth Controller API Tester</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2, h3 {
            color: #333;
        }
        .test-form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .test-option {
            margin: 10px 0;
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #45a049;
        }
        .test-results-container {
            margin-top: 30px;
        }
        .test-result {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border-left: 5px solid #ddd;
        }
        .success {
            border-color: #4CAF50;
            background-color: #e8f5e9;
        }
        .error {
            border-color: #f44336;
            background-color: #ffebee;
        }
        .error-message {
            color: #f44336;
            font-weight: bold;
        }
        pre {
            background: #f5f5f5;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        .notes {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Auth Controller API Tester</h1>
        
        <form method="post" class="test-form">
            <h2>Select Tests to Run</h2>
            
            <div class="test-option">
                <input type="checkbox" id="login" name="tests[]" value="login" checked>
                <label for="login">Login Test (Success)</label>
            </div>
            
            <div class="test-option">
                <input type="checkbox" id="failed_login" name="tests[]" value="failed_login" checked>
                <label for="failed_login">Failed Login Test</label>
            </div>
            
            <div class="test-option">
                <input type="checkbox" id="signup" name="tests[]" value="signup" checked>
                <label for="signup">Signup Test</label>
            </div>
            
            <div class="test-option">
                <input type="checkbox" id="sendotp" name="tests[]" value="sendotp" checked>
                <label for="sendotp">Send OTP Test</label>
            </div>
            
            <div class="test-option">
                <input type="checkbox" id="verifyotp" name="tests[]" value="verifyotp" checked>
                <label for="verifyotp">Verify OTP Test</label>
            </div>
            
            <div class="test-option">
                <input type="checkbox" id="adminLogin" name="tests[]" value="adminLogin">
                <label for="adminLogin">Admin Login Test</label>
            </div>
            
            <div class="test-option">
                <input type="checkbox" id="getUserIP" name="tests[]" value="getUserIP">
                <label for="getUserIP">Get User IP Test</label>
            </div>
            
            <button type="submit">Run Selected Tests</button>
        </form>
        
        <div class="notes">
            <h3>Test Notes:</h3>
            <ul>
                <li>Before running tests, update the <code>API_BASE_URL</code> and <code>$testData</code> in the script</li>
                <li>The script tests both successful and failed scenarios</li>
                <li>Some tests depend on previous tests (e.g., verify OTP requires send OTP first)</li>
                <li>All responses are displayed with status codes and formatted JSON</li>
                <li>Error messages are highlighted for easy identification</li>
            </ul>
        </div>
    </div>
</body>
</html>