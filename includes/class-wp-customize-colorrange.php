<?php
/**
 * Customizer Extentions
 *
 * @package themebergertest
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	class WP_Customize_Colorrange extends WP_Customize_Control {
		public $type = 'colorrange';
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );

			$defaults = array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			);

			$args = wp_parse_args( $args, $defaults );

			$this->min           = $args['min'];
			$this->max           = $args['max'];
			$this->step          = $args['step'];
			$this->field_id      = $args['settings'];
			$this->field_default = $args['default'];
		}
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input
					id="<?php echo esc_attr( $this->field_id ); ?>"
					class='color-range-slider'
					style="--thumb-color-h:<?php echo esc_attr( $this->value() ); ?>;"
					min="<?php echo esc_attr( $this->min ); ?>"
					max="<?php echo esc_attr( $this->max ); ?>"
					step="<?php echo esc_attr( $this->step ); ?>"
					type='range'
					<?php $this->link(); ?>
					value="<?php echo esc_attr( $this->value() ); ?>"
					oninput="jQuery(this).next('input').val( jQuery(this).val());jQuery(this).get(0).style.setProperty('--thumb-color-h',jQuery(this).val())"
				>
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() ).trigger('input')" type='text' value='<?php echo esc_attr( $this->value() ); ?>' style="width: 50px;height: 29px;border-radius: 3px;">
				<button type="button"
					class="button default"
					aria-label="Reset"
					onclick="jQuery('#<?php echo esc_attr( $this->field_id ); ?>').val('<?php echo esc_attr( $this->value() ); ?>').trigger('input')"
				>Reset</button>
				<button type="button"
					class="button default"
					aria-label="Default"
					onclick="jQuery('#<?php echo esc_attr( $this->field_id ); ?>').val('<?php echo esc_attr( $this->field_default ); ?>').trigger('input')"
				>Default</button>
			</label>
			<?php
		}
	}

}
