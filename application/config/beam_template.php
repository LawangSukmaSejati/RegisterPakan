<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Beam-Template
 * 
 * @package Beam-Template
 * @category Config
 * @author Ardi Soebrata
 */
/**
 * Beam-Template Configuration.
 */

/**
 * Path to Template Layout.
 * 
 * Default: 'application/views/layouts' 
 */
$config['beam_template']['layout_path'] = 'layouts';

/**
 * Default Template Layout
 * 
 * The default layout to use 
 * Default: 'default'
 */
$config['beam_template']['default_layout'] = 'default';

/**
 * Path to Assets
 * 
 * Path to your assets files, default to 'assets'.
 */
$config['beam_template']['assets_path'] = array(
	'beckend'		=>'assets/beckend',
	'frontend'		=>'assets/frontend',
	);

/**
 * Default Site Title
 */
$config['beam_template']['base_title'] = 'KKP';

/**
 * Title Separator 
 */
$config['beam_template']['title_separator'] = ' | ';

/**
 * Default Site Metas
 */
$config['beam_template']['metas'] = array(
	'description'	=> 'My Site description',
	'author'		=> 'Muhamad Jafar Sidik',
	'viewport'		=> 'width=device-width, initial-scale=1'
);

/**
 * Default CSS 
 */
$config['beam_template']['css'] = array(
	'beckend'=>array(
		'css/cloud-admin',	
		'css/themes/default',	
		'css/responsive',	
		'font-awesome/css/font-awesome.min',
		'js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min',
		'css/css-google-font',
		'js/bootstrap-daterangepicker/daterangepicker-bs3',
		'js/uniform/css/uniform.default.min',	
		'css/animatecss/animate.min',
		'css/datatables-3',
		'js/select2/select2.min',
		'css/jquery.pnotify.default',
		'js/bootstrap3-editable/css/bootstrap-editable',
		'js/tokenfield/dist/css/bootstrap-tokenfield',
		'js/datepicker/themes/default.min',
		'js/datepicker/themes/default.date.min',
		'js/dropzone/dropzone.min',
	),
	'frontend' =>array(
		'css/bootstrap',
		'css/default-style' => array(
		'style' => '
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}'
		),
		'css/bootstrap-theme',
		'css/simple-lists',
		'css/jquery.pnotify.default',
	)
);

/**
 * Default Javascript
 */
$config['beam_template']['js_header'] = array(
	'beckend'=>array(
		'js/jquery/jquery-2.0.3.min',		
		'js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min',
		'bootstrap-dist/js/bootstrap.min',
		'bootstrap-dist/js/bootstrap-button',
        'js/jQuery-BlockUI/jquery.blockUI.min',
        'js/bootbox/bootbox.min',
		'js/bootstrap-daterangepicker/moment.min',
		'js/bootstrap-daterangepicker/daterangepicker.min',
		'js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min',
		'js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min',
		'js/jQuery-Cookie/jquery.cookie.min',
		'js/uniform/jquery.uniform.min',
		'js/datatables/media/js/jquery.dataTables.min',
		'js/datatables-3',
		'js/jquery-validate/jquery.validate.min',
		'js/jquery.pnotify',
		'js/select2/select2.min',
		'js/bootstrap3-editable/js/bootstrap-editable',
		'js/datepicker/picker',
		'js/datepicker/picker.date',
		'js/datepicker/picker.time',
		'js/tokenfield/dist/bootstrap-tokenfield',
		'js/dropzone/dropzone.min',
		'js/script',
	),
	'frontend'=>array(
		'js/jquery/jquery-2.0.3.min',
		'js/jquery-validate/jquery.validate.min',
		'js/jquery.pnotify',
	),
);
$config['beam_template']['js_footer'] = array(
	'beckend'=>array(
		
	),
	'frontend'=>array(
		'js/bootstrap',		
	),
);
