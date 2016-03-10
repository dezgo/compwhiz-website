<?php
/**
 * Database connection class.
 * courtesy of Snipplr - http://snipplr.com/view/22992/
 * $db = new db(array(host, user, password, database));
 * $db->connect();
 * $clean = $db->clean($dirty);
 * $db->query("");
 * $db->disconnect();
 */
class db {
     
	private $db = array();
	private $connection;
	private $data = array();
	
	public function db() {
		$this->db['server']	= 'localhost';
		$this->db['username'] = 'admin';
		$this->db['password'] = 'QfbgcE$Mjc1F1e*hJw!x';
		$this->db['database'] = 'CompWhiz';

// crazy domains
		$this->db['server']	= 'localhost';
		$this->db['username'] = 'computer_admin';
		$this->db['database'] = 'computer_compwhiz';
		$this->db['password'] = '!x!NomN3MLOhWP5tvo7V';
	}
	
	public function __get($var) {
		switch ($var) {
			case 'error':
				return $this->connection->error;
		}
	}
	
	public function connect() {
		$this->connection = new mysqli($this->db["server"], $this->db["username"], $this->db["password"]);
	}
	
	public function selectdb() {
		$this->connection->select_db($this->db['database']);
	}
		     
	public function disconnect() {
		$this->connection->close();
		$this->connection = null; 
	}
	     
	public function insert_id() {
		return $this->connection->insert_id;
	}
	
	public function affected_rows() {
		return $this->connection->affected_rows;
	}
	
	public function query($sql) {
		return $this->connection->query($sql); 
	}
	     
	public function is_connected() {
		return ($this->connection) ? true : false; 
	}
	     
	public function clean($dirty) {
		if (!is_array($dirty)) {
			$dirty = preg_replace("/[\'\"\)\(;|`,<>]/", "", $dirty);
			$dirty = mysqli_real_escape_string($this->connection, trim($dirty));
			$clean = stripslashes($dirty);
			return $clean; 
		};
		$clean = array();
		foreach ($dirty as $p=>$data) {
			$data = preg_replace("[\'\")(;|`,<>]", "", $data);
			$data = mysqli_real_escape_string($this->connection, trim($data));
			$data = stripslashes($data);
			$clean[$p] = $data; 
		};
		return $clean; 
	}
}

class db_query {
	function __construct() {
		$this->db = new db();
		$this->db->connect();
		$this->db->selectdb();
	}
	
	public function __get($var) {
		switch ($var) {
			case 'error':
				return $this->db->error;
		}
	}
	
	public function dropDB() {
		$sql="DROP DATABASE CompWhiz";
		return $this->db->query($sql);
	}
	public function getName($p_email, &$p_firstname, &$p_lastname) {
		$sql="SELECT varFirstname, varLastname FROM tblClients WHERE varEmail='$p_email'";
		$result = $this->db->query($sql);
		$row = $result->fetch_row() or die("ERROR: No client with email address $p_email");
		$p_firstname = $row[0];
		$p_lastname = $row[1];
	}
	
	public function isActive($p_email) {
		$sql="SELECT intActive FROM tblClients WHERE varEmail='$p_email'";
		$result = $this->db->query($sql);
		if ($result->num_rows == 0) {
			return NULL;
		} else {
			$row = $result->fetch_row();
			return $row[0];
		}
	}

	public function clientClearActivationKey($p_id) {
		$sql = "UPDATE tblClients SET varActivationKey = '' WHERE intID = ".$this->db->clean($p_id);
		$this->db->query($sql);
	
		return $this->db->affected_rows() == 1;
	}
	
	public function clientSetActivationKey($p_id, &$p_code) {
		$p_code = uniqid();
		$sql = "UPDATE tblClients SET varActivationKey = '".$p_code."' WHERE intID = ".$this->db->clean($p_id);
		$this->db->query($sql);
	
		return $this->db->affected_rows() == 1;
	}
	
	public function clientUpdate($p_id, $p_firstname, $p_lastname, $p_email) {
		$sql = "UPDATE tblClients SET ";
		$sql .= "varFirstname = '".$this->db->clean($p_firstname)."', ";
		$sql .= "varLastname = '".$this->db->clean($p_lastname)."', ";
		$sql .= "varEmail = '".$this->db->clean($p_email)."' ";
		$sql .= "WHERE ";
		$sql .= "intID = ".$this->db->clean($p_id);
		$this->db->query($sql);
	
		return $this->db->affected_rows() == 1;
	} 
	
	public function clientInsert(&$p_id, $p_firstname, $p_lastname, $p_email, $p_password, &$p_code) {
		$p_code = uniqid();
		$sql = "INSERT INTO `tblClients`(`varFirstname`, `varLastname`, `varEmail`, `varPassword`, `intActive`, `varActivationKey`";
		$sql .= ") VALUES (";
		$sql .= "'$p_firstname', '$p_lastname', '$p_email', '".hash('WHIRLPOOL',$p_password)."', 0, '$p_code')";
		$ok = $this->db->query($sql);
	
		if ($ok) {
			$p_id = $this->db->insert_id();
			return true;
		}
		else
			return false;
	} 
	
	public function clientLoad_byEmail($p_email) {
		$sql = "SELECT * FROM tblClients WHERE varEmail = '".$this->db->clean($p_email)."'";
		return $this->db->query($sql);
	}
	
	public function clientLoad_byActivationKey($p_activationkey) {
		$sql = "SELECT * FROM tblClients WHERE varActivationKey = '".$p_activationkey."'";
		return $this->db->query($sql);
	}
	
	public function resetPassword($p_id, $p_newpassword) {
		$sql = "UPDATE tblClients SET ";
		$sql .= "varPassword = '".hash('WHIRLPOOL',$this->db->clean($p_newpassword))."' ";
		$sql .= "WHERE ";
		$sql .= "intID = ".$this->db->clean($p_id);
		$result = $this->db->query($sql);
		return ($this->db->affected_rows() == 1);
	}
	
	public function clientActivate($p_activationkey) {
		$sql = "UPDATE tblClients SET intActive = 1, varActivationKey = '' WHERE intActive = 0 AND varActivationKey = '".$this->db->clean($p_activationkey)."'";
		$result = $this->db->query($sql);
		return ($this->db->affected_rows() == 1);
	}
	
	public function getEmail($p_activationkey) {
		$sql = "SELECT varEmail FROM tblClients WHERE varActivationKey = '".$this->db->clean($p_activationkey)."'";
		$result = $this->db->query($sql);
		if ($result->num_rows == 0) {
				return NULL;
		} else {
			$row = $result->fetch_row();
			return $row[0];
		}
	}
	
	function __destruct() {
		$this->db->disconnect();		
	}	
}

class client {
	private $db_query;
	private $id;

	public $firstname;
	public $lastname;
	public $password;
	public $email;
	public $active;
	public $code;
	
	function __construct() {
		$this->db_query = new db_query();
	}
	function __destruct() {
		$this->db_query = NULL;
	}
	
	public function load_byActivationKey($p_activationKey) {
		$result = $this->db_query->clientLoad_byActivationKey($p_activationKey);
		if ($result->num_rows == 0) {
			return false;
		} else {
			$row = $result->fetch_assoc();
			$this->id = $row['intID'];
			$this->firstname = $row['varFirstname'];
			$this->lastname = $row['varLastname'];
			$this->password = $row['varPassword'];
			$this->email = $row['varEmail'];
			$this->active = $row['intActive'];
			$this->code = $row['varActivationKey'];
			return true;
		}
	}
	
	public function load_byEmail($p_email) {
		$result = $this->db_query->clientLoad_byEmail($p_email);
		if ($result->num_rows == 0) {
			return false;
		} else {
			$row = $result->fetch_assoc();
			$this->id = $row['intID'];
			$this->firstname = $row['varFirstname'];
			$this->lastname = $row['varLastname'];
			$this->password = $row['varPassword'];
			$this->email = $row['varEmail'];
			$this->active = $row['intActive'];
			$this->code = $row['varActivationKey'];
			return true;
		}
	}
	
	public function create() {
		return $this->db_query->clientInsert($this->id, $this->firstname, $this->lastname, $this->email, "", $this->code) == true;
	}
	
	public function update() {
		return $this->db_query->clientUpdate($this->id, $this->firstname, $this->lastname, $this->email);
	}
	
	public function activate() {
		return $this->db_query->clientActivate($this->code);
	}
	
	public function clearActivationKey() {
		return $this->db_query->clientClearActivationKey($this->id);
	}
	
	public function setActivationKey() {
		return $this->db_query->clientSetActivationKey($this->id, $this->code);
	}
	
	public function resetPassword($p_password) {
		if ($this->password == hash('WHIRLPOOL',$p_password))
			return true;
		else
			return $this->db_query->resetPassword($this->id, $p_password);
	}
	
	public function checkLogin($p_email, $p_password) {
		return (hash('WHIRLPOOL',$p_password) == $this->password);
	}
}
?>