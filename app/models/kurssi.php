<?php

class Kurssi extends BaseModel{
    
	public $id, $name, $luennoitsija, $opintopisteet, $luentoajat, $esitiedot, $kuvaus, $harjoitusryhmat, $alkamisajankohta, $loppumisajankohta, $ilmoalkaa, $ilmoloppuu;

	public function __construct($attributes){
    	parent::__construct($attributes);
      $this->validators = array('validate_name', 'validate_luennoitsija', 'validate_opintopisteet', 'validate_alkamisajankohta', 'validate_loppumisajankohta', 'validate_ilmoalkaa', 'validate_ilmoloppuu');
  	}

 	public static function all(){
  		$query = DB::connection()->prepare('SELECT * FROM Kurssi');
  		$query->execute();
  		$rows = $query->fetchAll();

  		$kurssit = array();

  		foreach($rows as $row){
      $kurssit[] = new Kurssi(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'luennoitsija' => $row['luennoitsija'],
        'opintopisteet' => $row['opintopisteet'],
        'luentoajat' => $row['luentoajat'],
        'esitiedot' => $row['esitiedot'],
        'kuvaus' => $row['kuvaus'],
        'harjoitusryhmat' => $row['harjoitusryhmat'],
        'alkamisajankohta' => $row['alkamisajankohta'],
        'loppumisajankohta' => $row['loppumisajankohta'],
        'ilmoalkaa' => $row['ilmoalkaa'],
        'ilmoloppuu' => $row['ilmoloppuu']
      ));
    }

    return $kurssit;
  }

  public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Kurssi WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $kurssi[] = new Kurssi(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'luennoitsija' => $row['luennoitsija'],
        'opintopisteet' => $row['opintopisteet'],
        'luentoajat' => $row['luentoajat'],
        'esitiedot' => $row['esitiedot'],
        'kuvaus' => $row['kuvaus'],
        'harjoitusryhmat' => $row['harjoitusryhmat'],
        'alkamisajankohta' => $row['alkamisajankohta'],
        'loppumisajankohta' => $row['loppumisajankohta'],
        'ilmoalkaa' => $row['ilmoalkaa'],
        'ilmoloppuu' => $row['ilmoloppuu']
      ));

      return $kurssi;
    }

    return null;
  }

  public function save(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
    $query = DB::connection()->prepare('INSERT INTO Kurssi (name, luennoitsija, opintopisteet, luentoajat, esitiedot, kuvaus, harjoitusryhmat, alkamisajankohta, loppumisajankohta, ilmoalkaa, ilmoloppuu) VALUES (:name, :luennoitsija, :opintopisteet, :luentoajat, :esitiedot, :kuvaus, :harjoitusryhmat, :alkamisajankohta, :loppumisajankohta, :ilmoalkaa, :ilmoloppuu) RETURNING id');
    // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    $query->execute(array('name' => $this->name, 'luennoitsija' => $this->luennoitsija, 'opintopisteet' => $this->opintopisteet, 'luentoajat' => $this->luentoajat, 'esitiedot' => $this->esitiedot, 'kuvaus' => $this->kuvaus, 'harjoitusryhmat' => $this->harjoitusryhmat, 'alkamisajankohta' => $this->alkamisajankohta, 'loppumisajankohta' => $this->loppumisajankohta, 'ilmoalkaa' => $this->ilmoalkaa, 'ilmoloppuu' => $this->ilmoloppuu));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    $this->id = $row['id'];
  }

  public function validate_name(){
  $errors = array();
  if($this->name == '' || $this->name == null){
    $errors[] = 'Nimi ei saa olla tyhjä!';
  }
  if(strlen($this->name) < 3){
    $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
  }

  return $errors;
}

  public function validate_luennoitsija(){
  $errors = array();
  if($this->luennoitsija == '' || $this->luennoitsija == null){
    $errors[] = 'Luennoitsijalla on varmasti nimi!';
  }
  if(strlen($this->luennoitsija) < 3){
    $errors[] = 'Luennoitsijan nimen pituuden tulee olla vähintään kolme merkkiä!';
  }

  return $errors;
}

  public function validate_opintopisteet(){
  $errors = array();
  if($this->opintopisteet != is_integer() || $this->opintopisteet <= 0 || $this->opintopisteet == null){
    $errors[] = 'Opintopistemäärän tulee olla positiivinen kokonaisluku!';
  }

  return $errors;
}

  public function validate_alkamisajankohta(){
  $errors = array();
  if(!paivayksen_oikeellisuus($this->alkamisajankohta)){
    $errors[] = 'Anna kurssin alkamisajankohta pyydetyssä muodossa!';
  }

  return $errors;
}

  public function validate_loppumisajankohta(){
  $errors = array();
  if(!paivayksen_oikeellisuus($this->loppumisajankohta)){
    $errors[] = 'Anna kurssin loppumisajankohta pyydetyssä muodossa!';
  }

  return $errors;
}

  public function validate_ilmoalkaa(){
  $errors = array();
  if(!paivayksen_oikeellisuus($this->ilmoalkaa)){
    $errors[] = 'Anna ilmoittautumisen alkamisajankohta pyydetyssä muodossa!';
  }

  return $errors;
}

  public function validate_ilmoloppuu(){
  $errors = array();
  if(!paivayksen_oikeellisuus($this->ilmoloppuu)){
    $errors[] = 'Anna ilmoittautumisen loppumisajankohta pyydetyssä muodossa!';
  }

  return $errors;
}

function paivayksen_oikeellisuus($pvm) {
  if(preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $pvm, $matches))
   {
    if(checkdate($matches[2], $matches[1], $matches[3]))
      {
       return true; 
      }
   }
 }

}