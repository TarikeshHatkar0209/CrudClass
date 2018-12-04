<?php
require_once 'CrudClass.php';

$crud = new CrudClass();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Logistic</title>
</head>
<body>
	<?php 
	//All dynamic query based on parameter function here
	//-----------------------------------------------------------------------
	// fetch data from database function

	// for all data
	//$data=$crud->select('customers');
	//------------------------------------

	//for selected col data
	//$data=$crud->select('customers','f_name,l_name');   
						//or
	//$data=$crud->select('customers','f_name,l_name','id=23');
	//------------------------------------

	//for particular condition
	//$data=$crud->select('customers','f_name,l_name','id=230');
	//------------------------------------------------------------------------

	//for insert data :  input => data array for insert

	// $input = array(
	// 				' f_name ' => "'tarikesh'",
	// 				' l_name ' => "'h'",
	// 				' gender ' => "'male'",
	// 				' address ' => "'mumbai'",
	// 				' city ' => "'thane'",
	// 				' state ' => "'MS'",
	// 				' phone ' => '9503672932',
	// 				' email ' => "'tarikeshhatkar@gmail.com'",
	// 				' date_of_birth ' => '02-09-1992' );

	// $data = $crud->insert('customers',$input);
	//------------------------------------------------------------------------

	//for update : input=> set array for updation value
	//					   where array for condition

	// $set = array(
	// 				' f_name ' => "'tarikeshH'",
	// 				' l_name ' => "'tarikeshH'",
	// 				);
	// $where = array(
	// 				' f_name ' => "'tarikesh'"
	// 				);

	// $data=$crud->update('customers',$set,$where);
	//------------------------------------------------------------------------
	
	//for Delete data: input=> table name, condition where array
	
	//delete table all data
	//$data=$crud->delete('admin_accounts');
					
	//delete particular record		
	$whr=array(
		'id'=>9
			);	

	$data=$crud->delete('admin_accounts',$whr);
	//------------------------------------------------------------------------


	echo"<pre>";
	print_r($data);

	echo"</pre>";
	?>

</body>
</html>