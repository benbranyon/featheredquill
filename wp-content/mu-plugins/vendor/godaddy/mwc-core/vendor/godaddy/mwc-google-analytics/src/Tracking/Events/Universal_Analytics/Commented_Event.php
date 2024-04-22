<?php
/**
 * Google Analytics
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Google Analytics to newer
 * versions in the future. If you wish to customize Google Analytics for your
 * needs please refer to https://help.godaddy.com/help/40882 for more information.
 *
 * @author      SkyVerge
 * @copyright   Copyright (c) 2015-2024, SkyVerge, Inc.
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

namespace GoDaddy\WordPress\MWC\GoogleAnalytics\Tracking\Events\Universal_Analytics;

use GoDaddy\WordPress\MWC\GoogleAnalytics\Tracking\Events\Universal_Analytics_Event;

defined( 'ABSPATH' ) or exit;

/**
 * The "commented" event.
 *
 * @since 3.0.0
 */
class Commented_Event extends Universal_Analytics_Event {


	/** @var string the event ID */
	public const ID = 'commented';


	/**
	 * @inheritdoc
	 */
	public function get_form_field_title(): string {

		return __( 'Commented', 'woocommerce-google-analytics-pro' );
	}


	/**
	 * @inheritdoc
	 */
	public function get_form_field_description(): string {

		return __( 'Triggered when a customer writes a comment.', 'woocommerce-google-analytics-pro' );
	}


	/**
	 * @inheritdoc
	 */
	public function get_default_name(): string {

		return 'commented';
	}


	/**
	 * @inheritdoc
	 */
	public function register_hooks() : void {

		add_action( 'comment_post', [ $this, 'track' ], 10, 3 );
	}


	/**
	 * @inheritdoc
	 *
	 * @param null $comment_ID
	 * @param null $comment_approved
	 * @param array $commentdata
	 */
	public function track( $comment_ID = null, $comment_approved = null, $commentdata = [] ) : void {

		$post_id = $commentdata['comment_post_ID'] ?: null;

		if ( ! $post_id || 'post' !== get_post_type( $post_id ) ) {
			return;
		}

		$this->record_via_api( [
			'eventCategory' => 'Post',
			'eventLabel'    => get_the_title( $post_id ),
		] );
	}


}
