<?php

include ('model.php');

if (isset($_REQUEST['action'])) {




    // if ($_REQUEST['action'] == 'addinfo') {
	// 	$addobj = new ModalOperations();
		
		
		
	// 	$id = $addobj -> adduserdata($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['dtime']);
		
		
		
	// }	

	if ($_REQUEST['action'] == 'displayall') {
		
		$dobj = new ModalOperations();
	
		
		$itemsarr = array();
		
		$campres = $dobj -> displayall();
		
		if ($campres -> num_rows > 0) {
	
		while ($row = $campres -> fetch_assoc()) {
			
			$itemsarr['name'][] = $row['name'];
	
		}
	
		}
		
		echo json_encode($itemsarr);
		
	}

	if ($_REQUEST['action'] == 'fetchdatabyid') {
		
		$dobj = new ModalOperations();

		
		$itemsarr = array();
		
		$campres = $dobj -> fetchdatabyid($_REQUEST['upid']);
		
		if ($campres -> num_rows > 0) {

		while ($row = $campres -> fetch_assoc()) {
			
			$itemsarr['name'][] = $row['name'];
			$itemsarr['email'][] = $row['email'];

		}

		}
		
		echo json_encode($itemsarr);
		
	}	

	if ($_REQUEST['action'] == 'updatedetails') {
		$addobj = new ModalOperations();
		
		
		
		$id = $addobj -> updatedetails($_REQUEST['upid'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password']);
		
		echo $upid;
		
	}	

	if ($_REQUEST['action'] == 'deletecurrent') {
		$addobj = new ModalOperations();
		
		$id = $_REQUEST['upid'];
		
		$delres = $addobj -> deleteblogdata($id);
		
		if ($delres) {
			echo "Blog deleted successfully";
		} else {
			echo "Error deleting blog";
		}
		
	}	

}
?>