<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Layout
	{
		public $layout;
        public $ci;
        public $deferredJS;
		function __construct()
		{
			$this->ci = get_instance(); // CI_Loader instance
			$this->layout=$this->ci->config->item('base_layout');
            if($this->layout=='bootstrap')
            {
                $this->ci->load->library('bootstrap');
                $this->layout=$this->ci->bootstrap;
            }
            elseif($this->layout=='foundation')
            {
                $this->ci->load->library('foundation');
                $this->layout=$this->ci->foundation;
            }
            $this->layout->CSS();
            $this->layout->JS();
		}

        function loadJQuery($link=null)
        {
            if($link!=null)
            {
                return '<script src="'.$link.'" ></script>';
            }
            else{
                return '<script src="'.base_url('public/vendor/jquery/jquery.min.js').'" ></script>';
            }
        }

        function deferredLoadingJS($scripts=array())
        {
            $js=array();
            if(is_array($scripts))
            {
                foreach ($scripts as $key => $j) {
                    $js[]='<script src="'.$j.'" ></script>';
                }
            }
            else{
                $js[]='<script src="'.$scripts.'" ></script>';
            }
            $this->deferredJS= implode('',$js);
        }

        function loadJS($link=array())
        {
            $js=array();
            if(is_array($link))
            {
                foreach ($link as $key => $j) {
                    $js[]='<script src="'.$j.'" ></script>';
                }
            }
            else{
                $js[]='<script src="'.$link.'" ></script>';
            }
            return implode('',$js);
        }

        function loadCSS($link=array())
        {
            $js=array();
            if(is_array($link))
            {
                foreach ($link as $key => $j) {
                    $js[]='<link href="'.$j.'" rel="stylesheet" />';
                }
            }
            else{
                $js[]='<link href="'.$link.'" rel="stylesheet" />';
            }
            return implode('',$js);
        }

        function CSS($styles=array())
        {
            return $this->layout->CSS($styles);
        }

        function getCSS()
        {
            return $this->layout->getCSS();
        }

        function JS($scripts=array())
        {
            return $this->layout->JS($scripts);
        }

        function getJS()
        {
            return $this->layout->getJS();
        }

        function loadCustomCSS()
        {
            $style=$this->ci->config->item('app_layout');
            return '<link href="'.base_url('public/themes/'.$style.'/css/styles.css').'" rel="stylesheet" />';
        }

        function loadCustomJS()
        {
            $style=$this->ci->config->item('app_layout');
            return '<script src="'.base_url('public/themes/'.$style.'/js/scripts.js').'"></script>';
        }

        function column_open($width=array(), $params=array())
        {
            return $this->layout->column_open($width, $params);
        }

        function close()
        {
            return '</div>';
        }

        function row($params=array())
        {
            $html='';
            $class='';
            if(count($params)==0)
            {
                return  '<div class="row">';    
            }
            else
            {
                foreach ($params as $key => $value) {
                    if($key=='class')
                    {
                        $class .=" $value ";
                    }
                    else{
                        $html .=' '.$key.'="'.$value.'" ';
                    }
                }
                $html ='<div class="row '.$class.'" '.$html.'>';
                return $html;
            }
            
        }

        function container($params=array())
        {
            $html='';
            $class='';
            if(count($params)==0)
            {
                return  '<div class="container">';    
            }
            else
            {
                foreach ($params as $key => $value) {
                    if($key=='class')
                    {
                        $class .=" $value ";
                    }
                    else{
                        $html .=' '.$key.'="'.$value.'" ';
                    }
                }
                $html ='<div class="container '.$class.'" '.$html.'>';
                return $html;
            }

        }

        function right()
        {
            return $this->layout->left();
        }

        function left()
        {
            return $this->layout->right();
        }

        function button($params)
        {

        }

        function form_open($params=array())
        {
            $html='<form ';
            $args='';
            if(is_array($params) && count($params)>0)
            {
                foreach ($params as $key => $value) {
                    $args .=' '.$key.'="'.$value.'" ';
                }
            }
            $html .='>';
            return $html;
        }

        function form_close()
        {
            return  '</form>';
        }

        function navbar($left=null, $right=null,$logo=null,$params=null)
        {
            return $this->layout->navbar();
        }
	}
