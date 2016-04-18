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

  public function update(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
    $query = DB::connection()->prepare('UPDATE INTO Kurssi (name, luennoitsija, opintopisteet, luentoajat, esitiedot, kuvaus, harjoitusryhmat, alkamisajankohta, loppumisajankohta, ilmoalkaa, ilmoloppuu) VALUES (:name, :luennoitsija, :opintopisteet, :luentoajat, :esitiedot, :kuvaus, :harjoitusryhmat, :alkamisajankohta, :loppumisajankohta, :ilmoalkaa, :ilmoloppuu) WHERE id = :id RETURNING id');
    // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    $query->execute(array('name' => $this->name, 'luennoitsija' => $this->luennoitsija, 'opintopisteet' => $this->opintopisteet, 'luentoajat' => $this->luentoajat, 'esitiedot' => $this->esitiedot, 'kuvaus' => $this->kuvaus, 'harjoitusryhmat' => $this->harjoitusryhmat, 'alkamisajankohta' => $this->alkamisajankohta, 'loppumisajankohta' => $this->loppumisajankohta, 'ilmoalkaa' => $this->ilmoalkaa, 'ilmoloppuu' => $this->ilmoloppuu));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    $this->id = $row['id'];

  }

  public function destroy($id){
    $query = DB::connection()->prepare('DELETE FROM Kurssi WHERE id = :id');
    $query->execute(array('id' => $id));
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
  if($this->opintopisteet == null || $this->opintopisteet <= 0){
    $errors[] = 'Opintopistemäärän tulee olla positiivinen kokonaisluku!';
  }

  return $errors;
}

  public function validate_alkamisajankohta() {
    $errors = array();
  $test_date = $this->alkamisajankohta;
$test_arr  = explode('/', $test_date);
if (count($test_arr) == 3) {
    if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {
        return $errors;
    } else {
        $errors[] = 'Kurssin alkamispäivämäärä on oikeassa muodossa, mutta tarkista, että päivämäärä on mahdollinen.';
        return $errors;
    }
} else {
    // problem with input ...
    $errors[] = 'Kurssin alkamispäivämäärä ei ole oikeassa muodossa. Oikea muoto on pv/kk/vvvv.';
    return $errors;
}
}

  public function validate_loppumisajankohta() {
    $errors = array();
  $test_date = $this->loppumisajankohta;
$test_arr  = explode('/', $test_date);
if (count($test_arr) == 3) {
    if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {
        return $errors;
    } else {
        $errors[] = 'Kurssin loppumispäivämäärä on oikeassa muodossa, mutta tarkista, että päivämäärä on mahdollinen.';
        return $errors;
    }
} else {
    // problem with input ...
    $errors[] = 'Kurssin loppumispäivämäärä ei ole oikeassa muodossa. Oikea muoto on pv/kk/vvvv.';
    return $errors;
}
}

  public function validate_ilmoalkaa() {
    $errors = array();
  $test_date = $this->ilmoalkaa;
$test_arr  = explode('/', $test_date);
if (count($test_arr) == 3) {
    if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {
        return $errors;
    } else {
        $errors[] = 'Ilmoittautumisen alkamispäivämäärä on oikeassa muodossa, mutta tarkista, että päivämäärä on mahdollinen.';
        return $errors;
    }
} else {
    // problem with input ...
    $errors[] = 'Ilmoittautumisen alkamispäivämäärä ei ole oikeassa muodossa. Oikea muoto on pv/kk/vvvv.';
    return $errors;
}
}


  public function validate_ilmoloppuu() {
    $errors = array();
  $test_date = $this->ilmoloppuu;
$test_arr  = explode('/', $test_date);
if (count($test_arr) == 3) {
    if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {
        return $errors;
    } else {
        $errors[] = 'Ilmoittautumisen loppumispäivämäärä on oikeassa muodossa, mutta tarkista, että päivämäärä on mahdollinen.';
        return $errors;
    }
} else {
    // problem with input ...
    $errors[] = 'Ilmoittautumisen loppumispäivämäärä ei ole oikeassa muodossa. Oikea muoto on pv/kk/vvvv.';
    return $errors;
}
}

}