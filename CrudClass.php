<?php 

require_once 'dbLib/DatabaseClass.php';
/**
 * 
 */
class CrudClass extends DatabaseClass
{
	
	function __construct()
	{
		# code...
		parent::__construct();	

	}

	public function select($table,$col=null,$where= null)
	{
		# code...
					
		if(isset($col))
		{
			$sql="SELECT ".$col." FROM ".$table;
		}else{

			$sql="SELECT * FROM ".$table;
		}
		if(isset($where))
		{
		$sql.=" WHERE ".$where;
		}

		$query = mysqli_query($this->connection,$sql);
        if($query)
        {
            $data_count = mysqli_num_rows($query);
            if($data_count>0)
            {
            	
            	while ($row=mysqli_fetch_assoc($query)) {
            		# code...
            		$data[]=$row;
            		
            	}
            	return $data;
            }else{
            	return array();	
            }
        } 
		
	}

	public function insert($table,$val)
	{
		# code...
		$value=implode(', ' , array_keys($val));
		$data=implode(', ', array_values($val));

		$sql="INSERT INTO ".$table." ( ".$value." ) VALUES( ".$data." );";

		$query = mysqli_query($this->connection,$sql);
        if($query)
        {
          return "Inserted Successfully"; 

        }else{

        	return "Inserted Failed";
        }
		
	}

	public function update($table,$set,$where)
	{
		# code...
	
		$str_set="";
		foreach ($set as $key => $value) {
			$str_set.= $key." = ".$value.",";		
		}

		$str_set1=substr($str_set, 0, -1);
		
		$str_where="";
		foreach ($where as $key => $value) {
			$str_where.= $key." = ".$value." AND ";		
		}

		$str_where1=substr($str_where, 0, -4);
		
		
		$sql="UPDATE ".$table." SET ".$str_set1."  WHERE ".$str_where1.";";

		$query = mysqli_query($this->connection,$sql);
        if($query)
        {
          return "Update Successfully"; 

        }else{
        	
        	return "Update Failed";
        }

	}
	public function delete($table,$where=null)
	{
		# code...
		if(isset($where)){

		$str_where=" ";

		foreach ($where as $key => $value) {
			$str_where.= $key." = ".$value." AND ";		
		}

		$str_where1=substr($str_where, 0, -4);

		$sql="DELETE FROM ".$table." WHERE ".$str_where1;

		}else{

			$sql="DELETE FROM ".$table.";";
		}
		echo $sql;
		$query = mysqli_query($this->connection,$sql);
		if($query)
        {
          return "Delete Successfully"; 

        }else{
        	
        	return "Delete Failed";
        }


	}			
}
?>