<?php
    session_start();
	if(!isset($_SESSION['userdata'])){
		header("location:../");
	}
	
    $userdata=$_SESSION['userdata'];
    $groupsdata=$_SESSION['groupsdata'];
    if($SESSION['userdata']['status']==0){
       $status= '<b style="color:red">Not Voted</b>';
    }
    else{
        $status= '<b style="color:green"> Voted</b>';		
?>
<html>
<head>
<title>Online voting system </title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <style>
	     #Backbtn{
			 padding:5px;
	         font-size:15px;
	         background-color:#3498db;
	         color:white;
	         border-radius:5px;
			 float:left;
			 margin:10px;
		 }
        #Logoutbtn{
			padding:5px;
	        font-size:15px;
	        background-color:#3498db;
	        color:white;
	        border-radius:5px;
            float:right;
			margin:10px;
			 
		}	
		#Profile{
			 background-color:white;
			 width:30%;
			 padding:20px;
			 float:left;
		}
		#Group{
			 background-color:white;
			 width:70%;
			 padding:20px;
			 float:right;
		}
		#votebtn{
			 padding:5px;
	         font-size:15px;
	         background-color:#3498db;
	         color:white;
	         border-radius:5px;
		}
		#mainpanel{
			padding:10px;
			
		}
		#voted{
			
		     padding:5px;
	         font-size:15px;
	         background-color:green;
	         color:white;
	         border-radius:5px;
        		
		
		
	</style>
    <div id="mainSection">
	 <center>
         <div id="headerSection">	
              <a href="../"><button id="Backbtn"></button></a>
              <a href="logout.php"><button id="Logoutbtn"></button> </a>
              <h1> Online voting system</h1>
		</div>
        </center>		
        <hr>
	<div id="mainpanel">
	     
	
       <div id="profile"></div>
        <center><img src="../<?php echo $userdata['photo']?>"height="100" width="100"></center><br><br>
		<b>Name:</b><?php echo $userdata['name']?><br><br>
		<b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
		<b>Address:</b><?php echo $userdata['address']?><br><br>
		<b>Status:</b><?php echo $status?><br><br>
   </div>
   <div id="Group">
        <?php
		    if($_SESSION['groupsdata']){
				for($i=0;$i<count($groupsdata);$i++){
					?>
					<div>
					   <img style="float:right"src="../<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
					   
					   <b>Group Name:</b><?php echo $groupsdata[$i]['name']?><br><br>
					   <b>Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>
					   <form action="../vote.php" method="POST">
					       
                           <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
						   <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
						   <?php
						       if($_SESSION['userdata']['status']==0){
								   ?>
						           <input type="submit" name="votebtn" value="Vote" id="votebtn">
						           <?php
							   }
							   else{
								   ?>
								   <button disabled type="button" name="votebtn" value="vote"  id="voted" >Voted</button>
								   
				        </form>
				     </div>
					 <hr>
                     					 
   </div>
   </div>
</body>
</html>
