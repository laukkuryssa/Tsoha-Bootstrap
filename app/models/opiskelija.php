<?php

class Opiskelija extends BaseModel{
    
	public $id, $name, $opiskelijanumero, $email, $username, $password;

	public function __construct($attributes){
    	parent::__construct($attributes);
  	}

 	public static function all(){
  		$query = DB::connection()->prepare('SELECT * FROM Opiskelija');
  		$query->execute();
  		$rows = $query->fetchAll();

  		$opiskelijat = array();

  		foreach($rows as $row){
      $opiskelijat[] = new Opiskelija(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'opiskelijanumero' => $row['opiskelijanumero'],
        'email' => $row['email'],
        'username' => $row['username'],
        'password' => $row['password']
      ));
    }

    return $opiskelijat;
  }

  public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Opiskelija WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $opiskelija[] = new Opiskelija(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'opiskelijanumero' => $row['opiskelijanumero'],
        'email' => $row['email'],
        'username' => $row['username'],
        'password' => $row['password']
      ));

      return $opiskelija;
    }

    return null;
  }

  public static function authenticate($username, $password){
  $query = DB::connection()->prepare('SELECT * FROM Opiskelija WHERE username = :username AND password = :password LIMIT 1');
$query->execute(array('username' => $username, 'password' => $password));
$row = $query->fetch();



if($row){
  $opiskelija[] = new Opiskelija(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'opiskelijanumero' => $row['opiskelijanumero'],
        'email' => $row['email'],
        'username' => $row['username'],
        'password' => $row['password']
      ));
      Kint::dump($opiskelija);
      return $opiskelija[0];
    }
  return null;

}
}