<?php
class Foundation
{
    public $css=array();

    public $js=array();

    public function CSS($styles=array())
    {
        if(is_array($styles) && count($styles)>0)
        {
            foreach($styles as $key=>$style)
            {
                $this->css[]='<link href="'.$style.'" rel="stylesheet" />';
            }
        }
        else{
            $this->css[]='<link href="'.base_url('public/vendor/foundation/css/foundation.min.css').'" rel="stylesheet" />';
        }
    }

    public function getCSS()
    {
        return implode('',$this->css);
    }

    public function JS($scripts=array())
    {
        if(is_array($scripts) && count($scripts)>0)
        {
            foreach($scripts as $key=>$script)
            {
                $this->js[]='<script src="'.$style.'" ></script>';
            }
        }
        else{
            $this->js[]='<script src="'.base_url('public/vendor/foundation/js/foundation.min.js').'" ></script>';
        }
    }

    public function getJS()
    {
        $html=implode('',$this->js).'<script>$(document).foundation();</script>';
        return $html;
    }

    public function left()
    {
        return ' float-left ';
    }

    public function right()
    {
        return ' float-right ';
    }

    public function column_open($width,$params)
    {

        $html='<div ';
        $class="";
        $args="";
        if(is_array($params) && count($params)>0)
        {
            foreach ($params as $key => $value) {
                if($key=='class')
                {
                    if($value=='left')
                    {
                        $class .=" float-left ";           
                    }
                    elseif($value=='right')
                    {
                        $class .=" float-right ";       
                    }
                    else
                    {
                        $class .=" $value ";       
                    }    
                }
                else
                {
                    $args .=' '.$key.'="'.$value.'" ';
                }
            }
        }

        if(is_array($width) && count($width)>0)
        {
            foreach ($width as $key => $value) {
                foreach ($value as $col => $val) {
                    switch ($col) {
                        case 'large':
                            $class .=" large-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" large-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" large-centered ";
                            }
                            break;
                        case 'medium':
                            $class .=" medium-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" medium-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" medium-centered ";
                            }
                            break;
                        case 'small':
                            $class .=" small-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" small-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" small-centered ";
                            }
                            break;
                        case 'tiny':
                            $class .=" tiny-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" tiny-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" tiny-centered ";
                            }
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }
                    
            }
            $class .=" columns";
        }
        $html .=' class="'.$class.'" '.$args.'>';
        return $html;
    }

    public function navbar()
    {
        return '<nav class="top-bar" data-topbar>
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu="4qxyat-dropdown-menu" role="menubar">
            <li class="menu-text" role="menuitem">Site Title</li>
            <li role="menuitem" class="is-dropdown-submenu-parent is-down-arrow" aria-haspopup="true" aria-expanded="false" aria-label="One" data-is-click="false">
              <a href="#" tabindex="0">One</a>
              <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" aria-hidden="true" role="menu">
                <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">One</a></li>
                <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">Two</a></li>
                <li role="menuitem" class="is-dropdown-submenu-parent is-down-arrow" aria-haspopup="true" aria-expanded="false" aria-label="One" data-is-click="false"><a href="#">Three</a>
                    <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" aria-hidden="true" role="menu">
                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">One</a></li>
                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">Two</a></li>
                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">Three</a>

                        </li>
                      </ul>
                </li>
              </ul>
            </li>
            <li role="menuitem"><a href="#">Two</a></li>
            <li role="menuitem"><a href="#">Three</a></li>
          </ul>
        </div>
        <div class="top-bar-right">
          <ul class="menu">
            <li><input type="search" placeholder="Search"></li>
            <li><button type="button" class="button">Search</button></li>
          </ul>
        </div>
      </nav>';
    }
}