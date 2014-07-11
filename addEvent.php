<?php 

    require("../rendezvous/common.php"); 
     
    if(!empty($_POST)) 
    { 
        $query = " 
            INSERT INTO events ( 
                title, 
                street_address,
				state,
				city, 
				zip,
                description, 
                hosts,
				public,
				latitude,
				longitude
            ) VALUES ( 
				:title,
                :street_address, 
				:state,
				:city,
				:zip,
                :description, 
                :hosts,
				:public,
				:latitude,
				:longitude
            ) 
        "; 
		
		
        $query_params = array( 
            ':title' => $_POST['title'], 
			':street_address' => $_POST['street_address'], 
			':state' => $_POST['state'], 
			':city' => $_POST['city'], 
			':zip' => $_POST['zip'], 
			':description' => $_POST['description'], 
			':hosts' => $_POST['hosts'], 
            ':public' => $_POST['privacy'],
			':latitude' => $_POST['latitude'],
			':longitude' => $_POST['longitude']
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        header("Location: portal.php"); 
         
        die("Redirecting to portal.php"); 
    } 
     
?> 

