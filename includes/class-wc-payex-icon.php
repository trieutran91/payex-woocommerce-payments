<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Payex_Icon {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'woocommerce_gateway_icon', array( $this, 'gateway_icon' ), 60, 2 );
		add_action( 'woocommerce_init', array( $this, 'woocommerce_init' ), 100 );
	}

	/**
	 * WooCommerce Init
	 */
	public function woocommerce_init() {
		$gateways = WC()->payment_gateways()->get_available_payment_gateways();
		foreach ( $gateways as $payment_id => $gateway ) {
			if ( strpos( $payment_id, 'payex_' ) !== false ) {
				add_filter( 'woocommerce_settings_api_form_fields_' . $payment_id, array(
					$this,
					'add_icon_settings'
				) );
			}
		}
	}

	/**
	 * Add settings
	 *
	 * @param $form_fields
	 *
	 * @return mixed
	 */
	public function add_icon_settings( $form_fields ) {
		$form_fields['gateway_icon'] = array(
			'title' => __( 'Checkout Icon', 'payex-woocommerce-payments' ),
			'type' => 'text',
			'description' => __( 'Enter an image URL to change the icon.', 'payex-woocommerce-payments' ),
			'desc_tip' => true,
			'default' => '',
		);

		return $form_fields;
	}

	/**
	 * Change Icon HTML
	 *
	 * @param $icon
	 * @param $payment_id
	 *
	 * @return string
	 */
	public function gateway_icon( $icon, $payment_id ) {
		if ( strpos( $payment_id, 'payex_' ) !== false ) {
			$gateway = px_payment_method( $payment_id );
			if ( $gateway && ! empty( $gateway->settings['gateway_icon'] ) ) {
				$icon = self::modify_img( $icon, $gateway->settings['gateway_icon'] );
			}

			return $icon;
		}

		return $icon;
	}

	/**
	 * Override IMGs in HTML
	 *
	 * @param $html
	 * @param $img_url
	 *
	 * @return string
	 */
	public static function modify_img( $html, $img_url ) {
		$doc = new DOMDocument();
		$doc->loadHTML( $html );
		$tags = $doc->getElementsByTagName( 'img' );
		if ( count( $tags ) > 0 ) {
			foreach ( $tags as $tag ) {
				$tag->setAttribute( 'src', $img_url );
			}

			return $doc->saveHTML();
		}

		return $html;
	}
}

new WC_Payex_Icon();
