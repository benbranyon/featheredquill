<?php
/**
 * Class for managing plugin data
 */
class Ts_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return apply_filters( 'ts/data/groups', array(
				'all'     => __( 'All', 'themestall' ),
				'content' => __( 'Content', 'themestall' ),
				'box'     => __( 'Box', 'themestall' ),
				'media'   => __( 'Media', 'themestall' ),
				'gallery' => __( 'Gallery', 'themestall' ),
				'data'    => __( 'Data', 'themestall' ),
				'themestall'    => __( 'ThemeStall', 'themestall' ),
				'other'   => __( 'Other', 'themestall' )
			) );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return apply_filters( 'ts/data/borders', array(
				'none'   => __( 'None', 'themestall' ),
				'solid'  => __( 'Solid', 'themestall' ),
				'dotted' => __( 'Dotted', 'themestall' ),
				'dashed' => __( 'Dashed', 'themestall' ),
				'double' => __( 'Double', 'themestall' ),
				'groove' => __( 'Groove', 'themestall' ),
				'ridge'  => __( 'Ridge', 'themestall' )
			) );
	}

	/**
	 * Font-Awesome icons
	 */
	public static function icons() {
		return apply_filters( 'ts/data/icons', array( 'adjust', 'adn', 'align-center', 'align-justify', 'align-left', 'align-right', 'ambulance', 'anchor', 'android', 'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'apple', 'archive', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'asterisk', 'automobile', 'backward', 'ban', 'bank', 'bar-chart-o', 'barcode', 'bars', 'beer', 'behance', 'behance-square', 'bell', 'bell-o', 'bitbucket', 'bitbucket-square', 'bitcoin', 'bold', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'briefcase', 'btc', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'cab', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'certificate', 'chain', 'chain-broken', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clipboard', 'clock-o', 'cloud', 'cloud-download', 'cloud-upload', 'cny', 'code', 'code-fork', 'codepen', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment-o', 'comments', 'comments-o', 'compass', 'compress', 'copy', 'credit-card', 'crop', 'crosshairs', 'css3', 'cube', 'cubes', 'cut', 'cutlery', 'dashboard', 'database', 'dedent', 'delicious', 'desktop', 'deviantart', 'digg', 'dollar', 'dot-circle-o', 'download', 'dribbble', 'dropbox', 'drupal', 'edit', 'eject', 'ellipsis-h', 'ellipsis-v', 'empire', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'eur', 'euro', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'expand', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'facebook', 'facebook-square', 'fast-backward', 'fast-forward', 'fax', 'female', 'fighter-jet', 'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'files-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'flickr', 'floppy-o', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'font', 'forward', 'foursquare', 'frown-o', 'gamepad', 'gavel', 'gbp', 'ge', 'gear', 'gears', 'gift', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'glass', 'globe', 'google', 'google-plus', 'google-plus-square', 'graduation-cap', 'group', 'h-square', 'hacker-news', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hdd-o', 'header', 'headphones', 'heart', 'heart-o', 'history', 'home', 'hospital-o', 'html5', 'image', 'inbox', 'indent', 'info', 'info-circle', 'inr', 'instagram', 'institution', 'italic', 'joomla', 'jpy', 'jsfiddle', 'key', 'keyboard-o', 'krw', 'language', 'laptop', 'leaf', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-ring', 'life-saver', 'lightbulb-o', 'link', 'linkedin', 'linkedin-square', 'linux', 'list', 'list-alt', 'list-ol', 'list-ul', 'location-arrow', 'lock', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map-marker', 'maxcdn', 'medkit', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'mobile-phone', 'money', 'moon-o', 'mortar-board', 'music', 'navicon', 'openid', 'outdent', 'pagelines', 'paper-plane', 'paper-plane-o', 'paperclip', 'paragraph', 'paste', 'pause', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'phone', 'phone-square', 'photo', 'picture-o', 'pied-piper', 'pied-piper-alt', 'pied-piper-square', 'pinterest', 'pinterest-square', 'plane', 'play', 'play-circle', 'play-circle-o', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qq', 'qrcode', 'question', 'question-circle', 'quote-left', 'quote-right', 'ra', 'random', 'rebel', 'recycle', 'reddit', 'reddit-square', 'refresh', 'renren', 'reorder', 'repeat', 'reply', 'reply-all', 'retweet', 'rmb', 'road', 'rocket', 'rotate-left', 'rotate-right', 'rouble', 'rss', 'rss-square', 'rub', 'ruble', 'rupee', 'save', 'scissors', 'search', 'search-minus', 'search-plus', 'send', 'send-o', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart', 'sign-in', 'sign-out', 'signal', 'sitemap', 'skype', 'slack', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'soundcloud', 'space-shuttle', 'spinner', 'spoon', 'spotify', 'square', 'square-o', 'stack-exchange', 'stack-overflow', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'steam', 'steam-square', 'step-backward', 'step-forward', 'stethoscope', 'stop', 'strikethrough', 'stumbleupon', 'stumbleupon-circle', 'subscript', 'suitcase', 'sun-o', 'superscript', 'support', 'table', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'tencent-weibo', 'terminal', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-right', 'toggle-up', 'trash-o', 'tree', 'trello', 'trophy', 'truck', 'try', 'tumblr', 'tumblr-square', 'turkish-lira', 'twitter', 'twitter-square', 'umbrella', 'underline', 'undo', 'university', 'unlink', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'usd', 'user', 'user-md', 'users', 'video-camera', 'vimeo-square', 'vine', 'vk', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wechat', 'weibo', 'weixin', 'wheelchair', 'windows', 'won', 'wordpress', 'wrench', 'xing', 'xing-square', 'yahoo', 'yen', 'youtube', 'youtube-play', 'youtube-square', 'bluetooth', 'bluetooth-b', 'codiepie','credit-card-alt', 'edge', 'fort-awesome', 'hashtag', 'mixcloud', 'modx', 'pause-circle', 'pause-circle-o', 'percent', 'product-hunt', 'reddit-alien', 'scribd', 'shopping-bag', 'shopping-basket', 'stop-circle', 'stop-circle-o', 'usb' ) );
	}

	/**
	 * Animate.css animations
	 */
	public static function animations() {
		return apply_filters( 'ts/data/animations', array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutLeft', 'slideOutRight', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut' ) );
	}

	/**
	 * Examples section
	 */
	public static function examples() {
		return apply_filters( 'ts/data/examples', array(
				'basic' => array(
					'title' => __( 'Basic examples', 'themestall' ),
					'items' => array(
						array(
							'name' => __( 'Accordions, spoilers, different styles, anchors', 'themestall' ),
							'id'   => 'spoilers',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/spoilers.example',
							'icon' => 'tasks'
						),
						array(
							'name' => __( 'Tabs, vertical tabs, tab anchors', 'themestall' ),
							'id'   => 'tabs',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/tabs.example',
							'icon' => 'folder'
						),
						array(
							'name' => __( 'Column layouts', 'themestall' ),
							'id'   => 'columns',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/columns.example',
							'icon' => 'th-large'
						),
						array(
							'name' => __( 'Media elements, YouTube, Vimeo, Screenr and self-hosted videos, audio player', 'themestall' ),
							'id'   => 'media',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/media.example',
							'icon' => 'play-circle'
						),
						array(
							'name' => __( 'Unlimited buttons', 'themestall' ),
							'id'   => 'buttons',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/buttons.example',
							'icon' => 'heart'
						),
						array(
							'name' => __( 'Animations', 'themestall' ),
							'id'   => 'animations',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/animations.example',
							'icon' => 'bolt'
						),
					)
				),
				'advanced' => array(
					'title' => __( 'Advanced examples', 'themestall' ),
					'items' => array(
						array(
							'name' => __( 'Interacting with posts shortcode', 'themestall' ),
							'id' => 'posts',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/posts.example',
							'icon' => 'list'
						),
						array(
							'name' => __( 'Nested shortcodes, shortcodes inside of attributes', 'themestall' ),
							'id' => 'nested',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/nested.example',
							'icon' => 'indent'
						),
					)
				),
			) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		$shortcodes = apply_filters( 'ts/data/shortcodes', array(
				// heading
				'heading' => array(
					'name' => __( 'Heading', 'themestall' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'tag' => array(
							'type' => 'select',
							'values' => array(
								'h1' => __( 'H1', 'themestall' ),
								'h2' => __( 'H2', 'themestall' ),
								'h3' => __( 'H3', 'themestall' ),
								'h4' => __( 'H4', 'themestall' ),
								'h5' => __( 'H5', 'themestall' ),
								'h6' => __( 'H6', 'themestall' ),
							),
							'default' => 'h2',
							'name' => __( 'Select Tag', 'themestall' ),
							'desc' => __( 'Choose heading tag for this heading', 'themestall' ) 
						),
						'size' => array(
							'type' => 'slider',
							'min' => 7,
							'max' => 90,
							'step' => 1,
							'default' => 48,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Select heading size (pixels)', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Color', 'themestall' ),
							'desc' => __( 'Select heading color', 'themestall' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'themestall' ),
								'center' => __( 'Center', 'themestall' ),
								'right' => __( 'Right', 'themestall' )
							),
							'default' => 'center',
							'name' => __( 'Align', 'themestall' ),
							'desc' => __( 'Heading text alignment', 'themestall' )
						),
						'margin_top' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 20,
							'name' => __( 'Margin Top', 'themestall' ),
							'desc' => __( 'Top margin (pixels)', 'themestall' )
						),
						'margin_bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 20,
							'name' => __( 'Margin Bottom', 'themestall' ),
							'desc' => __( 'Bottom margin (pixels)', 'themestall' )
						),
						'text_transform' => array(
							'type' => 'select',
							'values' => array(
								'uppercase' => __( 'Uppercase', 'themestall' ),
								'lowercase' => __( 'Lowercase', 'themestall' ),
								'capitalize' => __( 'Capitalize', 'themestall' ),
							),
							'default' => 'uppercase',
							'name' => __( 'Text Tranform', 'themestall' ),
							'desc' => __( 'Choose a text transform style', 'themestall' )
						),
						'letter_spacing' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 28,
							'name' => __( 'Letter Spacing', 'themestall' ),
							'desc' => __( 'Letter Spacing (pixels)', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Heading text', 'themestall' ),
					'desc' => __( 'Styled heading', 'themestall' ),
					'icon' => 'h-square'
				),
				// tabs
				'tabs' => array(
					'name' => __( 'Tabs', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Choose style for this tabs', 'themestall' ) . '%ts_skins_link%'
						),
						'active' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Active tab', 'themestall' ),
							'desc' => __( 'Select which tab is open by default', 'themestall' )
						),
						'vertical' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Vertical', 'themestall' ),
							'desc' => __( 'Show tabs vertically', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( "[%prefix_tab title=\"Title 1\"]Content 1[/%prefix_tab]\n[%prefix_tab title=\"Title 2\"]Content 2[/%prefix_tab]\n[%prefix_tab title=\"Title 3\"]Content 3[/%prefix_tab]", 'themestall' ),
					'desc' => __( 'Tabs container', 'themestall' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// tab
				'tab' => array(
					'name' => __( 'Tab', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Tab name', 'themestall' ),
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Enter tab name', 'themestall' )
						),
						'disabled' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Disabled', 'themestall' ),
							'desc' => __( 'Is this tab disabled', 'themestall' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'themestall' ),
							'desc' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This tab will be activated and scrolled in', 'themestall' )
						),
						'url' => array(
							'default' => '',
							'name' => __( 'URL', 'themestall' ),
							'desc' => __( 'You can link this tab to any webpage. Enter here full URL to switch this tab into link', 'themestall' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self'  => __( 'Open link in same window/tab', 'themestall' ),
								'blank' => __( 'Open link in new window/tab', 'themestall' )
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'themestall' ),
							'desc' => __( 'Choose how to open the custom tab link', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Tab content', 'themestall' ),
					'desc' => __( 'Single tab', 'themestall' ),
					'note' => __( 'Did you know that you need to wrap single tabs with [tabs] shortcode?', 'themestall' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// spoiler
				'spoiler' => array(
					'name' => __( 'Spoiler', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Spoiler title', 'themestall' ),
							'name' => __( 'Title', 'themestall' ), 'desc' => __( 'Text in spoiler title', 'themestall' )
						),
						'open' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Open', 'themestall' ),
							'desc' => __( 'Is spoiler content visible by default', 'themestall' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'fancy' => __( 'Fancy', 'themestall' ),
								'simple' => __( 'Simple', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Choose style for this spoiler', 'themestall' ) . '%ts_skins_link%'
						),
						'icon' => array(
							'type' => 'select',
							'values' => array(
								'plus'           => __( 'Plus', 'themestall' ),
								'plus-circle'    => __( 'Plus circle', 'themestall' ),
								'plus-square-1'  => __( 'Plus square 1', 'themestall' ),
								'plus-square-2'  => __( 'Plus square 2', 'themestall' ),
								'arrow'          => __( 'Arrow', 'themestall' ),
								'arrow-circle-1' => __( 'Arrow circle 1', 'themestall' ),
								'arrow-circle-2' => __( 'Arrow circle 2', 'themestall' ),
								'chevron'        => __( 'Chevron', 'themestall' ),
								'chevron-circle' => __( 'Chevron circle', 'themestall' ),
								'caret'          => __( 'Caret', 'themestall' ),
								'caret-square'   => __( 'Caret square', 'themestall' ),
								'folder-1'       => __( 'Folder 1', 'themestall' ),
								'folder-2'       => __( 'Folder 2', 'themestall' )
							),
							'default' => 'plus',
							'name' => __( 'Icon', 'themestall' ),
							'desc' => __( 'Icons for spoiler', 'themestall' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'themestall' ),
							'desc' => __( 'You can use unique anchor for this spoiler to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This spoiler will be open and scrolled in', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Hidden content', 'themestall' ),
					'desc' => __( 'Spoiler with hidden content', 'themestall' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'themestall' ),
					'example' => 'spoilers',
					'icon' => 'list-ul'
				),
				// accordion
				'accordion' => array(
					'name' => __( 'Accordion', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( "[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]", 'themestall' ),
					'desc' => __( 'Accordion with spoilers', 'themestall' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'themestall' ),
					'example' => 'spoilers',
					'icon' => 'list'
				),
				// divider
				'divider' => array(
					'name' => __( 'Divider', 'themestall' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'top' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show TOP link', 'themestall' ),
							'desc' => __( 'Show link to top of the page or not', 'themestall' )
						),
						'text' => array(
							'values' => array( ),
							'default' => __( 'Go to top', 'themestall' ),
							'name' => __( 'Link text', 'themestall' ), 'desc' => __( 'Text for the GO TOP link', 'themestall' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'dotted'  => __( 'Dotted', 'themestall' ),
								'dashed'  => __( 'Dashed', 'themestall' ),
								'double'  => __( 'Double', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Choose style for this divider', 'themestall' )
						),
						'divider_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Divider color', 'themestall' ),
							'desc' => __( 'Pick the color for divider', 'themestall' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Link color', 'themestall' ),
							'desc' => __( 'Pick the color for TOP link', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Height of the divider (in pixels)', 'themestall' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 15,
							'name' => __( 'Margin', 'themestall' ),
							'desc' => __( 'Adjust the top and bottom margins of this divider (in pixels)', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Content divider with optional TOP link', 'themestall' ),
					'icon' => 'ellipsis-h'
				),
				// spacer
				'spacer' => array(
					'name' => __( 'Spacer', 'themestall' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 800,
							'step' => 10,
							'default' => 20,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Height of the spacer in pixels', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Empty space with adjustable height', 'themestall' ),
					'icon' => 'arrows-v'
				),
				// highlight
				'highlight' => array(
					'name' => __( 'Highlight', 'themestall' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#DDFF99',
							'name' => __( 'Background', 'themestall' ),
							'desc' => __( 'Highlighted text background color', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#000000',
							'name' => __( 'Text color', 'themestall' ), 'desc' => __( 'Highlighted text color', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Highlighted text', 'themestall' ),
					'desc' => __( 'Highlighted text', 'themestall' ),
					'icon' => 'pencil'
				),
				// color_overlay
				'color_overlay' => array(
					'name' => __( 'Background Overlay', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#000000',
							'name' => __( 'Background', 'themestall' ),
							'desc' => __( 'Overlay background color', 'themestall' )
						),
						'opacity' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
							'default' => 0.5,
							'name' => __( 'Opacity', 'themestall' ),
							'desc' => __( 'Choose opacity', 'themestall' )
						),
						'display_style' => array(
							'type' => 'select',
							'values' => array(
								'normal' => __( 'normal', 'themestall' ),
								'hover' => __( 'only hover', 'themestall' ),
							),
							'default' => 'default',
							'name' => __( 'Type', 'themestall' ),
							'desc' => __( 'Style of the label', 'themestall' )
						),
					),
					'content' => __( '', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'pencil'
				),
				
				// label
				'label' => array(
					'name' => __( 'Label', 'themestall' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'success' => __( 'Success', 'themestall' ),
								'warning' => __( 'Warning', 'themestall' ),
								'important' => __( 'Important', 'themestall' ),
								'black' => __( 'Black', 'themestall' ),
								'info' => __( 'Info', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Type', 'themestall' ),
							'desc' => __( 'Style of the label', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Label', 'themestall' ),
					'desc' => __( 'Styled label', 'themestall' ),
					'icon' => 'tag'
				),
				// quote
				'quote' => array(
					'name' => __( 'Quote', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Choose style for this quote', 'themestall' ) . '%ts_skins_link%'
						),
						'cite' => array(
							'default' => '',
							'name' => __( 'Cite', 'themestall' ),
							'desc' => __( 'Quote author name', 'themestall' )
						),
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Cite url', 'themestall' ),
							'desc' => __( 'Url of the quote author. Leave empty to disable link', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Quote', 'themestall' ),
					'desc' => __( 'Blockquote alternative', 'themestall' ),
					'icon' => 'quote-right'
				),
				// pullquote
				'pullquote' => array(
					'name' => __( 'Pullquote', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'themestall' ),
								'right' => __( 'Right', 'themestall' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'themestall' ), 'desc' => __( 'Pullquote alignment (float)', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Pullquote', 'themestall' ),
					'desc' => __( 'Pullquote', 'themestall' ),
					'icon' => 'quote-left'
				),
				// dropcap
				'dropcap' => array(
					'name' => __( 'Dropcap', 'themestall' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'flat' => __( 'Flat', 'themestall' ),
								'light' => __( 'Light', 'themestall' ),
								'simple' => __( 'Simple', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ), 'desc' => __( 'Dropcap style preset', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 5,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Choose dropcap size', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'D', 'themestall' ),
					'desc' => __( 'Dropcap', 'themestall' ),
					'icon' => 'bold'
				),
				// frame
				'frame' => array(
					'name' => __( 'Frame', 'themestall' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'themestall' ),
								'center' => __( 'Center', 'themestall' ),
								'right' => __( 'Right', 'themestall' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'themestall' ),
							'desc' => __( 'Frame alignment', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => '<img src="http://lorempixel.com/g/400/200/" />',
					'desc' => __( 'Styled image frame', 'themestall' ),
					'icon' => 'picture-o'
				),
				// row
				'row' => array(
					'name' => __( 'Row', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( "[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]", 'themestall' ),
					'desc' => __( 'Row for flexible columns', 'themestall' ),
					'icon' => 'columns'
				),
				// column
				'column' => array(
					'name' => __( 'Column', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'size' => array(
							'type' => 'select',
							'values' => array(
								'1/1' => __( 'Full width', 'themestall' ),
								'1/2' => __( 'One half', 'themestall' ),
								'1/3' => __( 'One third', 'themestall' ),
								'2/3' => __( 'Two third', 'themestall' ),
								'1/4' => __( 'One fourth', 'themestall' ),
								'3/4' => __( 'Three fourth', 'themestall' ),
								'1/5' => __( 'One fifth', 'themestall' ),
								'2/5' => __( 'Two fifth', 'themestall' ),
								'3/5' => __( 'Three fifth', 'themestall' ),
								'4/5' => __( 'Four fifth', 'themestall' ),
								'1/6' => __( 'One sixth', 'themestall' ),
								'5/6' => __( 'Five sixth', 'themestall' )
							),
							'default' => '1/2',
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Select column width. This width will be calculated depend page width', 'themestall' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'themestall' ),
							'desc' => __( 'Is this column centered on the page', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Column content', 'themestall' ),
					'desc' => __( 'Flexible and responsive columns', 'themestall' ),
					'note' => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'themestall' ),
					'example' => 'columns',
					'icon' => 'columns'
				),
				// list
				'list' => array(
					'name' => __( 'List', 'themestall' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'themestall' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'themestall' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'themestall' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( "<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>", 'themestall' ),
					'desc' => __( 'Styled unordered list', 'themestall' ),
					'icon' => 'list-ol'
				),
				// button
				'button' => array(
					'name' => __( 'Button', 'themestall' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => get_option( 'home' ),
							'name' => __( 'Link', 'themestall' ),
							'desc' => __( 'Button link', 'themestall' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same tab', 'themestall' ),
								'blank' => __( 'New tab', 'themestall' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'themestall' ),
							'desc' => __( 'Button link target', 'themestall' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'standard' => __( 'Standard', 'themestall' ),
								'flat' => __( 'Flat', 'themestall' ),
								'ghost' => __( 'Ghost', 'themestall' ),
								'soft' => __( 'Soft', 'themestall' ),
								'glass' => __( 'Glass', 'themestall' ),
								'bubbles' => __( 'Bubbles', 'themestall' ),
								'noise' => __( 'Noise', 'themestall' ),
								'stroked' => __( 'Stroked', 'themestall' ),
								'3d' => __( '3D', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ), 
							'desc' => __( 'Button background style preset', 'themestall' )
						),
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Background', 'themestall' ), 
							'desc' => __( 'Button background color', 'themestall' )
						),
						'opacity' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
							'default' => 0,
							'name' => __( 'Opacity', 'themestall' ),
							'desc' => __( 'Background Opacity', 'themestall' )
						),
						'background_hover' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#f3b723',
							'name' => __( 'Background Hover', 'themestall' ), 
							'desc' => __( 'Button background hover color', 'themestall' )
						),
						'border' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#121212',
							'name' => __( 'Border Color', 'themestall' ), 
							'desc' => __( 'Border color', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#ffffff',
							'name' => __( 'Text color', 'themestall' ),
							'desc' => __( 'Button text color', 'themestall' )
						),
						'color_hover' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#ffffff',
							'name' => __( 'Text color hover', 'themestall' ),
							'desc' => __( 'Button text color on hover', 'themestall' )
						),
						'line_height' => array(
							'type' => 'slider',
							'min' => 18,
							'max' => 100,
							'step' => 1,
							'default' => 18,
							'name' => __( 'Line Height', 'themestall' ),
							'desc' => __( 'Line Height of Button text', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Button size', 'themestall' )
						),
						'wide' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Fluid', 'themestall' ), 
							'desc' => __( 'Fluid buttons has 100% width', 'themestall' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'themestall' ), 
							'desc' => __( 'Is button centered on the page', 'themestall' )
						),
						'radius' => array(
							'type' => 'select',
							'values' => array(
								'auto' => __( 'Auto', 'themestall' ),
								'round' => __( 'Round', 'themestall' ),
								'0' => __( 'Square', 'themestall' ),
								'5' => '5px',
								'10' => '10px',
								'20' => '20px',
								'30' => '30px'
							),
							'default' => 'auto',
							'name' => __( 'Radius', 'themestall' ),
							'desc' => __( 'Radius of button corners. Auto-radius calculation based on button size', 'themestall' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'themestall' ),
							'desc' => __( 'You can upload custom icon for this box', 'themestall' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#121212',
							'name' => __( 'Icon color', 'themestall' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'themestall' )
						),
						'text_shadow' => array(
							'type' => 'shadow',
							'default' => 'none',
							'name' => __( 'Text shadow', 'themestall' ),
							'desc' => __( 'Button text shadow', 'themestall' )
						),
						'desc' => array(
							'default' => '',
							'name' => __( 'Description', 'themestall' ),
							'desc' => __( 'Small description under button text. This option is incompatible with icon.', 'themestall' )
						),
						'onclick' => array(
							'default' => '',
							'name' => __( 'onClick', 'themestall' ),
							'desc' => __( 'Advanced JavaScript code for onClick action', 'themestall' )
						),
						'rel' => array(
							'default' => '',
							'name' => __( 'Rel attribute', 'themestall' ),
							'desc' => __( 'Here you can add value for the rel attribute.<br>Example values: <b%value>nofollow</b>, <b%value>lightbox</b>', 'themestall' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title attribute', 'themestall' ),
							'desc' => __( 'Here you can add value for the title attribute', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Button text', 'themestall' ),
					'desc' => __( 'Styled button', 'themestall' ),
					'example' => 'buttons',
					'icon' => 'heart'
				),
				
				//services
			    'services' => 
				array(
					'name' => __( 'Services', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Services Style 2', 'themestall' ),
							),
							'default' => 'style_2',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Box style preset', 'themestall' )
						),					
						),
					'content' => __( 'Single service shortcode goes here', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				// service
				'service' => array(
					'name' => __( 'Service', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' ),
								'style_3' => __('Style 3', 'themestall'),
								'style_4' => __('Style 4', 'themestall'),
							),
							'default' => 'style_2',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Style of service', 'themestall' )
						),
						'title' => array(
							'values' => array( ),
							'default' => __( 'Service title', 'themestall' ),
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Service name', 'themestall' )
						),
						'title_color' => array(
							'type' => 'color',
							'default' => '#27293d',
							'name' => __( 'Title color', 'themestall' ),
							'desc' => __( 'This color will be applied to the title.', 'themestall' )
						),
						'box_bg' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Box Background', 'themestall' ),
							'desc' => __( 'This color will be applied to the service box.', 'themestall' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'themestall' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'themestall' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'themestall' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'themestall' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Service description', 'themestall' ),
					'desc' => __( 'Service box with title', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				// box
				'box' => array(
					'name' => __( 'Box', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Box title', 'themestall' ),
							'name' => __( 'Title', 'themestall' ), 'desc' => __( 'Text for the box title', 'themestall' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'soft' => __( 'Soft', 'themestall' ),
								'glass' => __( 'Glass', 'themestall' ),
								'bubbles' => __( 'Bubbles', 'themestall' ),
								'noise' => __( 'Noise', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Box style preset', 'themestall' )
						),
						'box_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Color', 'themestall' ),
							'desc' => __( 'Color for the box title and borders', 'themestall' )
						),
						'title_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Title text color', 'themestall' ), 'desc' => __( 'Color for the box title text', 'themestall' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'themestall' ),
							'desc' => __( 'Box corners radius', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Box content', 'themestall' ),
					'desc' => __( 'Colored box with caption', 'themestall' ),
					'icon' => 'list-alt'
				),
				// note
				'note' => array(
					'name' => __( 'Note', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'note_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFF66',
							'name' => __( 'Background', 'themestall' ), 'desc' => __( 'Note background color', 'themestall' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'themestall' ),
							'desc' => __( 'Note text color', 'themestall' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'themestall' ), 'desc' => __( 'Note corners radius', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Note text', 'themestall' ),
					'desc' => __( 'Colored box', 'themestall' ),
					'icon' => 'list-alt'
				),
				// expand
				'expand' => array(
					'name' => __( 'Expand', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'more_text' => array(
							'default' => __( 'Show more', 'themestall' ),
							'name' => __( 'More text', 'themestall' ),
							'desc' => __( 'Enter the text for more link', 'themestall' )
						),
						'less_text' => array(
							'default' => __( 'Show less', 'themestall' ),
							'name' => __( 'Less text', 'themestall' ),
							'desc' => __( 'Enter the text for less link', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 10,
							'default' => 100,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Height for collapsed state (in pixels)', 'themestall' )
						),
						'hide_less' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Hide less link', 'themestall' ),
							'desc' => __( 'This option allows you to hide less link, when the text block has been expanded', 'themestall' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'themestall' ),
							'desc' => __( 'Pick the text color', 'themestall' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#0088FF',
							'name' => __( 'Link color', 'themestall' ),
							'desc' => __( 'Pick the link color', 'themestall' )
						),
						'link_style' => array(
							'type' => 'select',
							'values' => array(
								'default'    => __( 'Default', 'themestall' ),
								'underlined' => __( 'Underlined', 'themestall' ),
								'dotted'     => __( 'Dotted', 'themestall' ),
								'dashed'     => __( 'Dashed', 'themestall' ),
								'button'     => __( 'Button', 'themestall' ),
							),
							'default' => 'default',
							'name' => __( 'Link style', 'themestall' ),
							'desc' => __( 'Select the style for more/less link', 'themestall' )
						),
						'link_align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'themestall' ),
								'center' => __( 'Center', 'themestall' ),
								'right' => __( 'Right', 'themestall' ),
							),
							'default' => 'left',
							'name' => __( 'Link align', 'themestall' ),
							'desc' => __( 'Select link alignment', 'themestall' )
						),
						'more_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'More icon', 'themestall' ),
							'desc' => __( 'Add an icon to the more link', 'themestall' )
						),
						'less_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Less icon', 'themestall' ),
							'desc' => __( 'Add an icon to the less link', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'This text block can be expanded', 'themestall' ),
					'desc' => __( 'Expandable text block', 'themestall' ),
					'icon' => 'sort-amount-asc'
				),
				// lightbox
				'lightbox' => array(
					'name' => __( 'Lightbox', 'themestall' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'iframe' => __( 'Iframe', 'themestall' ),
								'image' => __( 'Image', 'themestall' ),
								'inline' => __( 'Inline (html content)', 'themestall' )
							),
							'default' => 'iframe',
							'name' => __( 'Content type', 'themestall' ),
							'desc' => __( 'Select type of the lightbox window content', 'themestall' )
						),
						'src' => array(
							'default' => '',
							'name' => __( 'Content source', 'themestall' ),
							'desc' => __( 'Insert here URL or CSS selector. Use URL for Iframe and Image content types. Use CSS selector for Inline content type.<br />Example values:<br /><b%value>http://www.youtube.com/watch?v=XXXXXXXXX</b> - YouTube video (iframe)<br /><b%value>http://example.com/wp-content/uploads/image.jpg</b> - uploaded image (image)<br /><b%value>http://example.com/</b> - any web page (iframe)<br /><b%value>#my-custom-popup</b> - any HTML content (inline)', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( '[%prefix_button] Click Here to Watch the Video [/%prefix_button]', 'themestall' ),
					'desc' => __( 'Lightbox window with custom content', 'themestall' ),
					'icon' => 'external-link'
				),
				// lightbox content
				'lightbox_content' => array(
					'name' => __( 'Lightbox content', 'themestall' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'themestall' ),
							'desc' => sprintf( __( 'Enter here the ID from Content source field. %s Example value: %s', 'themestall' ), '<br>', '<b%value>my-custom-popup</b>' )
						),
						'width' => array(
							'default' => '50%',
							'name' => __( 'Width', 'themestall' ),
							'desc' => sprintf( __( 'Adjust the width for inline content (in pixels or percents). %s Example values: %s, %s, %s', 'themestall' ), '<br>', '<b%value>300px</b>', '<b%value>600px</b>', '<b%value>90%</b>' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Margin', 'themestall' ),
							'desc' => __( 'Adjust the margin for inline content (in pixels)', 'themestall' )
						),
						'padding' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Padding', 'themestall' ),
							'desc' => __( 'Adjust the padding for inline content (in pixels)', 'themestall' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'center' => __( 'Center', 'themestall' ),
								'left' => __( 'Left', 'themestall' ),
								'right' => __( 'Right', 'themestall' ),
								'justify' => __( 'Justify', 'themestall' ),
							),
							'default' => 'center',
							'name' => __( 'Text Align', 'themestall' ),
							'desc' => __( 'Choose text align', 'themestall' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFFFFF',
							'name' => __( 'Background color', 'themestall' ),
							'desc' => __( 'Pick a background color', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'themestall' ),
							'desc' => __( 'Pick a text color', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'themestall' ),
							'desc' => __( 'Pick a text color', 'themestall' )
						),
						'shadow' => array(
							'type' => 'shadow',
							'default' => '0px 0px 15px #333333',
							'name' => __( 'Shadow', 'themestall' ),
							'desc' => __( 'Adjust the shadow for content box', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Inline content', 'themestall' ),
					'desc' => __( 'Inline content for lightbox', 'themestall' ),
					'icon' => 'external-link'
				),
				// tooltip
				'tooltip' => array(
					'name' => __( 'Tooltip', 'themestall' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'light' => __( 'Basic: Light', 'themestall' ),
								'dark' => __( 'Basic: Dark', 'themestall' ),
								'yellow' => __( 'Basic: Yellow', 'themestall' ),
								'green' => __( 'Basic: Green', 'themestall' ),
								'red' => __( 'Basic: Red', 'themestall' ),
								'blue' => __( 'Basic: Blue', 'themestall' ),
								'youtube' => __( 'Youtube', 'themestall' ),
								'tipsy' => __( 'Tipsy', 'themestall' ),
								'bootstrap' => __( 'Bootstrap', 'themestall' ),
								'jtools' => __( 'jTools', 'themestall' ),
								'tipped' => __( 'Tipped', 'themestall' ),
								'cluetip' => __( 'Cluetip', 'themestall' ),
							),
							'default' => 'yellow',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Tooltip window style', 'themestall' )
						),
						'position' => array(
							'type' => 'select',
							'values' => array(
								'north' => __( 'Top', 'themestall' ),
								'south' => __( 'Bottom', 'themestall' ),
								'west' => __( 'Left', 'themestall' ),
								'east' => __( 'Right', 'themestall' )
							),
							'default' => 'top',
							'name' => __( 'Position', 'themestall' ),
							'desc' => __( 'Tooltip position', 'themestall' )
						),
						'shadow' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Shadow', 'themestall' ),
							'desc' => __( 'Add shadow to tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'themestall' )
						),
						'rounded' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Rounded corners', 'themestall' ),
							'desc' => __( 'Use rounded for tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'themestall' )
						),
						'size' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'1' => 1,
								'2' => 2,
								'3' => 3,
								'4' => 4,
								'5' => 5,
								'6' => 6,
							),
							'default' => 'default',
							'name' => __( 'Font size', 'themestall' ),
							'desc' => __( 'Tooltip font size', 'themestall' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Tooltip title', 'themestall' ),
							'desc' => __( 'Enter title for tooltip window. Leave this field empty to hide the title', 'themestall' )
						),
						'content' => array(
							'default' => __( 'Tooltip text', 'themestall' ),
							'name' => __( 'Tooltip content', 'themestall' ),
							'desc' => __( 'Enter tooltip content here', 'themestall' )
						),
						'behavior' => array(
							'type' => 'select',
							'values' => array(
								'hover' => __( 'Show and hide on mouse hover', 'themestall' ),
								'click' => __( 'Show and hide by mouse click', 'themestall' ),
								'always' => __( 'Always visible', 'themestall' )
							),
							'default' => 'hover',
							'name' => __( 'Behavior', 'themestall' ),
							'desc' => __( 'Select tooltip behavior', 'themestall' )
						),
						'close' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Close button', 'themestall' ),
							'desc' => __( 'Show close button', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( '[%prefix_button] Hover me to open tooltip [/%prefix_button]', 'themestall' ),
					'desc' => __( 'Tooltip window with custom content', 'themestall' ),
					'icon' => 'comment-o'
				),
				// private
				'private' => array(
					'name' => __( 'Private', 'themestall' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Private note text', 'themestall' ),
					'desc' => __( 'Private note for post authors', 'themestall' ),
					'icon' => 'lock'
				),
				// youtube
				'youtube' => array(
					'name' => __( 'YouTube', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'themestall' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Player width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Player height', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'themestall' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'themestall' ),
							'desc' => __( 'Play video automatically when page is loaded', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'YouTube video', 'themestall' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// youtube_advanced
				'youtube_advanced' => array(
					'name' => __( 'YouTube Advanced', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'themestall' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'themestall' )
						),
						'playlist' => array(
							'default' => '',
							'name' => __( 'Playlist', 'themestall' ),
							'desc' => __( 'Value is a comma-separated list of video IDs to play. If you specify a value, the first video that plays will be the VIDEO_ID specified in the URL path, and the videos specified in the playlist parameter will play thereafter', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Player width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Player height', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'themestall' )
						),
						'controls' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Hide controls', 'themestall' ),
								'yes' => __( '1 - Show controls', 'themestall' ),
								'alt' => __( '2 - Show controls when playback is started', 'themestall' )
							),
							'default' => 'yes',
							'name' => __( 'Controls', 'themestall' ),
							'desc' => __( 'This parameter indicates whether the video player controls will display', 'themestall' )
						),
						'autohide' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Do not hide controls', 'themestall' ),
								'yes' => __( '1 - Hide all controls on mouse out', 'themestall' ),
								'alt' => __( '2 - Hide progress bar on mouse out', 'themestall' )
							),
							'default' => 'alt',
							'name' => __( 'Autohide', 'themestall' ),
							'desc' => __( 'This parameter indicates whether the video controls will automatically hide after a video begins playing', 'themestall' )
						),
						'showinfo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show title bar', 'themestall' ),
							'desc' => __( 'If you set the parameter value to NO, then the player will not display information like the video title and uploader before the video starts playing.', 'themestall' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'themestall' ),
							'desc' => __( 'Play video automatically when page is loaded', 'themestall' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'themestall' ),
							'desc' => __( 'Setting of YES will cause the player to play the initial video again and again', 'themestall' )
						),
						'rel' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Related videos', 'themestall' ),
							'desc' => __( 'This parameter indicates whether the player should show related videos when playback of the initial video ends', 'themestall' )
						),
						'fs' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show full-screen button', 'themestall' ),
							'desc' => __( 'Setting this parameter to NO prevents the fullscreen button from displaying', 'themestall' )
						),
						'modestbranding' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => 'modestbranding',
							'desc' => __( 'This parameter lets you use a YouTube player that does not show a YouTube logo. Set the parameter value to YES to prevent the YouTube logo from displaying in the control bar. Note that a small YouTube text label will still display in the upper-right corner of a paused video when the user\'s mouse pointer hovers over the player', 'themestall' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'dark' => __( 'Dark theme', 'themestall' ),
								'light' => __( 'Light theme', 'themestall' )
							),
							'default' => 'dark',
							'name' => __( 'Theme', 'themestall' ),
							'desc' => __( 'This parameter indicates whether the embedded player will display player controls (like a play button or volume control) within a dark or light control bar', 'themestall' )
						),
						'https' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Force HTTPS', 'themestall' ),
							'desc' => __( 'Use HTTPS in player iframe', 'themestall' )
						),
						'wmode' => array(
							'default' => '',
							'name'    => __( 'WMode', 'themestall' ),
							'desc'    => sprintf( __( 'Here you can specify wmode value for the embed URL. %s Example values: %s, %s', 'themestall' ), '<br>', '<b%value>transparent</b>', '<b%value>opaque</b>' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'YouTube video player with advanced settings', 'themestall' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// vimeo
				'vimeo' => array(
					'name' => __( 'Vimeo', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'themestall' ), 'desc' => __( 'Url of Vimeo page with video', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Player width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Player height', 'themestall' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Vimeo video', 'themestall' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// screenr
				'screenr' => array(
					'name' => __( 'Screenr', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'themestall' ),
							'desc' => __( 'Url of Screenr page with video', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Player width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Player height', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Screenr video', 'themestall' ),
					'icon' => 'youtube-play'
				),
				// dailymotion
				'dailymotion' => array(
					'name' => __( 'Dailymotion', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'themestall' ),
							'desc' => __( 'Url of Dailymotion page with video', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Player width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Player height', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'themestall' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'themestall' ),
							'desc' => __( 'Start the playback of the video automatically after the player load. May not work on some mobile OS versions', 'themestall' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFC300',
							'name' => __( 'Background color', 'themestall' ),
							'desc' => __( 'HTML color of the background of controls elements', 'themestall' )
						),
						'foreground' => array(
							'type' => 'color',
							'default' => '#F7FFFD',
							'name' => __( 'Foreground color', 'themestall' ),
							'desc' => __( 'HTML color of the foreground of controls elements', 'themestall' )
						),
						'highlight' => array(
							'type' => 'color',
							'default' => '#171D1B',
							'name' => __( 'Highlight color', 'themestall' ),
							'desc' => __( 'HTML color of the controls elements\' highlights', 'themestall' )
						),
						'logo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show logo', 'themestall' ),
							'desc' => __( 'Allows to hide or show the Dailymotion logo', 'themestall' )
						),
						'quality' => array(
							'type' => 'select',
							'values' => array(
								'240'  => '240',
								'380'  => '380',
								'480'  => '480',
								'720'  => '720',
								'1080' => '1080'
							),
							'default' => '380',
							'name' => __( 'Quality', 'themestall' ),
							'desc' => __( 'Determines the quality that must be played by default if available', 'themestall' )
						),
						'related' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show related videos', 'themestall' ),
							'desc' => __( 'Show related videos at the end of the video', 'themestall' )
						),
						'info' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show video info', 'themestall' ),
							'desc' => __( 'Show videos info (title/author) on the start screen', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Dailymotion video', 'themestall' ),
					'icon' => 'youtube-play'
				),
				// audio
				'audio' => array(
					'name' => __( 'Audio', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'themestall' ),
							'desc' => __( 'Audio file url. Supported formats: mp3, ogg', 'themestall' )
						),
						'width' => array(
							'values' => array(),
							'default' => '100%',
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Player width. You can specify width in percents and player will be responsive. Example values: <b%value>200px</b>, <b%value>100&#37;</b>', 'themestall' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'themestall' ),
							'desc' => __( 'Play file automatically when page is loaded', 'themestall' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'themestall' ),
							'desc' => __( 'Repeat when playback is ended', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Custom audio player', 'themestall' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// video
				'video' => array(
					'name' => __( 'Video', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'themestall' ),
							'desc' => __( 'Url to mp4/flv video-file', 'themestall' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'themestall' ),
							'desc' => __( 'Url to poster image, that will be shown before playback', 'themestall' )
						),
						'title' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Player title', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Player width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Player height', 'themestall' )
						),
						'controls' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Controls', 'themestall' ),
							'desc' => __( 'Show player controls (play/pause etc.) or not', 'themestall' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'themestall' ),
							'desc' => __( 'Play file automatically when page is loaded', 'themestall' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'themestall' ),
							'desc' => __( 'Repeat when playback is ended', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Custom video player', 'themestall' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// custom_video
				'custom_video' => array(
					'name' => __( 'Custom Video', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'themestall' ),
							'desc' => __( 'Url to mp4/flv video-file', 'themestall' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'themestall' ),
							'desc' => __( 'Video poster', 'themestall' )
						),
					),
					'desc' => __( 'Custom video player', 'themestall' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// custom_audio
				'custom_audio' => array(
					'name' => __( 'Custom Audio', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'themestall' ),
							'desc' => __( 'Url of audio file', 'themestall' )
						),
					),
					'desc' => __( 'Custom audio player', 'themestall' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// table
				'table' => array(
					'name' => __( 'Table', 'themestall' ),
					'type' => 'mixed',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style2' => __( 'Style 2', 'themestall' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Choose style for this table', 'themestall' ) . '%ts_skins_link%'
						),
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'CSV file', 'themestall' ),
							'desc' => __( 'Upload CSV file if you want to create HTML-table from file', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( "<table>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>", 'themestall' ),
					'desc' => __( 'Styled table from HTML or CSV file', 'themestall' ),
					'icon' => 'table'
				),
				// alert_box
				'alert_box' => array(
					'name' => __( 'Alert Box', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'success' => __( 'Success', 'themestall' ),
								'danger' => __( 'Error', 'themestall' ),
								'warning' => __( 'Warning', 'themestall' ),
								'info' => __( 'Information', 'themestall' ),
							),
							'default' => 'success',
							'name' => __( 'Alert Type', 'themestall' ),
							'desc' => __( 'Choose alert type', 'themestall' ) . '%ts_skins_link%'
						),
						'text' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Alert Text', 'themestall' ),
							'desc' => __( 'Write your confirmation text here', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( "", 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'table'
				),
				// permalink
				'permalink' => array(
					'name' => __( 'Permalink', 'themestall' ),
					'type' => 'mixed',
					'group' => 'content other',
					'atts' => array(
						'id' => array(
							'values' => array( ), 'default' => 1,
							'name' => __( 'ID', 'themestall' ),
							'desc' => __( 'Post or page ID', 'themestall' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same tab', 'themestall' ),
								'blank' => __( 'New tab', 'themestall' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'themestall' ),
							'desc' => __( 'Link target. blank - link will be opened in new window/tab', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => '',
					'desc' => __( 'Permalink to specified post/page', 'themestall' ),
					'icon' => 'link'
				),
				// members
				'members' => array(
					'name' => __( 'Members', 'themestall' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'message' => array(
							'default' => __( 'This content is for registered users only. Please %login%.', 'themestall' ),
							'name' => __( 'Message', 'themestall' ), 'desc' => __( 'Message for not logged users', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffcc00',
							'name' => __( 'Box color', 'themestall' ), 'desc' => __( 'This color will applied only to box for not logged users', 'themestall' )
						),
						'login_text' => array(
							'default' => __( 'login', 'themestall' ),
							'name' => __( 'Login link text', 'themestall' ), 'desc' => __( 'Text for the login link', 'themestall' )
						),
						'login_url' => array(
							'default' => wp_login_url(),
							'name' => __( 'Login link url', 'themestall' ), 'desc' => __( 'Login link url', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Content for logged members', 'themestall' ),
					'desc' => __( 'Content for logged in members only', 'themestall' ),
					'icon' => 'lock'
				),
				// guests
				'guests' => array(
					'name' => __( 'Guests', 'themestall' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Content for guests', 'themestall' ),
					'desc' => __( 'Content for guests only', 'themestall' ),
					'icon' => 'user'
				),
				// feed
				'feed' => array(
					'name' => __( 'RSS Feed', 'themestall' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'themestall' ),
							'desc' => __( 'Url to RSS-feed', 'themestall' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Limit', 'themestall' ), 'desc' => __( 'Number of items to show', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Feed grabber', 'themestall' ),
					'icon' => 'rss'
				),
				// menu
				'menu' => array(
					'name' => __( 'Menu', 'themestall' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Menu name', 'themestall' ), 'desc' => __( 'Custom menu name. Ex: Main menu', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Custom menu by name', 'themestall' ),
					'icon' => 'bars'
				),
				// subpages
				'subpages' => array(
					'name' => __( 'Sub pages', 'themestall' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3, 4, 5 ), 'default' => 1,
							'name' => __( 'Depth', 'themestall' ),
							'desc' => __( 'Max depth level of children pages', 'themestall' )
						),
						'p' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Parent ID', 'themestall' ),
							'desc' => __( 'ID of the parent page. Leave blank to use current page', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'List of sub pages', 'themestall' ),
					'icon' => 'bars'
				),
				// siblings
				'siblings' => array(
					'name' => __( 'Siblings', 'themestall' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3 ), 'default' => 1,
							'name' => __( 'Depth', 'themestall' ),
							'desc' => __( 'Max depth level', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'List of cureent page siblings', 'themestall' ),
					'icon' => 'bars'
				),
				// document
				'document' => array(
					'name' => __( 'Document', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Url', 'themestall' ),
							'desc' => __( 'Url to uploaded document. Supported formats: doc, xls, pdf etc.', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Viewer width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Viewer height', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make viewer responsive', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Document viewer by Google', 'themestall' ),
					'icon' => 'file-text'
				),
				// gmap
				'gmap' => array(
					'name' => __( 'Gmap', 'themestall' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Map width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Map height', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make map responsive', 'themestall' )
						),
						'address' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Marker', 'themestall' ),
							'desc' => __( 'Address for the marker. You can type it in any language', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Maps by Google', 'themestall' ),
					'icon' => 'globe'
				),
				
				// bg_map
				'bg_map' => array(
					'name' => __( 'Background Gmap', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => 'How can we help you?',
							'name' => __( 'Title of Map', 'themestall' ),
							'desc' => __('Write your map title', 'themestall'),
						),
						'latitude' => array(
							'values' => '',
							'default' => '-37.801578',
							'name' => __( 'Latitude', 'themestall' ),
							'desc' => __( 'Get Latitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'themestall' )
						),
						'longitude' => array(
							'default' => '145.060508',
							'name' => __( 'Longitude', 'themestall' ),
							'desc' => __( 'Get Longitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'themestall' )
						),
						'marker_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Maker Image', 'themestall' ),
							'desc' => __( 'Upload maker image', 'themestall' )
						),
						'maker_title' => array(
							'type' => 'text',
							'default' => 'Maker Title',
							'name' => __( 'Title of Maker', 'themestall' ),
							'desc' => __('Write your maker title', 'themestall'),
						),
						'maker_description' => array(
							'type' => 'text',
							'default' => 'Maker Description',
							'name' => __( 'Description of Maker', 'themestall' ),
							'desc' => __('Write your maker description', 'themestall'),
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1000,
							'step' => 20,
							'default' => 500,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Height of Map', 'themestall' )
						)
					),
					'desc' => __( 'Maps by Google', 'themestall' ),
					'icon' => 'globe'
				),
				
				// slider
				'slider' => array(
					'name' => __( 'Slider', 'themestall' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'themestall' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'themestall' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'themestall' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'themestall' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'themestall' ),
								'image'      => __( 'Full-size image', 'themestall' ),
								'lightbox'   => __( 'Lightbox', 'themestall' ),
								'custom'     => __( 'Slide link (added in media editor)', 'themestall' ),
								'attachment' => __( 'Attachment page', 'themestall' ),
								'post'       => __( 'Post permalink', 'themestall' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'themestall' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'themestall' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'themestall' ),
								'blank' => __( 'New window', 'themestall' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'themestall' ),
							'desc' => __( 'Open links in', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ), 'desc' => __( 'Slider width (in pixels)', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'themestall' ), 'desc' => __( 'Slider height (in pixels)', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make slider responsive', 'themestall' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'themestall' ), 'desc' => __( 'Display slide titles', 'themestall' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'themestall' ), 'desc' => __( 'Is slider centered on the page', 'themestall' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'themestall' ), 'desc' => __( 'Show left and right arrows', 'themestall' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Pagination', 'themestall' ),
							'desc' => __( 'Show pagination', 'themestall' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'themestall' ),
							'desc' => __( 'Allow to change slides with mouse wheel', 'themestall' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'themestall' ),
							'desc' => __( 'Choose interval between slide animations. Set to 0 to disable autoplay', 'themestall' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'themestall' ), 'desc' => __( 'Specify animation speed', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Customizable image slider', 'themestall' ),
					'icon' => 'picture-o'
				),
				
				// carousel
				'carousel' => array(
					'name' => __( 'Carousel', 'themestall' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'themestall' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'themestall' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'themestall' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'themestall' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'themestall' ),
								'image'      => __( 'Full-size image', 'themestall' ),
								'lightbox'   => __( 'Lightbox', 'themestall' ),
								'custom'     => __( 'Slide link (added in media editor)', 'themestall' ),
								'attachment' => __( 'Attachment page', 'themestall' ),
								'post'       => __( 'Post permalink', 'themestall' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'themestall' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'themestall' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'themestall' ),
								'blank' => __( 'New window', 'themestall' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'themestall' ),
							'desc' => __( 'Open links in', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 100,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Carousel width (in pixels)', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 1600,
							'step' => 20,
							'default' => 100,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Carousel height (in pixels)', 'themestall' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'themestall' ),
							'desc' => __( 'Ignore width and height parameters and make carousel responsive', 'themestall' )
						),
						'items' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Items to show', 'themestall' ),
							'desc' => __( 'How much carousel items is visible', 'themestall' )
						),
						'scroll' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1, 'default' => 1,
							'name' => __( 'Scroll number', 'themestall' ),
							'desc' => __( 'How much items are scrolled in one transition', 'themestall' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'themestall' ), 'desc' => __( 'Display titles for each item', 'themestall' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'themestall' ), 'desc' => __( 'Is carousel centered on the page', 'themestall' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'themestall' ), 'desc' => __( 'Show left and right arrows', 'themestall' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Pagination', 'themestall' ),
							'desc' => __( 'Show pagination', 'themestall' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'themestall' ),
							'desc' => __( 'Allow to rotate carousel with mouse wheel', 'themestall' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'themestall' ),
							'desc' => __( 'Choose interval between auto animations. Set to 0 to disable autoplay', 'themestall' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'themestall' ), 'desc' => __( 'Specify animation speed', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Customizable image carousel', 'themestall' ),
					'icon' => 'picture-o'
				),
				
				//Featured Lists
				'featured_lists' => 
				array(
					'name' => __( 'Featured Lists', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(	
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Heading of Lists', 'themestall' ),
							'desc' => __('Write your featured list heading', 'themestall'),
						),					
						'desc' => array(
							'type' => 'textarea',
							'default' => '',
							'name' => __( 'List Description', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'list'
				),
				//Featured List
				'featured_list' => 
				array(
					'name' => __( 'Featured List', 'themestall' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),	
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'List Title', 'themestall' ),
							'desc' => __('Write your featured list title', 'themestall'),
						),					
						'desc' => array(
							'type' => 'textarea',
							'default' => '',
							'name' => __( 'List Description', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'ic_icon' => array(
							'default' => '',
							'name' => __( 'Icon(Iconic Icons)', 'themestall' ),
							'desc' => __( 'Example: map-marker ; Copy and Paste your icon class from here <a href="https://useiconic.com/open" target="_blank">site</a> ', 'themestall' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Choose Icon', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 40,
							'step' => 1,
							'default' => 14,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Size of Icon', 'themestall' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#fa9000',
							'name' => __( 'Icon color', 'themestall' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'list'
				),
				
				//Testimonial group
			    'testimonials' => 
				array(
					'name' => __( 'Testimonials', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' ),
								'style_3' => __( 'Style 3', 'themestall' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						),
					'content' => __( 'Single testimonial shortcode goes here', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'recycle'
				),

			//Testimonial
			'testimonial' => 
				array(
					'name' => __( 'Testimonial', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' ),
								'style_3' => __( 'Style 3', 'themestall' ),
							),
							'default' => 'Default',

							'name' => __( 'Style', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'name' => array(
							'type' => 'text',
							'default' => 'Nikar avlley',
							'name' => __( 'Name', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'rtp',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'title_color' => array(
							'type' => 'color',
							'default' => '#27293d',
							'name' => __( 'Title color', 'themestall' ),
							'desc' => __( 'Title text color', 'themestall' )
						),
						'site' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Site', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'site_link' => array(
							'type' => 'text',
							'default' => '#',
							'name' => __( 'Site Link', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Photo', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'text_color' => array(
							'type' => 'color',
							'default' => '#676767',
							'name' => __( 'Text color', 'themestall' ),
							'desc' => __( 'Text color of description', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'quote-left'
				),
				
				//frame_message
				'frame_message' => 
				array(
					'name' => __( 'Frame Message', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'sub_title' => array(
							'default' => '',
							'name' => __( 'Sub Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'button_text' => array(
							'default' => '',
							'name' => __( 'Button Text', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'button_link' => array(
							'default' => '',
							'name' => __( 'Button Link', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'indent'
				),
				
				//nominee_search
				'nominee_search' => 
				array(
					'name' => __( 'Site Search', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'button_text' => array(
							'default' => 'Search',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
					),
					'content' => __( 'Site Search', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'indent'
				),
				
				//Icons
				'icons' => 
				array(
					'name' => __( 'Icon', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'themestall' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'themestall' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'themestall' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'themestall' )
						),
						'font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Font Size', 'themestall' ),
							'desc' => __( 'Font size of Title(in pixels)', 'themestall' )
						),
						'icon_align' => array(
							'type' => 'select',
							'values' => array(
								'left'   => __( 'Left', 'themestall' ),
								'center' => __( 'Center', 'themestall' ),
								'right'  => __( 'Right', 'themestall' )
							),
							'default' => 'center',
							'name' => __( 'Icon alignment', 'themestall' ),
							'desc' => __( 'Select the icon alignment', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'indent'
				),
				
				//Icons
				'icons_info' => 
				array(
					'name' => __( 'Icon With Info', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'themestall' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'themestall' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#f3b723',
							'name' => __( 'Icon color', 'themestall' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'themestall' )
						),
						'font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 28,
							'name' => __( 'Font Size', 'themestall' ),
							'desc' => __( 'Font size of icon(in pixels)', 'themestall' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'Australia Office',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Title of icon', 'themestall' )
						),
						'icon_des' => array(
							'type' => 'text',
							'default' => 'PO Box 16122 Collins Street West Victoria',
							'name' => __( 'Description', 'themestall' ),
							'desc' => __( 'Description of icon', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'indent'
				),
				
				//counter
				'counters' => 
				array(
					'name' => __( 'Counters', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Heading of counters', 'themestall' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#f7f8f9',
							'name' => __( 'Background', 'themestall' ),
							'desc' => __( 'Background of main section', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'counter description', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//counter
				'counter_up' => 
				array(
					'name' => __( 'Counter', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'number' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100000,
							'step' => 1,
							'default' => 1000,
							'name' => __( 'Total number', 'themestall' ),
							'desc' => __( 'This is count up from zero.', 'themestall' )
						),
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'counter description', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//countdown
				'countdown' => 
				array(
					'name' => __( 'Countdown', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'date' => array(
							'type' => 'text',
							'default' => '2016/12/12',
							'name' => __( 'Date', 'themestall' ),
							'desc' => __( 'Formate: 2016/01/01(Y/m/d)', 'themestall' )
						),
					),
					'content' => __( 'counter description', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//offer
				'offer' => 
				array(
					'name' => __( 'Offer', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'desc' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Description', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'button_text' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Button Text', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'form_action' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Form Action', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
					),
					'content' => __( 'Offer list shortcode goes here', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//offer_list
				'offer_list' => 
				array(
					'name' => __( 'Offer List', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
					),
					'content' => __( 'list of offers', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//bg_animation
				'bg_animation' => 
				array(
					'name' => __( 'Background Animation', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Image', 'themestall' ),
							'desc' => __( 'image for background', 'themestall' )
						),
						'animation' => array(
							'type' => 'select',
							'values' => array(
								'slideInLeft' => __( 'slideInLeft', 'themestall' ),
								'slideInRight' => __( 'slideInRight', 'themestall' ),
								'slideInUp' => __( 'slideInUp', 'themestall' ),
								'slideInDown' => __( 'slideInDown', 'themestall' ),
							),
							'default' => 'slideInRight',
							'name' => __( 'Animation', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 1000,
							'step' => 1,
							'default' => '',
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Height of background', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 2000,
							'step' => 1,
							'default' => '',
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Width of background', 'themestall' )
						),
						'left' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 100,
							'step' => 1,
							'default' => '',
							'name' => __( 'Left', 'themestall' ),
							'desc' => __( 'Position in %', 'themestall' )
						),
						'right' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 100,
							'step' => 1,
							'default' => '',
							'name' => __( 'Right', 'themestall' ),
							'desc' => __( 'Position in %', 'themestall' )
						),
						'top' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 1,
							'default' => '',
							'name' => __( 'Top', 'themestall' ),
							'desc' => __( 'Position in px', 'themestall' )
						),
						'bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 1,
							'default' => '',
							'name' => __( 'Bottom', 'themestall' ),
							'desc' => __( 'Position in px', 'themestall' )
						),
					),
					'content' => __( 'list of offers', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//Partners
				'partners' => 
				array(
					'name' => __( 'Partners', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Single partner shortcode here...', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'users'
				),
				
				//Partner
				'partner' => 
				array(
					'name' => __( 'Partner', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Partners Image', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'image_link' => array(
							'type' => 'text',
							'default' => '#',
							'name' => __( 'Image Link', 'themestall' ),
							'desc' => __('', 'themestall'),
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'partner description', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'users'
				),
				
				// custom_gallery
				'custom_gallery' => array(
					'name' => __( 'Gallery', 'themestall' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'themestall' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'themestall' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'themestall' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'themestall' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'themestall' ),
								'image'      => __( 'Full-size image', 'themestall' ),
								'lightbox'   => __( 'Lightbox', 'themestall' ),
								'custom'     => __( 'Slide link (added in media editor)', 'themestall' ),
								'attachment' => __( 'Attachment page', 'themestall' ),
								'post'       => __( 'Post permalink', 'themestall' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'themestall' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'themestall' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'themestall' ),
								'blank' => __( 'New window', 'themestall' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'themestall' ),
							'desc' => __( 'Open links in', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Width', 'themestall' ), 'desc' => __( 'Single item width (in pixels)', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Height', 'themestall' ), 'desc' => __( 'Single item height (in pixels)', 'themestall' )
						),
						'title' => array(
							'type' => 'select',
							'values' => array(
								'never' => __( 'Never', 'themestall' ),
								'hover' => __( 'On mouse over', 'themestall' ),
								'always' => __( 'Always', 'themestall' )
							),
							'default' => 'hover',
							'name' => __( 'Show titles', 'themestall' ),
							'desc' => __( 'Title display mode', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Customizable image gallery', 'themestall' ),
					'icon' => 'picture-o'
				),
				
				// banner_slider
				'banner_slider' => array(
					'name' => __( 'Banner Slider', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'themestall' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'themestall' )
						),
						'previous_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Previous image', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'next_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Next image', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 1400,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Image width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 700,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Image height', 'themestall' )
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Customizable banner slider', 'themestall' ),
					'icon' => 'picture-o'
				),
				
				// contact_info
				'contact_address' => array(
					'name' => __( 'Contact Address', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(	
						'ic_icon' => array(
							'default' => '',
							'name' => __( 'Icon(Iconic Icons)', 'themestall' ),
							'desc' => __( 'Example: map-marker ; Copy and Paste your icon class from here <a href="https://useiconic.com/open" target="_blank">site</a> ', 'themestall' )
						),
						'icon' => array(
							'type' => 'icon',
							'values' => '',
							'default' => '',
							'name' => __( 'Select Icon', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 40,
							'step' => 1,
							'default' => 14,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Size of Icon', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'values' => '',
							'default' => '',
							'name' => __( 'Color', 'themestall' ),
							'desc' => __( 'Select color of icon', 'themestall' )
						),
						'icon_title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Icon Title', 'themestall' ),
							'desc' => __( 'Title of icon', 'themestall' )
						),
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Title of address', 'themestall' )
						),
						'address' => array(
							'type' => 'textarea',
							'values' => '',
							'default' => '',
							'name' => __( 'Address', 'themestall' ),
							'desc' => __( 'Address of contact', 'themestall' )
						),
					),
					'desc' => __( '', 'themestall' ),
					'icon' => 'map'
				),
				
				// bg_content
				'bg_content' => array(
					'name' => __( 'Content With Background Image', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(						
						'bg' => array(
							'type' => 'upload',
							'values' => '',
							'default' => '',
							'name' => __( 'Background', 'themestall' ),
							'desc' => __( 'background image of main div', 'themestall' )
						),
					),
					'desc' => __( 'content goes here...', 'themestall' ),
					'icon' => 'image'
				),
				
				// text_color
				'text_color' => array(
					'name' => __( 'Text Color', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(						
						'color' => array(
							'type' => 'color',
							'values' => '',
							'default' => '#ef4416',
							'name' => __( 'Color', 'themestall' ),
							'desc' => __( 'Select color of text', 'themestall' )
						),
					),
					'desc' => __( 'text goes here...', 'themestall' ),
					'icon' => 'image'
				),
				
				// typed
				'typed' => array(
					'name' => __( 'Typed Text', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(						
						'color' => array(
							'type' => 'color',
							'values' => '',
							'default' => '#27293d',
							'name' => __( 'Color', 'themestall' ),
							'desc' => __( 'Select color of text', 'themestall' )
						),
						'text1' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Text 1', 'themestall' ),
							'desc' => __( 'Type seperate by comma', 'themestall' )
						),
						'text2' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Text 2', 'themestall' ),
							'desc' => __( 'Type seperate by comma', 'themestall' )
						),
						'text3' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Text 3', 'themestall' ),
							'desc' => __( 'Type seperate by comma', 'themestall' )
						),
						'text4' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Text 4', 'themestall' ),
							'desc' => __( 'Type seperate by comma', 'themestall' )
						),
					),
					'desc' => __( 'text goes here...', 'themestall' ),
					'icon' => 'image'
				),
				
				// socials_icon
				'socials_icon' => array(
					'name' => __( 'Social Icon', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(						
						'name' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Name', 'themestall' ),
							'desc' => __( 'Social Icon name', 'themestall' )
						),
						'link' => array(
							'type' => 'text',
							'values' => '',
							'default' => '#',
							'name' => __( 'Social Link', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'icon' => array(
							'type' => 'icon',
							'values' => '',
							'default' => '',
							'name' => __( 'Select Icon', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 40,
							'step' => 1,
							'default' => 12,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Size of Icon', 'themestall' )
						),
						
					),
					'desc' => __( 'Socials Icons', 'themestall' ),
					'icon' => 'users'
				),
				
				//superslides
				'superslides' => 
				array(
					'name' => __( 'Super Sliders', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'class' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
					),
					'content' => __( 'Super slide item shortcode goes here', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//superslide
				'superslide' => 
				array(
					'name' => __( 'Super Slider', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Slider Image', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'description' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Description', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
					),
					'content' => __( '', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				//faqs
				'faqs' => 
				array(
					'name' => __( 'FAQs', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Question', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'description' => array(
							'type' => 'textarea',
							'default' => '',
							'name' => __( 'Answer', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
					),
					'content' => __( '', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'check-square-o'
				),
				
				// callout
				'callout' => array(
					'name' => __( 'Callout', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(						
						'title' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Title', 'themestall' )
						),
						'button_text' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Button Text', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'button_link' => array(
							'type' => 'text',
							'values' => '',
							'default' => '#',
							'name' => __( 'Button Link', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),						
					),
					'desc' => __( 'Callout', 'themestall' ),
					'icon' => 'users'
				),
				
				// posts
				'posts' => array(
					'name' => __( 'Posts', 'themestall' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/default-loop.php', 'name' => __( 'Template', 'themestall' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/default-loop.php</b> - posts loop<br/><b%value>templates/teaser-loop.php</b> - posts loop with thumbnail and title<br/><b%value>templates/single-post.php</b> - single post template<br/><b%value>templates/list-loop.php</b> - unordered list with posts titles', 'themestall' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'themestall' ),
							'desc' => __( 'Enter comma separated ID\'s of the posts that you want to show', 'themestall' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Posts per page', 'themestall' ),
							'desc' => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'themestall' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'themestall' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple post types', 'themestall' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Ts_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'themestall' ),
							'desc' => __( 'Select taxonomy to show posts from', 'themestall' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'themestall' ),
							'desc' => __( 'Select terms to show posts from', 'themestall' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'themestall' ),
							'desc' => __( 'IN - posts that have any of selected categories terms<br/>NOT IN - posts that is does not have any of selected terms<br/>AND - posts that have all selected terms', 'themestall' )
						),
						// 'author' => array(
						// 	'type' => 'select',
						// 	'multiple' => true,
						// 	'values' => Ts_Tools::get_users(),
						// 	'default' => 'default',
						// 	'name' => __( 'Authors', 'themestall' ),
						// 	'desc' => __( 'Choose the authors whose posts you want to show. Enter here comma-separated list of users (IDs). Example: 1,7,18', 'themestall' )
						// ),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'themestall' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'themestall' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'themestall' ),
							'desc' => __( 'Enter meta key name to show posts that have this key', 'themestall' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'themestall' ),
							'desc' => __( 'Specify offset to start posts loop not from first post', 'themestall' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'themestall' ),
								'asc' => __( 'Ascending', 'themestall' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'themestall' ),
							'desc' => __( 'Posts order', 'themestall' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'themestall' ),
								'id' => __( 'Post ID', 'themestall' ),
								'author' => __( 'Post author', 'themestall' ),
								'title' => __( 'Post title', 'themestall' ),
								'name' => __( 'Post slug', 'themestall' ),
								'date' => __( 'Date', 'themestall' ), 'modified' => __( 'Last modified date', 'themestall' ),
								'parent' => __( 'Post parent', 'themestall' ),
								'rand' => __( 'Random', 'themestall' ), 'comment_count' => __( 'Comments number', 'themestall' ),
								'menu_order' => __( 'Menu order', 'themestall' ), 'meta_value' => __( 'Meta key values', 'themestall' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'themestall' ),
							'desc' => __( 'Order posts by', 'themestall' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Post parent', 'themestall' ),
							'desc' => __( 'Show childrens of entered post (enter post ID)', 'themestall' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'themestall' ),
								'pending' => __( 'Pending', 'themestall' ),
								'draft' => __( 'Draft', 'themestall' ),
								'auto-draft' => __( 'Auto-draft', 'themestall' ),
								'future' => __( 'Future post', 'themestall' ),
								'private' => __( 'Private post', 'themestall' ),
								'inherit' => __( 'Inherit', 'themestall' ),
								'trash' => __( 'Trashed', 'themestall' ),
								'any' => __( 'Any', 'themestall' ),
							),
							'default' => 'publish',
							'name' => __( 'Post status', 'themestall' ),
							'desc' => __( 'Show only posts with selected status', 'themestall' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'themestall' ),
							'desc' => __( 'Select Yes to ignore posts that is sticked', 'themestall' )
						)
					),
					'desc' => __( 'Custom posts query with customizable template', 'themestall' ),
					'icon' => 'th-list'
				),
				// nominees
				'nominees' => array(
					'name' => __( 'Nominees', 'themestall' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/nominee-loop.php', 'name' => __( 'Template', 'themestall' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/nominee-loop.php</b> - default loop<br/><b%value>templates/nominee-featured.php</b> - Nominee Featured<br/><b%value>templates/nominee-awards-winner.php</b> - Awards Winner', 'themestall' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'themestall' ),
							'desc' => __( 'Enter comma separated ID\'s of the nominies that you want to show', 'themestall' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Nominee per page', 'themestall' ),
							'desc' => __( 'Specify number of nominies that you want to show. Enter -1 to get all nominies', 'themestall' )
						),
						'column' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'themestall' ),
							'desc' => __( 'Column of nominee', 'themestall' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_types(),
							'default' => 'nominee',
							'name' => __( 'Post types', 'themestall' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple nominee types', 'themestall' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Ts_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'themestall' ),
							'desc' => __( 'Select taxonomy to show nominies from', 'themestall' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'themestall' ),
							'desc' => __( 'Select terms to show nominies from', 'themestall' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'themestall' ),
							'desc' => __( 'IN - nominies that have any of selected categories terms<br/>NOT IN - nominies that is does not have any of selected terms<br/>AND - nominies that have all selected terms', 'themestall' )
						),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'themestall' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'themestall' )
						),
						'meta_key' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Award Winner?', 'themestall' ),
							'desc' => __( 'Award winner or not', 'themestall' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'themestall' ),
							'desc' => __( 'Specify offset to start nominies loop not from first nominee', 'themestall' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'themestall' ),
								'asc' => __( 'Ascending', 'themestall' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'themestall' ),
							'desc' => __( 'Nominies order', 'themestall' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'themestall' ),
								'id' => __( 'Nominee ID', 'themestall' ),
								'author' => __( 'Nominee author', 'themestall' ),
								'title' => __( 'Nominee title', 'themestall' ),
								'name' => __( 'Nominee slug', 'themestall' ),
								'date' => __( 'Date', 'themestall' ), 'modified' => __( 'Last modified date', 'themestall' ),
								'parent' => __( 'Nominee parent', 'themestall' ),
								'rand' => __( 'Random', 'themestall' ), 'comment_count' => __( 'Comments number', 'themestall' ),
								'menu_order' => __( 'Menu order', 'themestall' ), 'meta_value' => __( 'Meta key values', 'themestall' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'themestall' ),
							'desc' => __( 'Order nominee by', 'themestall' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Nominee parent', 'themestall' ),
							'desc' => __( 'Show childrens of entered nominee (enter nominee ID)', 'themestall' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'themestall' ),
								'pending' => __( 'Pending', 'themestall' ),
								'draft' => __( 'Draft', 'themestall' ),
								'auto-draft' => __( 'Auto-draft', 'themestall' ),
								'future' => __( 'Future course', 'themestall' ),
								'private' => __( 'Private course', 'themestall' ),
								'inherit' => __( 'Inherit', 'themestall' ),
								'trash' => __( 'Trashed', 'themestall' ),
								'any' => __( 'Any', 'themestall' ),
							),
							'default' => 'publish',
							'name' => __( 'Nominee status', 'themestall' ),
							'desc' => __( 'Show only nominee with selected status', 'themestall' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'themestall' ),
							'desc' => __( 'Select Yes to ignore nominee that is sticked', 'themestall' )
						)
					),
					'desc' => __( 'Custom nominee query with customizable template', 'themestall' ),
					'icon' => 'th-list'
				),
				// dummy_text
				'dummy_text' => array(
					'name' => __( 'Dummy text', 'themestall' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'what' => array(
							'type' => 'select',
							'values' => array(
								'paras' => __( 'Paragraphs', 'themestall' ),
								'words' => __( 'Words', 'themestall' ),
								'bytes' => __( 'Bytes', 'themestall' ),
							),
							'default' => 'paras',
							'name' => __( 'What', 'themestall' ),
							'desc' => __( 'What to generate', 'themestall' )
						),
						'amount' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Amount', 'themestall' ),
							'desc' => __( 'How many items (paragraphs or words) to generate. Minimum words amount is 5', 'themestall' )
						),
						'cache' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Cache', 'themestall' ),
							'desc' => __( 'Generated text will be cached. Be careful with this option. If you disable it and insert many dummy_text shortcodes the page load time will be highly increased', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Text placeholder', 'themestall' ),
					'icon' => 'text-height'
				),
				// dummy_image
				'dummy_image' => array(
					'name' => __( 'Dummy image', 'themestall' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 500,
							'name' => __( 'Width', 'themestall' ),
							'desc' => __( 'Image width', 'themestall' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 300,
							'name' => __( 'Height', 'themestall' ),
							'desc' => __( 'Image height', 'themestall' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'any'       => __( 'Any', 'themestall' ),
								'abstract'  => __( 'Abstract', 'themestall' ),
								'animals'   => __( 'Animals', 'themestall' ),
								'business'  => __( 'Business', 'themestall' ),
								'cats'      => __( 'Cats', 'themestall' ),
								'city'      => __( 'City', 'themestall' ),
								'food'      => __( 'Food', 'themestall' ),
								'nightlife' => __( 'Night life', 'themestall' ),
								'fashion'   => __( 'Fashion', 'themestall' ),
								'people'    => __( 'People', 'themestall' ),
								'nature'    => __( 'Nature', 'themestall' ),
								'sports'    => __( 'Sports', 'themestall' ),
								'technics'  => __( 'Technics', 'themestall' ),
								'transport' => __( 'Transport', 'themestall' )
							),
							'default' => 'any',
							'name' => __( 'Theme', 'themestall' ),
							'desc' => __( 'Select the theme for this image', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Image placeholder with random image', 'themestall' ),
					'icon' => 'picture-o'
				),
				// animate
				'animate' => array(
					'name' => __( 'Animation', 'themestall' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array_combine( self::animations(), self::animations() ),
							'default' => 'bounceIn',
							'name' => __( 'Animation', 'themestall' ),
							'desc' => __( 'Select animation type', 'themestall' )
						),
						'duration' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 1,
							'name' => __( 'Duration', 'themestall' ),
							'desc' => __( 'Animation duration (seconds)', 'themestall' )
						),
						'delay' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 0,
							'name' => __( 'Delay', 'themestall' ),
							'desc' => __( 'Animation delay (seconds)', 'themestall' )
						),
						'inline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Inline', 'themestall' ),
							'desc' => __( 'This parameter determines what HTML tag will be used for animation wrapper. Turn this option to YES and animated element will be wrapped in SPAN instead of DIV. Useful for inline animations, like buttons', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Animated content', 'themestall' ),
					'desc' => __( 'Wrapper for animation. Any nested element will be animated', 'themestall' ),
					'example' => 'animations',
					'icon' => 'bolt'
				),
				// meta
				'meta' => array(
					'name' => __( 'Meta', 'themestall' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'key' => array(
							'default' => '',
							'name' => __( 'Key', 'themestall' ),
							'desc' => __( 'Meta key name', 'themestall' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'themestall' ),
							'desc' => __( 'This text will be shown if data is not found', 'themestall' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'themestall' ),
							'desc' => __( 'This content will be shown before the value', 'themestall' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'themestall' ),
							'desc' => __( 'This content will be shown after the value', 'themestall' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'themestall' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'themestall' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'themestall' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'themestall' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post meta', 'themestall' ),
					'icon' => 'info-circle'
				),
				// user
				'user' => array(
					'name' => __( 'User', 'themestall' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'display_name'        => __( 'Display name', 'themestall' ),
								'ID'                  => __( 'ID', 'themestall' ),
								'user_login'          => __( 'Login', 'themestall' ),
								'user_nicename'       => __( 'Nice name', 'themestall' ),
								'user_email'          => __( 'Email', 'themestall' ),
								'user_url'            => __( 'URL', 'themestall' ),
								'user_registered'     => __( 'Registered', 'themestall' ),
								'user_activation_key' => __( 'Activation key', 'themestall' ),
								'user_status'         => __( 'Status', 'themestall' )
							),
							'default' => 'display_name',
							'name' => __( 'Field', 'themestall' ),
							'desc' => __( 'User data field name', 'themestall' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'themestall' ),
							'desc' => __( 'This text will be shown if data is not found', 'themestall' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'themestall' ),
							'desc' => __( 'This content will be shown before the value', 'themestall' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'themestall' ),
							'desc' => __( 'This content will be shown after the value', 'themestall' )
						),
						'user_id' => array(
							'default' => '',
							'name' => __( 'User ID', 'themestall' ),
							'desc' => __( 'You can specify custom user ID. Leave this field empty to use an ID of the current user', 'themestall' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'themestall' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'themestall' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'User data', 'themestall' ),
					'icon' => 'info-circle'
				),
				// post
				'post' => array(
					'name' => __( 'Post', 'themestall' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'ID'                    => __( 'Post ID', 'themestall' ),
								'post_author'           => __( 'Post author', 'themestall' ),
								'post_date'             => __( 'Post date', 'themestall' ),
								'post_date_gmt'         => __( 'Post date', 'themestall' ) . ' GMT',
								'post_content'          => __( 'Post content', 'themestall' ),
								'post_title'            => __( 'Post title', 'themestall' ),
								'post_excerpt'          => __( 'Post excerpt', 'themestall' ),
								'post_status'           => __( 'Post status', 'themestall' ),
								'comment_status'        => __( 'Comment status', 'themestall' ),
								'ping_status'           => __( 'Ping status', 'themestall' ),
								'post_name'             => __( 'Post name', 'themestall' ),
								'post_modified'         => __( 'Post modified', 'themestall' ),
								'post_modified_gmt'     => __( 'Post modified', 'themestall' ) . ' GMT',
								'post_content_filtered' => __( 'Filtered post content', 'themestall' ),
								'post_parent'           => __( 'Post parent', 'themestall' ),
								'guid'                  => __( 'GUID', 'themestall' ),
								'menu_order'            => __( 'Menu order', 'themestall' ),
								'post_type'             => __( 'Post type', 'themestall' ),
								'post_mime_type'        => __( 'Post mime type', 'themestall' ),
								'comment_count'         => __( 'Comment count', 'themestall' )
							),
							'default' => 'post_title',
							'name' => __( 'Field', 'themestall' ),
							'desc' => __( 'Post data field name', 'themestall' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'themestall' ),
							'desc' => __( 'This text will be shown if data is not found', 'themestall' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'themestall' ),
							'desc' => __( 'This content will be shown before the value', 'themestall' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'themestall' ),
							'desc' => __( 'This content will be shown after the value', 'themestall' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'themestall' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'themestall' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'themestall' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'themestall' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post data', 'themestall' ),
					'icon' => 'info-circle'
				),
				// post_terms
				// 'post_terms' => array(
				// 	'name' => __( 'Post terms', 'themestall' ),
				// 	'type' => 'single',
				// 	'group' => 'data',
				// 	'atts' => array(
				// 		'post_id' => array(
				// 			'default' => '',
				// 			'name' => __( 'Post ID', 'themestall' ),
				// 			'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'themestall' )
				// 		),
				// 		'links' => array(
				// 			'type' => 'bool',
				// 			'default' => 'yes',
				// 			'name' => __( 'Show links', 'themestall' ),
				// 			'desc' => __( 'Show terms names as hyperlinks', 'themestall' )
				// 		),
				// 		'format' => array(
				// 			'type' => 'select',
				// 			'values' => array(
				// 				'text' => __( 'Terms separated by commas', 'themestall' ),
				// 				'br' => __( 'Terms separated by new lines', 'themestall' ),
				// 				'ul' => __( 'Unordered list', 'themestall' ),
				// 				'ol' => __( 'Ordered list', 'themestall' ),
				// 			),
				// 			'default' => 'text',
				// 			'name' => __( 'Format', 'themestall' ),
				// 			'desc' => __( 'Choose how to output the terms', 'themestall' )
				// 		),
				// 	),
				// 	'desc' => __( 'Terms list', 'themestall' ),
				// 	'icon' => 'info-circle'
				// ),
				// template
				'template' => array(
					'name' => __( 'Template', 'themestall' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'default' => '',
							'name' => __( 'Template name', 'themestall' ),
							'desc' => sprintf( __( 'Use template file name (with optional .php extension). If you need to use templates from theme sub-folder, use relative path. Example values: %s, %s, %s', 'themestall' ), '<b%value>page</b>', '<b%value>page.php</b>', '<b%value>includes/page.php</b>' )
						)
					),
					'desc' => __( 'Theme template', 'themestall' ),
					'icon' => 'puzzle-piece'
				),
				// qrcode
				'qrcode' => array(
					'name' => __( 'QR code', 'themestall' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'data' => array(
							'default' => '',
							'name' => __( 'Data', 'themestall' ),
							'desc' => __( 'The text to store within the QR code. You can use here any text or even URL', 'themestall' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Enter here short description. This text will be used in alt attribute of QR code', 'themestall' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1000,
							'step' => 10,
							'default' => 200,
							'name' => __( 'Size', 'themestall' ),
							'desc' => __( 'Image width and height (in pixels)', 'themestall' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 50,
							'step' => 5,
							'default' => 0,
							'name' => __( 'Margin', 'themestall' ),
							'desc' => __( 'Thickness of a margin (in pixels)', 'themestall' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'themestall' ),
								'left' => __( 'Left', 'themestall' ),
								'center' => __( 'Center', 'themestall' ),
								'right' => __( 'Right', 'themestall' ),
							),
							'default' => 'none',
							'name' => __( 'Align', 'themestall' ),
							'desc' => __( 'Choose image alignment', 'themestall' )
						),
						'link' => array(
							'default' => '',
							'name' => __( 'Link', 'themestall' ),
							'desc' => __( 'You can make this QR code clickable. Enter here the URL', 'themestall' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open link in same window/tab', 'themestall' ),
								'blank' => __( 'Open link in new window/tab', 'themestall' ),
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'themestall' ),
							'desc' => __( 'Select link target', 'themestall' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#000000',
							'name' => __( 'Primary color', 'themestall' ),
							'desc' => __( 'Pick a primary color', 'themestall' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Background color', 'themestall' ),
							'desc' => __( 'Pick a background color', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'desc' => __( 'Advanced QR code generator', 'themestall' ),
					'icon' => 'qrcode'
				),
				
				// products_carousel
				'products_carousel' => array(
					'name' => __( 'Product Carousel', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'style_1' => __( 'Style 1', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' ),
							),
							'default' => 'style_1',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Select style of product carousel', 'themestall' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Product per page', 'themestall' ),
							'desc' => __( 'Specify number of Product that you want to show. Enter -1 to get all Product', 'themestall' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => array(
								'product_cat' => __( 'Product Category', 'themestall' ),
								'product_tag' => __( 'Product Tag', 'themestall' ),
							),
							'default' => 'product_cat',
							'name' => __( 'Taxonomy', 'themestall' ),
							'desc' => __( 'Select taxonomy to show products from', 'themestall' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'themestall' ),
							'desc' => __( 'Select terms to show products from', 'themestall' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'themestall' ),
							'desc' => __( 'IN - products that have any of selected categories terms<br/>NOT IN - products that is does not have any of selected terms<br/>AND - products that have all selected terms', 'themestall' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'themestall' ),
								'asc' => __( 'Ascending', 'themestall' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'themestall' ),
							'desc' => __( 'Product order', 'themestall' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'themestall' ),
								'id' => __( 'Product ID', 'themestall' ),
								'title' => __( 'Product title', 'themestall' ),
								'name' => __( 'Product slug', 'themestall' ),
								'date' => __( 'Date', 'themestall' ),
								'modified' => __( 'Last modified date', 'themestall' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'themestall' ),
							'desc' => __( 'Order product by', 'themestall' )
						),
						'best_seller' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Best Seller', 'themestall' ),
							'desc' => __( 'Is product best seller or not', 'themestall' )
						),					
					),
					'desc' => __( 'Custom product carousel', 'themestall' ),
					'icon' => 'th-list'
				),
				
				// title_subtitle
				'title_subtitle' => array(
					'name' => __( 'Title & Sub-title', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Title', 'themestall' )
						),
						'title_font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 100,
							'step' => 1,
							'default' => 55,
							'name' => __( 'Title Font Size', 'themestall' ),
							'desc' => __( 'Font size of Title(in pixels)', 'themestall' )
						),
						'subtitle' => array(
							'type'		=> 'textarea',
							'default' => '',
							'name' => __( 'Sub-Title', 'themestall' ),
							'desc' => __( 'Sub-Title', 'themestall' )
						),
						'title_top_text' => array(
							'type'		=> 'text',
							'default' => '',
							'name' => __( 'Title Top Text', 'themestall' ),
							'desc' => __( 'Small text over the title', 'themestall' )
						),
						'margin_bottom' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 100,
							'step' => 1,
							'default' => 45,
							'name' => __( 'Margin Bottom', 'themestall' ),
							'desc' => __( 'Bottom Margin of title', 'themestall' )
						),
					),
					
					'class'=> '',
					'desc' => __( 'Single title and sub-title', 'themestall' ),
					'icon' => 'link'
				),
				
				//Team
			'team' =>
				array(
					'name' => __( 'Team', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Choose style for team', 'themestall' ) . '%ts_skins_link%'
						),
						'name' => array(
							'type' => 'text',
							'default' => 'John DOE',
							'name' => __( 'Name', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'Web Designer',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Photo', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'facebook_link' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Facebook Link', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'twitter_link' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Twitter Link', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'linked_in_link' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Twitter Link', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'themestall' ),
							'desc' => __( 'Extra CSS class', 'themestall' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'themestall' ),
					'desc' => __( '', 'themestall' ),
					'icon' => 'male'
				),
				
				// title_span_box
				'title_span_box' => array(
					'name' => __( 'Title & Span', 'themestall' ),
					'type' => 'wrap',
					'group' => 'themestall',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'style_1' => __( 'Style 1', 'themestall' ),
								'style_2' => __( 'Style 2', 'themestall' ),
							),
							'default' => 'style_1',
							'name' => __( 'Style', 'themestall' ),
							'desc' => __( 'Select your title style', 'themestall' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'themestall' ),
							'desc' => __( 'Title', 'themestall' )
						),
						'title_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Title Font Size', 'themestall' ),
							'desc' => __( 'Font size of Title(in pixels)', 'themestall' )
						),
						'title_color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Title Color', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'span_content' => array(
							'default' => '',
							'name' => __( 'Span Content', 'themestall' ),
							'desc' => __( 'Span content', 'themestall' )
						),
						'span_color' => array(
							'type' => 'color',
							'default' => '#121212',
							'name' => __( 'Span Color', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'span_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Span Content Size', 'themestall' ),
							'desc' => __( 'Font size of span', 'themestall' )
						),
						'description' => array(
							'default' => '',
							'name' => __( 'Description', 'themestall' ),
							'desc' => __( 'Description', 'themestall' )
						),
						'des_color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Description Color', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),						
						'box_align' => array(
							'type' => 'select',
							'values' => array(
								'box-center' => __( 'Center', 'themestall' ),
								'box-left' => __( 'Left', 'themestall' ),
								'box-right' => __( 'Right', 'themestall' ),
							),
							'default' => 'box-right',
							'name' => __( 'Box Align', 'themestall' ),
							'desc' => __( 'Choose box align', 'themestall' )
						),
					),
					
					'class'=> '',
					'desc' => __( 'Button shortcode goes here', 'themestall' ),
					'icon' => 'link'
				),
				
				// pricing_table
				'pricing_table' => array(
					'name' => __( 'Pricing', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'template' => array(
							'default' => 'templates/pricing-loop.php', 'name' => __( 'Template', 'themestall' ),
							'desc' => __( '', 'themestall' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 18,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Number of pricing to show', 'themestall' ),
							'desc' => __( 'Specify number of pricing that you want to show. Enter -1 to get all pricing', 'themestall' )
						),

						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'themestall' ),
								'asc' => __( 'Ascending', 'themestall' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'themestall' ),
							'desc' => __( 'Pricing order', 'themestall' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'themestall' ),
								'id' => __( 'Pricing ID', 'themestall' ),
								'title' => __( 'Pricing title', 'themestall' ),
								'name' => __( 'Pricing slug', 'themestall' ),
								'date' => __( 'Date', 'themestall' ), 'modified' => __( 'Last modified date', 'themestall' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'themestall' ),
							'desc' => __( 'Order pricing by', 'themestall' )
						),
						
					),
					'desc' => __( 'Pricing table', 'themestall' ),
					'icon' => 'th-list'
				),
				
				// agencies
				'agencies' => array(
					'name' => __( 'Agencies', 'themestall' ),
					'type' => 'single',
					'group' => 'themestall',
					'atts' => array(
						'per_page' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 100000000,
							'step' => 1,
							'default' => 12,
							'name' => __( 'Number of Agency', 'themestall' ),
							'desc' => __( 'Specify number of agency that you want to show. Enter -1 to get all agency', 'themestall' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'themestall' ),
							'desc' => __( 'Number of column', 'themestall' )
						),
						'nav' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Pagination', 'themestall' ),
							'desc' => __( 'Show Pagination', 'themestall' )
						),						
					),
					'desc' => __( 'Agencies', 'themestall' ),
					'icon' => 'users'
				),
				
				// scheduler
				'scheduler' => array(
					'name' => __( 'Scheduler', 'themestall' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'time' => array(
							'default' => '',
							'name' => __( 'Time', 'themestall' ),
							'desc' => sprintf( __( 'In this field you can specify one or more time ranges. Every day at this time the content of shortcode will be visible. %s %s %s - show content from 9:00 to 18:00 %s - show content from 9:00 to 13:00 and from 14:00 to 18:00 %s - example with minutes (content will be visible each day, 45 minutes) %s - example with seconds', 'themestall' ), '<br><br>', __( 'Examples (click to set)', 'themestall' ), '<br><b%value>9-18</b>', '<br><b%value>9-13, 14-18</b>', '<br><b%value>9:30-10:15</b>', '<br><b%value>9:00:00-17:59:59</b>' )
						),
						'days_week' => array(
							'default' => '',
							'name' => __( 'Days of the week', 'themestall' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the week. Every week at these days the content of shortcode will be visible. %s 0 - Sunday %s 1 - Monday %s 2 - Tuesday %s 3 - Wednesday %s 4 - Thursday %s 5 - Friday %s 6 - Saturday %s %s %s - show content from Monday to Friday %s - show content only at Sunday %s - show content at Sunday and from Wednesday to Friday', 'themestall' ), '<br><br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br><br>', __( 'Examples (click to set)', 'themestall' ), '<br><b%value>1-5</b>', '<br><b%value>0</b>', '<br><b%value>0, 3-5</b>' )
						),
						'days_month' => array(
							'default' => '',
							'name' => __( 'Days of the month', 'themestall' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the month. Every month at these days the content of shortcode will be visible. %s %s %s - show content only at first day of month %s - show content from 1th to 5th %s - show content from 10th to 15th and from 20th to 25th', 'themestall' ), '<br><br>', __( 'Examples (click to set)', 'themestall' ), '<br><b%value>1</b>', '<br><b%value>1-5</b>', '<br><b%value>10-15, 20-25</b>' )
						),
						'months' => array(
							'default' => '',
							'name' => __( 'Months', 'themestall' ),
							'desc' => sprintf( __( 'In this field you can specify the month or months in which the content will be visible. %s %s %s - show content only in January %s - show content from February to June %s - show content in January, March and from May to July', 'themestall' ), '<br><br>', __( 'Examples (click to set)', 'themestall' ), '<br><b%value>1</b>', '<br><b%value>2-6</b>', '<br><b%value>1, 3, 5-7</b>' )
						),
						'years' => array(
							'default' => '',
							'name' => __( 'Years', 'themestall' ),
							'desc' => sprintf( __( 'In this field you can specify the year or years in which the content will be visible. %s %s %s - show content only in 2014 %s - show content from 2014 to 2016 %s - show content in 2014, 2018 and from 2020 to 2022', 'themestall' ), '<br><br>', __( 'Examples (click to set)', 'themestall' ), '<br><b%value>2014</b>', '<br><b%value>2014-2016</b>', '<br><b%value>2014, 2018, 2020-2022</b>' )
						),
						'alt' => array(
							'default' => '',
							'name' => __( 'Alternative text', 'themestall' ),
							'desc' => __( 'In this field you can type the text which will be shown if content is not visible at the current moment', 'themestall' )
						)
					),
					'content' => __( 'Scheduled content', 'themestall' ),
					'desc' => __( 'Allows to show the content only at the specified time period', 'themestall' ),
					'note' => __( 'This shortcode allows you to show content only at the specified time.', 'themestall' ) . '<br><br>' . __( 'Please pay special attention to the descriptions, which are located below each text field. It will save you a lot of time', 'themestall' ) . '<br><br>' . __( 'By default, the content of this shortcode will be visible all the time. By using fields below, you can add some limitations. For example, if you type 1-5 in the Days of the week field, content will be only shown from Monday to Friday. Using the same principles, you can limit content visibility from years to seconds.', 'themestall' ),
					'icon' => 'clock-o'
				),
			) );
		// Return result
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}

class ThemeStall_Shortcodes_Data extends Ts_Data {
	function __construct() {
		parent::__construct();
	}
}
