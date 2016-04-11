<?php

class Kurssi extends BaseModel{
    
	public $id, $name, $luennoitsija, $opintopisteet, $luentoajat, $esitiedot, $kuvaus, $harjoitusryhmat, $alkamisajankohta, $loppumisajankohta, $ilmoalkaa, $ilmoloppuu;

	public function __construct($attributes){
    	parent::__construct($attributes);
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
}