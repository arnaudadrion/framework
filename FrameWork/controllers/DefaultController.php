<?php
class DefaultController extends Controller {
	public function defaultAction() {
		new View('example');
	}
}