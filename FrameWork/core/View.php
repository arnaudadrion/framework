<?php 
class View {
	private $viewPath;
	private $data;
	private $template;
	private $extension;
	public function __construct($viewPath,$data=[],$template='default',$extension='phtml'){
		$this->viewPath=$viewPath;
		$this->data=$data;
		$this->template=$template;
		$this->extension=$extension;

		$this->generate();
	}

	private function generate(){
		extract($this->data);
		if($this->template===null){
			include'views/'.$this->viewPath.'.'.$this->extension;
		}
		else{
			ob_start();//stop le flux d'affichage et met memoire la suite
			include 'views/'.$this->viewPath.'.'.$this->extension;
			$content=ob_get_clean();//rend ce qui a été mis en memoire et on l'affecte a une variable et permet d'inserer cette variable dans la template 
			include 'views/template/'.$this->template.'.phtml';
		}
	}
}