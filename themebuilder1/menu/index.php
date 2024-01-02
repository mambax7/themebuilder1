<?php
define('_DOC_ROOT', dirname(__FILE__) . '/');

if (file_exists("../../../../../mainfile.php")) {   
include("../../../../../mainfile.php");  
}

/**
 * GController
 * This is the base class for all controllers
 * Every controller will extend this class
 */
class GController {

	protected $db;

	/**
	 * Constructor. Initialize database connection
	 */
	public function __construct() {
		include _DOC_ROOT . 'includes/db.php';
		$this->db = new DB;
		//$this->db->Connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	/**
	 * Includes the view file and display the data
	 *
	 * @param string $view_file
	 * @param array $data
	 */
	protected function view($view_file, $data = '') {
		if (is_array($data)) {
			extract($data);
		}
		$file = _DOC_ROOT . 'templates/' . $view_file . '.php';
		if (file_exists($file)) {
			include $file;
		} else {
			die("Cannot include $view_file");
		}
	}



	/**
	 * Get menu from database, and generate html nested list
	 *
	 * @param int $group_id
	 * @param string $attr
	 * @return string
	 */
	protected function easymenu($group_id, $attr = '') {
		include_once _DOC_ROOT . 'includes/tree.php';
		$tree = new Tree;

		$sql = sprintf(
			'SELECT * FROM %s WHERE group_id = %s ORDER BY %s, %s',
			$xoopsDB->prefix('menu'),
			$group_id,
			'parent_id',
			$position
		);
		$menu = $this->db->GetAll($sql);
		foreach ($menu as $row) {
			$label = '<a href="'.$row['url'].'">';
			$label .= $row['title'];
			$label .= '</a>';

			$li_attr = '';
			if ($row['class']) {
				$li_attr = ' class="'.$row['class'].'"';
			}
			$tree->add_row($row['id'], $row['parent_id'], $li_attr, $label);
		}
		$menu = $tree->generate_list($attr);
		return $menu;
	}
}

/**
 * default controller & method
 */
$controller = 'home';
$method = 'index';

/**
 * url structure: index.php?act=controller.method
 */
if (isset($_GET['act'])) {
	$act = explode('.', $_GET['act']);
	$controller = $act[0];
	if (isset($act[1])) {
		$method = $act[1];
	}
}

$controller_file = _DOC_ROOT . 'modules/' . $controller . '.php';
if (file_exists($controller_file)) {
	include $controller_file;
	$Class_name = ucfirst($controller);
	$instance = new $Class_name;
	if (!is_callable(array($instance, $method))) {
		die("Cannot call method $method");
	}
	$instance->$method();
} else {
	die("Cannot include controller $controller");
}

/* End of index.php */