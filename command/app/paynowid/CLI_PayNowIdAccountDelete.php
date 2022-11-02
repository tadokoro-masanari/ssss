<?php

namespace App\paynowid;

use tgMdk\dto\AccountDeleteRequestDto;
use tgMdk\TGMDK_Transaction;

/*
 * PayNowId(会員退会)処理サンプル
 * Created on 2014/01/20
 */


/**
 * PayNowIDステータスコード
 */
define('PAY_NOW_ID_FAILURE_CODE', 'failure');
define('PAY_NOW_ID_PENDING_CODE', 'pending');
define('PAY_NOW_ID_SUCCESS_CODE', 'success');

require_once("../../vendor/autoload.php");
require_once("../LoggerDefine.php");

/**
 * 会員ID
 */
$account_id = "testAccount";

/**
 * 退会年月日
 */
$delete_date = date('Ymd');

/**
 * 要求電文パラメータ値の指定
 */
$request_data = new AccountDeleteRequestDto();
$request_data->setAccountId($account_id);
$request_data->setDeleteDate($delete_date);

/**
 * 実施
 */
$transaction = new TGMDK_Transaction();
$response_data = $transaction->execute($request_data);

/**
 * PayNowIDレスポンス取得
 */
$pay_now_id_res = $response_data->getPayNowIdResponse();

if (isset($pay_now_id_res)) {
    /**
     * PayNowID処理番号取得
     */
    $process_id = $pay_now_id_res->getProcessId();
    /**
     * PayNowIDステータス取得
     */
    $pay_now_id_status = $pay_now_id_res->getStatus();
}

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
if (PAY_NOW_ID_SUCCESS_CODE === $pay_now_id_status) {
    echo $pay_now_id_status . "\n";
    echo "Transaction Successfully Complete\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Process ID]: " . $process_id . "\n";
//ペンディング
} else if (PAY_NOW_ID_PENDING_CODE === $pay_now_id_status) {
    echo $pay_now_id_status . "\n";
    echo "Transaction Pending\n";
    echo "[Message]: " . $error_message . "\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Process ID]: " . $process_id . "\n";
    echo "Check log file for more information\n";
// 失敗
} else if (PAY_NOW_ID_FAILURE_CODE === $pay_now_id_status) {
    echo $pay_now_id_status . "\n";
    echo "Transaction Failure\n";
    echo "[Message]: " . $error_message . "\n";
    echo "[Result Code]: " . $txn_result_code . "\n";
    echo "[Process ID]: " . $process_id . "\n";
    echo "Check log file for more information\n";
}

