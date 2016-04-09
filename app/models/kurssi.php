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
}