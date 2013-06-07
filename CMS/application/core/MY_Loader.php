<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Loader Class
 *
 * @author Drew Harvey (http://www.daharveyjr.com/)
 *
 * This class extends the CI_Loader class, and adds tiles functionality.
 */
class MY_Loader extends CI_Loader {

	protected $_tilesets = array();

	function __construct() {
		parent::__construct();
		$this->helper('form_helper');

		$this->_tilesets = array(
			'base' => array(
				'base' => 'tiles/base/layout',
				'header' => 'tiles/base/header',
				'navigation' => 'tiles/base/navigation',
				'footer' => 'tiles/base/footer',
				'sidebar' => 'tiles/base/sidebar'
				)
				);
	}

	/**
	 * Load Tile
	 *
	 * This function is used to load a "tile" file.  It has three parameters:
	 *
	 * 1. The name of the "tile" file to be included.
	 * 2. An associative array of data to be extracted for use in the tile.
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function tile($tileset = 'base', $view, $vars = array(), $return_flag = false) {

		$this->_tilesets = array(
			$tileset => array(
					'base' => 'tiles/'.$tileset.'/layout',
					'header' => 'tiles/'.$tileset.'/header',
					'navigation' => 'tiles/'.$tileset.'/navigation',
					'footer' => 'tiles/'.$tileset.'/footer',
					'sidebar' => 'tiles/'.$tileset.'/sidebar'
					)
			);

				$data = array();

				// Get CI instance
				$CI =& get_instance();
				$vars['error_string'] = validation_errors();
				$vars['flash_message'] = $CI->session->flashdata('flash_message');
				unset($CI);

				// Meta Checks
				$vars['meta_keywords'] = (!empty($vars['meta_keywords'])) ? $vars['meta_keywords'] : '';
				$vars['meta_description'] = (!empty($vars['meta_description'])) ? $vars['meta_description'] : '';

				// Create Response & Tile
				if (!isset($vars['title'])) {
					$data['title'] = "Ignite Reviews";
				} else {
					$data['title'] = $vars['title'];
				}

				if (!isset($vars['navigation'])) {
					$vars['navigation'] = $this->view($this->_tilesets[$tileset]['navigation'], $vars, true);
				} else {
					$vars['navigation'] = $this->view($vars['navigation'], $vars, true);
				}

				if (!isset($vars['header'])) {
					$vars['header'] = $this->view($this->_tilesets[$tileset]['header'], $vars, true);
				} else {
					$data['header'] = $this->view($vars['header'], $vars, true);
				}

				if (!isset($vars['footer'])) {
					$data['footer'] = $this->view($this->_tilesets[$tileset]['footer'], $vars, true);
				} else {
					$data['footer'] = $this->view($vars['footer'], $vars, true);
				}

				if (!isset($vars['sidebar'])) {
					$vars['sidebar'] = $this->view($this->_tilesets[$tileset]['sidebar'], $vars, true);
				} else {
					$data['sidebar'] = $this->view($vars['sidebar'], $vars, true);
				}

				$data['content'] = $this->view($view, $vars, true);

				return $this->view($this->_tilesets[$tileset]['base'], $data, $return_flag);

	}

}

/* End of file MY_Loader.php */