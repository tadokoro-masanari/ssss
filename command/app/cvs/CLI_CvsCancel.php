<?php

namespace App\cvs;

use tgMdk\dto\CvsCancelRequestDto;
use tgMdk\TGMDK_Transaction;

/*
 * コンビニ決済 取消要求サンプル
 * Created on 2010/02/17
 * 
 */


define('TXN_FAILURE_CODE', 'failure');
define('TXN_PENDING_CODE', 'pending');
define('TXN_SUCCESS_CODE', 'success');

define('SEVEN_ELEVEN_CODE', 'sej');
define('E_CONTEXT_CODE', 'econ');
define('WELL_NET_CODE', 'other');

require_once("../../vendor/autoload.php");
require_once("../LoggerDefine.php");

/**
 * 対象取引のコンビニエンスストアの分類を指定
 */
$service_option_type = SEVEN_ELEVEN_CODE;

/**
 * 取引ID
 * 申込時の取引IDを指定
 */
$order_id = "";

/**
 * 要求電文パラメータ値の指定
 */
$request_data = new CvsCancelRequestDto();

$request_data->setServiceOptionType($service_option_type);
$request_data->setOrderId($order_id);

/**
 * 実施
 */
$transaction = new TGMDK_Transaction();
$response_data = $transaction->execute($request_data);

/**
 * 結果コード取得
 */
$txn_status = $response_data->getMStatus();
/**
 * 詳細コード取得
 */
$txn_result_code = $response_data->getVResultCode();
/**
 * エラーメッセージ取得
 */
$error_message = $response_data->getMerrMsg();

/**
 * 結果表示
 */
// 成功
if (TXN_SUCCESS_CODE === $txn_status) {
    echo $txn_status . "\n";
    echo "Transaction Successfully Complete\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Order ID]: " . $response_data->getOrderId() . "\n";
    //ペンディング
} else if (TXN_PENDING_CODE === $txn_status) {
    echo $txn_status . "\n";
    echo "Transaction Pending\n";
    echo "[Message]: " . $error_message . "\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Order ID]: " . $response_data->getOrderId() . "\n";
    echo "Check log file for more information\n";
    // 失敗
} else if (TXN_FAILURE_CODE === $txn_status) {
    echo $txn_status . "\n";
    echo "Transaction Failure\n";
    echo "[Message]: " . $error_message . "\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Order ID]: " . $response_data->getOrderId() . "\n";
    echo "Check log file for more information\n";
}

