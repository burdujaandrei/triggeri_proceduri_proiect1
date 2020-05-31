<?php

   // connect to the database
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "adventure";
   	$dsn = "mysql:host=$dbhost;dbname=$dbname";
    $conn =  new PDO($dsn,$dbuser, $dbpass);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    // The SQL SELECT Statement for HOME section
    $sql_home = "SELECT * FROM home";
    $result_home = $conn->query($sql_home, PDO::FETCH_ASSOC);

    if($result_home)
	{
		foreach ($result_home->fetchAll() as $row) 
		{
    		$homepage[] = $row;
		}
	}

	// The SQL SELECT Statement for work owl section
	$sql_work_owl = "SELECT * FROM work_owl";
	$result_work_owl = $conn->query($sql_work_owl, PDO::FETCH_ASSOC);

    if($result_work_owl)
	{
		foreach ($result_work_owl->fetchAll() as $row) 
		{
    		$work_owl[] = $row;
		}
	}

	// The SQL SELECT Statement for portofolio section
	$sql_portofoliu = "SELECT * FROM portofoliu";
	$result_portofoliu = $conn->query($sql_portofoliu, PDO::FETCH_ASSOC);
	
    if($result_portofoliu)
	{
		foreach ($result_portofoliu->fetchAll() as $row) 
		{
    		$portofoliu[] = $row;
		}
	}
?>