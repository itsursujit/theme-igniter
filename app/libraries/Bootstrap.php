<?php
class Bootstrap
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
            $this->css[]='<link href="'.base_url('public/vendor/bootstrap/css/bootstrap.min.css').'" rel="stylesheet" />';
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
                $this->js[]='<script src="'.$script.'" ></script>';
            }
        }
        else{
            $this->js[]='<script src="'.base_url('public/vendor/bootstrap/js/bootstrap.min.js').'" ></script>';
        }
    }

    public function getJS()
    {
        return implode('',$this->js);
    }

    public function left()
    {
        return ' pull-left ';
    }

    public function right()
    {
        return ' pull-right ';
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
                        $class .=" pull-left ";           
                    }
                    elseif($value=='right')
                    {
                        $class .=" pull-right ";       
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
                            $class .=" col-lg-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" col-lg-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" col-lg-centered ";
                            }
                            break;
                        case 'medium':
                            $class .=" col-md-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" col-md-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" col-md-centered ";
                            }
                            break;
                        case 'small':
                            $class .=" col-sm-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" col-sm-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" col-sm-centered ";
                            }
                            break;
                        case 'tiny':
                            $class .=" col-xs-$val ";
                            if(isset($value['offset']))
                            {
                                $class .=" col-xs-offset-".$value['offset'];
                            }
                            if(isset($value['centered']))
                            {
                                $class .=" col-xs-centered ";
                            }
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }
                    
            }
        }
        $html .=' class="'.$class.'" '.$args.'>';
        return $html;
    }

    public function navbar()
    {
        return '<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';
    }
}