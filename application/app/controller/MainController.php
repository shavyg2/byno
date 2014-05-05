<?php

class MainController{


	function main(){
		$view=new View("home");
		$view->send("title","Byno Mechanical");
		return $view;	
	}

	function contact(){
		$view=new View("contact");
		$view->send("title","Byno - Contact");
		return $view;
	}


	function service(){
		$view=new View("service");
		$view->send("title","Byno Services");
		return $view;
	}


	function serviceArea(){
		$view=new View("service-area");
		$view->send("title","Byno Area");
		return $view;
	}

}