<?php

namespace App\rakuten;

use tgMdk\dto\RakutenAuthorizeRequestDto;
use tgMdk\TGMDK_Transaction;

/*
 * 楽天ID決済 与信要求サンプル
 * Created on 2014/10/02
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
 * 取引ID
 */
$order_id = "dummy" . time();

/**
 * 同時売上実施有無
 */
$is_with_capture = "false";

/**
 * 支払金額
 */
$payment_amount = "100";

/**
 * 商品番号
 */
$item_id = "123456";

/**
 * 商品名
 */
$item_name = "sample商品";

/**
 * 要求電文パラメータ値の指定
 */
$request_data = new RakutenAuthorizeRequestDto();

$request_data->setOrderId($order_id);
$request_data->setWithCapture($is_with_capture);
$request_data->setAmount($payment_amount);
$request_data->setItemId($item_id);
$request_data->setItemName($item_name);


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

