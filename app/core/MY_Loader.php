<?php 
	/**
	* 
	*/
	class MY_Loader extends CI_Loader
	{
		public function __construct()
        {
                parent::__construct();
        }

		public function view($view, $vars = array(), $return = FALSE)
		{
			$vars['contents']=$view;
			$main_content_path='layout/main-content.php';
			$main_content=$this->_ci_load(
				array(
					'_ci_view' => $main_content_path,
					'_ci_vars' => $this->_ci_object_to_array($vars),
					'_ci_return' => $return
				)
			);
			//return $main_content;
		}
	}