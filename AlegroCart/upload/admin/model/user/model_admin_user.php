<?php //AdminModelUser AlegroCart
class Model_Admin_User extends Model {

	public function __construct(&$locator) {
		$this->config   =& $locator->get('config');
		$this->database =& $locator->get('database');
		$this->language =& $locator->get('language');
		$this->request  =& $locator->get('request');
		$this->session  =& $locator->get('session');
	}

	public function insert_user(){
		$sql = "insert into user set username = '?', password = '?', firstname = '?', lastname = '?', position ='?', email = '?', telephone ='?', mobile = '?', fax ='?', monogram ='?', signature ='?', user_group_id = '?', date_added = now()";
		$this->database->query($this->database->parse($sql, $this->request->sanitize('username', 'post'), md5($this->request->sanitize('password', 'post')), $this->request->sanitize('firstname', 'post'), $this->request->sanitize('lastname', 'post'), $this->request->sanitize('position', 'post'), $this->request->sanitize('email', 'post'), $this->request->sanitize('telephone', 'post'), $this->request->sanitize('mobile', 'post'), $this->request->sanitize('fax', 'post'), $this->request->sanitize('monogram', 'post'), $this->request->sanitize('signature', 'post'), $this->request->gethtml('user_group_id', 'post')));
	}

	public function update_user($user_id){
		$sql = "update user set username = '?', firstname = '?', lastname = '?', position ='?', email = '?', telephone ='?', mobile = '?', fax ='?', monogram ='?', signature ='?', user_group_id = '?', date_added = now() where user_id = '?'";
		$this->database->query($this->database->parse($sql, $this->request->sanitize('username', 'post'), $this->request->sanitize('firstname', 'post'), $this->request->sanitize('lastname', 'post'), $this->request->sanitize('position', 'post'), $this->request->sanitize('email', 'post'), $this->request->sanitize('telephone', 'post'), $this->request->sanitize('mobile', 'post'), $this->request->sanitize('fax', 'post'), $this->request->sanitize('monogram', 'post'), $this->request->sanitize('signature', 'post'), $this->request->gethtml('user_group_id', 'post'), (int)$user_id));
	}

	public function update_password($user_id){
		$sql = "update user set password = '?' where user_id = '?'";
		$this->database->query($this->database->parse($sql, md5($this->request->sanitize('password', 'post')), (int)$user_id));
	}

	public function get_password($user_id){ 
		$sql = "SELECT password FROM user WHERE user_id = '?'";
		$result = $this->database->getRow($this->database->parse($sql, (int)$user_id));
		return $result['password'];
	}

	public function delete_user($user_id){
		$this->database->query("delete from user where user_id = '" . (int)$user_id . "'");
	}

	public function get_user($user_id){ 
		$result = $this->database->getRow("select distinct * from user where user_id = '" . (int)$user_id . "'");
		return $result;
	}

	public function get_user_groups(){
		$results = $this->database->getRows("select user_group_id, name from user_group");
		return $results;
	}

	public function get_page($sql){
		$results = $this->database->getRows($this->database->splitQuery($this->database->parse($sql, '%' . $this->session->get('user.search') . '%'), $this->session->get('user.page'), $this->config->get('config_max_rows')));
		return $results;
	}

	public function get_text_results(){
		$text_results = $this->language->get('text_results', $this->database->getFrom(), $this->database->getTo(), $this->database->getTotal());
		return $text_results;
	}

	public function get_pagination(){
		$page_data = array();
		for ($i = 1; $i <= $this->get_pages(); $i++) {
			$page_data[] = array(
				'text'  => $this->language->get('text_pages', $i, $this->get_pages()),
				'value' => $i
			);
		}
		return $page_data;
	}

	public function get_pages(){ 
		$pages = $this->database->getpages();
		return $pages;
	}

	public function get_last_id(){
		$result = $this->database->getLastId();
		return $result;
	}
}
?>
