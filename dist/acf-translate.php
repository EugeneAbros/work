<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59885c5e72b8c',
	'title' => 'Praca',
	'fields' => array (
		array (
			'key' => 'field_599d6c2063a9a',
			'label' => pll__( 'Tekst wypełniany przez pracownika' ),
      'type' => 'tab'
		),
		array (
			'key' => 'field_59885c6574ef3',
			'label' => pll__( 'Miasto' ),
			'name' => 'city_field'


		),
		array (
			'key' => 'field_599ffb3d708ef',
			'label' => pll__( 'Województwo' ),
			'name' => 'city_place',
			'type' => 'text'

		),
		array (
			'key' => 'field_59885c6f52647',
			'label' => pll__( 'Kwota od' ),
			'name' => 'price_low',
			'type' => 'number'

		),
		array (
			'key' => 'field_59885c8687028',
			'label' => pll__( 'Kwota do' ),
			'name' => 'price_hight',
			'type' => 'number'

		),
		array (
			'key' => 'field_59885c9787029',
			'label' => pll__( 'Brutto / Netto' ),
			'name' => 'vat_cost',
			'type' => 'text'

		),
		array (
			'key' => 'field_598d81d305306',
			'label' => pll__( 'Ilość wakatów' ),
			'name' => 'number_wakat',
			'type' => 'text'

		),

		array (
			'key' => 'field_599bf32319f83',
			'label' => pll__( 'Opis Stanowiska' ),
			'name' => 'detail_position',
			'type' => 'wysiwyg'

		),

		array (
			'key' => 'field_599bf35f19f85',
			'label' => pll__( 'Zakres obowiązków' ),
			'name' => 'responsibilities',
			'type' => 'repeater',
			'instructions' => pll__( 'Kliknij "Dodaj wiersz" aby dodać zakres obowiązków' ),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => pll__( 'Dodaj wiersz' ),
			'sub_fields' => array (
				array (
					'key' => 'field_599bf37419f86',
					'label' => 'Opis',
					'name' => 'responsibilities_text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
		array (
			'key' => 'field_599bf39719f88',
			'label' => pll__( 'Galeria' ),
			'name' => 'gallery_job',
			'type' => 'repeater',
			'instructions' => '',
			'required' => '',
			'conditional_logic' => '',
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Dodaj wiersz',
			'sub_fields' => array (
				array (
					'key' => 'field_599bf3a519f89',
					'label' => pll__( 'Zdjęcie' ),
					'name' => 'image_job_gallery',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),

		array (
			'key' => 'field_599d6ac0d3553',
			'label' => pll__( 'Firma' ),
			'name' => 'firma',
			'type' => 'text'

		),
		array (
			'key' => 'field_599d6cb9916ea',
			'label' => pll__( 'E-mail' ),
			'name' => 'email',
			'type' => 'text'

		),
		array (
			'key' => 'field_599d6cc0916eb',
			'label' => pll__( 'Telefon' ),
			'name' => 'telefon',
			'type' => 'text'

		),
		array (
			'key' => 'field_599d6cc6916ec',
			'label' => pll__( 'Nip pracodawcy' ),
			'name' => 'nip_pracodawcy',
			'type' => 'text'

		),
		array (
			'key' => 'field_599d6cf3916ed',
			'label' => pll__( 'Stanowisko pracy na jakie poszukujecie Państwo pracowników' ),
			'name' => 'stanowisko',
			'type' => 'text'

		),
		array (
			'key' => 'field_599d6d7e916f3',
			'label' => pll__( 'Czy potrzebują Państwo tylko wykwalifikowanych specjalistów, czy mogłyby to być też osoby chętne do przyuczenia się do zawodu?' ),
			'name' => 'kwalifikacje',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				pll__( 'Tylko wykwalifikowane osoby z doświadczeniem' ) => pll__( 'Tylko wykwalifikowane osoby z doświadczeniem' ),
				pll__( 'Mogą to być osoby do przyuczenia w zwodzie' ) => pll__( 'Mogą to być osoby do przyuczenia w zwodzie' ),
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_599d6e14916f6',
			'label' => pll__( 'Kto płaci za zakwaterowanie pracownika ?' ),
			'name' => 'zakwaterowanie',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				pll__( 'Pracodawca' ) => pll__( 'Pracodawca' ),
				pll__( 'Pracownik' ) => pll__( 'Pracownik' ),
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_599d6e33916f7',
			'label' => pll__( 'Jaki jest koszt zakwaterowania ? ( wypełniamy tylko w przypadku płatności po stronie pracownika )' ),
			'name' => 'koszt_zakwaterowania',
			'type' => 'wysiwyg'

		),
		array (
			'key' => 'field_599d6e4f916f8',
			'label' => pll__( 'Jaką formę współpracy z nami, wybieracie Państwo' ),
			'name' => 'forma_wspolpracy',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'praca',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
