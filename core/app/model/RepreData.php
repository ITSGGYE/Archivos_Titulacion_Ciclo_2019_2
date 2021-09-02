<?php
class RepreData {
	public static $tablename = "repre";
	public function RepreData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into repre (id,name,lastname,gender,day_of_birth,email,address,phone) ";
		$sql .= "value (\"$this->id\",\"$this->name\",\"$this->lastname\",\"$this->gender\",\"$this->day_of_birth\",\"$this->email\",\"$this->address\",\"$this->phone\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto RepreData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set email=\"$this->email\",address=\"$this->address\",phone=\"$this->phone\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new RepreData());
	}

	public static function getRepeated($id){
		$sql = "select * from ".self::$tablename." where  id=$id ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new RepreData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new RepreData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RepreData());
	}


}

?>