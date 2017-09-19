<?php
class House extends Controller{
	protected function Index(){
		$viewmodel = new HouseModel();
		$this->returnView($viewmodel->Index(), true);
	}
}