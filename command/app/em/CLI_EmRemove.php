<?php

namespace App\em;

use tgMdk\dto\EmRemoveRequestDto;
use tgMdk\TGMDK_Transaction;

/*
 * 電子マネー決済 カード削除要求サンプル
 * Created on 2014/05/01
 *
 */


/**
 * ステータスコード
 */
define('TXN_FAILURE_CODE', 'failure');
define('TXN_PENDING_CODE', 'pending');
define('TXN_SUCCESS_CODE', 'success');

require_once("../../vendor/autoload.php");
require_once("../LoggerDefine.php");

/**
 * 決済方式
 *
 * nanaco決済 : tcc-redirect
 */
$service_option_type = "tcc-redirect";

/**
 * 取引ID
 * 申込実施時の対象取引IDを指定
 */
$order_id = "dummy";

/**
 * ユーザID
 */
$user_id = "user001";

/**
 * 要求電文パラメータ値の指定
 */
$request_data = new EmRemoveRequestDto();
$request_data->setServiceOptionType($service_option_type);
$request_data->setOrderId($order_id);
$request_data->setUserId($user_id);

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
if (TXN_SUCCESS_CODE === $txn_status) {
    // 成功
    echo $txn_status . "\n";
    echo "Transaction Successfully Complete\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Order ID]: " . $response_data->getOrderId() . "\n";

} else if (TXN_PENDING_CODE === $txn_status) {
    //ペンディング
    echo $txn_status . "\n";
    echo "Transaction Pending\n";
    echo "[Message]: " . $error_message . "\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Order ID]: " . $response_data->getOrderId() . "\n";
    echo "Check log file for more information\n";

} else if (TXN_FAILURE_CODE === $txn_status) {
    // 失敗
    echo $txn_status . "\n";
    echo "Transaction Failure\n";
    echo "[Message]: " . $error_message . "\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Order ID]: " . $response_data->getOrderId() . "\n";
    echo "Check log file for more information\n";
}

