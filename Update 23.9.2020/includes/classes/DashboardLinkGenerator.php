<?php
	include_once("includes/classes/ProfileData.php"); 


		class DashboardGenerator {

		 private $con, $userLoggedInObj, $profileData;

		public function __construct($con, $userLoggedInObj, $profileUsername) {
			$this->con = $con;
			$this->userLoggedInObj = $userLoggedInObj;
			$this->profileData = new ProfileData($con, $profileUsername);
		 }

		 public function create() { 
			$profileUsername = $this->profileData->getProfileUsername();
			return "<a href='dashboard.php?username=$profileUsername'>Channel Dashboard</a>";     
		 }

		} 
		
	?> 