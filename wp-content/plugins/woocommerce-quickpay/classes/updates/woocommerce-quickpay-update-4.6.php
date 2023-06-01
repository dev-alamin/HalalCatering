<?php
/**
* Update WC_QuickPay to 4.6
*
* @author 	PerfectSolution
* @version  1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Ignore user aborts and allow the script to run forever if supported
ignore_user_abort( TRUE );
set_time_limit( 0 );


global $wpdb;

$subscriptions = $wpdb->get_results("SELECT * FROM {$wpdb->posts} p WHERE p.post_type = 'shop_subscription' AND p.post_status NOT IN ('draft', 'trash') AND NOT EXISTS(SELECT 1 FROM {$wpdb->postmeta} pm WHERE p.ID=pm.post_id AND pm.meta_key IN ('_transaction_id', 'TRANSACTION_ID'))", OBJECT);

if (!empty($subscriptions)) {
    foreach( $subscriptions as $subscription_post ) {
        // Change from DB object to a QP Order object
        $subscription = new WC_QuickPay_Order($subscription_post->ID);
        // Create order object
        $order = new WC_QuickPay_Order($subscription_post->post_parent);
        $transaction_id = $order->get_transaction_id();

        $order_id = $order->get_id();
        $subscription_id = $subscription->get_id();

        if (!empty($transaction_id) && $order->has_quickpay_payment()) {
            $logger = new WC_QuickPay_Log();
            $transaction = new WC_QuickPay_API_Subscription();

            try {
                // Check if the transaction ID is actually a transaction of type subscription. If not, an exception will be thrown.
                $response = $transaction->get($transaction_id);

                // Set the transaction ID on the parent order
                $subscription->set_transaction_id($transaction_id);
                

                // Cleanup: Remove the IDs from the parent order
                delete_post_meta($order_id, '_transaction_id', $transaction_id);
                delete_post_meta($order_id, 'TRANSACTION_ID', $transaction_id);
                

                $logger->add(sprintf('Migrated transaction (%d) from parent order ID: %s to subscription order ID: %s', $transaction_id, $subscription_id, $order_id));
            } catch( QuickPay_API_Exception $e ) {
                $logger->add(sprintf('Failed migration of transaction (%d) from parent order ID: %s to subscription order ID: %s. Error: %s', $transaction_id, $subscription_id, $order_id, $e->getMessage()));
            }
        }
    }
}

