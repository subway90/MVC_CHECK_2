<?php

require 'vendor/autoload.php'; // Tải thư viện Google API

// Khởi tạo Google Client
$client = new Google_Client();
$client->setApplicationName('Google Sheets API PHP');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig(SHEET_JSON_FILE);
$client->setAccessType('offline');
$service = new Google_Service_Sheets($client);

# [VARIABLE]

# [HANDLE]

// get input
if(isset($_POST['input_key']) && $_POST['input_key']) $input_key = mb_strtolower($_POST['input_key'],'UTF-8');
// toast error
else {
    toast_create('danger','Vui lòng nhập số điện thoại của bạn');
    route();
}

// save input
$_SESSION['temp']['input'] = $input_key;




// condition call API : null data OR time query < duration time
if(empty($_SESSION['data']) || (time() - $_SESSION['temp']['time']) > REQUEST_API_TIME) {

    // call API get data from GG Sheet
    try {
        // query get
        $response = $service->spreadsheets_values->get(SHEET_ID, 'Info!A2:I');
        
        // get values
        $_SESSION['data'] = $response->getValues(); 

        // checks exist
        if (empty($_SESSION['data'])) {
            toast_create('danger', '[WARNING] Dữ liệu bảng Sheet đang trống !');
            route();
        }

        // save time call API
        $_SESSION['temp']['time'] = time();

    }
    catch (Google_Service_Exception $e) {
        // error 429: too many request in time
        if ($e->getCode() == 429) {
            toast_create('danger', 'Hệ thống đang quá tải !Vui lòng thử lại sau '.REQUEST_API_TIME.' giây');
            route();
        }else die($e);
    }
}

// handle check
foreach ($_SESSION['data'] as $row) {
    // reset old result & roomate
    $_SESSION['temp']['result'] = null;
    $_SESSION['temp']['roomate'] = null;
    // find input
    if($input_key === ltrim($row[1],"'")) {
        // save in session temp
        $_SESSION['temp']['result'] = $row;

        // find together
        foreach ($_SESSION['data'] as $row_2) {
            // cùng phòng, khác SĐT
            if(isset($row_2[8])) if($row_2[8] == $_SESSION['temp']['result'][8] && $row_2[1] !== $_SESSION['temp']['result'][1]) $_SESSION['temp']['roomate'][] = $row_2;
        }
        // kết thúc vòng lặp find input
        break;
    }
}

// route
if(empty($_SESSION['temp']['result'])) {
    toast_create('danger','Không tìm thấy thông tin của Số điện thoại này');
    route();
}else {
    route('result');
}