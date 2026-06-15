<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class EFA_FAQ_Accordion_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'welleats_faq_accordion';
	}

	public function get_title() {
		return __( 'FAQ Accordion', 'elementor-faq-accordion' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'faq', 'accordion', 'toggle', 'questions' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_faq_items',
			[
				'label' => __( 'FAQ Items', 'elementor-faq-accordion' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'faq_question',
			[
				'label'       => __( 'Question', 'elementor-faq-accordion' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'How many people can join a workshop?', 'elementor-faq-accordion' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'faq_answer',
			[
				'label'   => __( 'Answer', 'elementor-faq-accordion' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Enter your answer here.', 'elementor-faq-accordion' ),
			]
		);

		$repeater->add_control(
			'faq_default_open',
			[
				'label'        => __( 'Open by default', 'elementor-faq-accordion' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'elementor-faq-accordion' ),
				'label_off'    => __( 'No', 'elementor-faq-accordion' ),
				'return_value' => 'yes',
				'default'      => '',
			]
		);

		$this->add_control(
			'faq_items',
			[
				'label'       => __( 'Items', 'elementor-faq-accordion' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[ 'faq_question' => 'How many people can join a workshop?' ],
					[ 'faq_question' => 'Do you provide ingredients and materials?' ],
					[ 'faq_question' => 'How long does a workshop last?' ],
				],
				'title_field' => '{{{ faq_question }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_wrapper',
			[
				'label' => __( 'Items', 'elementor-faq-accordion' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_background',
			[
				'label'     => __( 'Item background', 'elementor-faq-accordion' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .we-faq__item'     => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .we-faq__question' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'item_border_radius',
			[
				'label'      => __( 'Border radius', 'elementor-faq-accordion' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'    => [
					'top'    => '16',
					'right'  => '16',
					'bottom' => '16',
					'left'   => '16',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .we-faq__item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'item_gap',
			[
				'label'      => __( 'Gap between items', 'elementor-faq-accordion' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
				'default'    => [ 'size' => 12, 'unit' => 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .we-faq__list' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_number',
			[
				'label' => __( 'Number badge', 'elementor-faq-accordion' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'number_color',
			[
				'label'     => __( 'Number color', 'elementor-faq-accordion' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#999999',
				'selectors' => [
					'{{WRAPPER}} .we-faq__number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_typography',
				'selector' => '{{WRAPPER}} .we-faq__number',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_question',
			[
				'label' => __( 'Question', 'elementor-faq-accordion' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'question_color',
			[
				'label'     => __( 'Color', 'elementor-faq-accordion' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#c96a2a',
				'selectors' => [
					'{{WRAPPER}} .we-faq__question-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'question_typography',
				'selector' => '{{WRAPPER}} .we-faq__question-text',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Icon color', 'elementor-faq-accordion' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#c96a2a',
				'selectors' => [
					'{{WRAPPER}} .we-faq__icon'     => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .we-faq__icon svg' => 'stroke: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'      => __( 'Icon size', 'elementor-faq-accordion' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [ 'px' => [ 'min' => 10, 'max' => 48 ] ],
				'default'    => [ 'size' => 20, 'unit' => 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .we-faq__icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_answer',
			[
				'label' => __( 'Answer', 'elementor-faq-accordion' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'answer_color',
			[
				'label'     => __( 'Color', 'elementor-faq-accordion' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#555555',
				'selectors' => [
					'{{WRAPPER}} .we-faq__answer' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'answer_typography',
				'selector' => '{{WRAPPER}} .we-faq__answer',
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'     => __( 'Divider color', 'elementor-faq-accordion' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#e8e3dc',
				'selectors' => [
					'{{WRAPPER}} .we-faq__answer-inner' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'answer_padding_heading',
			[
				'label'     => __( 'Answer padding', 'elementor-faq-accordion' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'answer_inner_padding',
			[
				'label'      => __( 'Padding (answer block)', 'elementor-faq-accordion' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '24',
					'bottom' => '0',
					'left'   => '24',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .we-faq__answer-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$items    = ! empty( $settings['faq_items'] ) ? $settings['faq_items'] : [];

		if ( empty( $items ) ) {
			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
				echo '<p style="padding:20px;color:#999;">' . esc_html__( 'Add FAQ items in the Content tab.', 'elementor-faq-accordion' ) . '</p>';
			}
			return;
		}
		?>
		<div class="we-faq">
			<ul class="we-faq__list" role="list">
				<?php foreach ( $items as $index => $item ) :
					$is_open    = isset( $item['faq_default_open'] ) && 'yes' === $item['faq_default_open'];
					$item_id    = isset( $item['_id'] ) ? $item['_id'] : $index;
					$item_class = 'we-faq__item elementor-repeater-item-' . $item_id;
					if ( $is_open ) {
						$item_class .= ' we-faq__item--open';
					}
					$panel_id = 'we-faq-answer-' . $item_id;
					?>
				<li class="<?php echo esc_attr( $item_class ); ?>">
					<button
						class="we-faq__question"
						aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
					>
						<span class="we-faq__number" aria-hidden="true"><?php echo absint( $index + 1 ); ?>.</span>
						<span class="we-faq__question-text"><?php echo esc_html( isset( $item['faq_question'] ) ? $item['faq_question'] : '' ); ?></span>
						<span class="we-faq__icon" aria-hidden="true">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
					</button>
					<div
						class="we-faq__answer-wrap"
						id="<?php echo esc_attr( $panel_id ); ?>"
						role="region"
					>
						<div class="we-faq__answer-inner">
							<div class="we-faq__answer">
								<?php echo wp_kses_post( isset( $item['faq_answer'] ) ? $item['faq_answer'] : '' ); ?>
							</div>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}
