<?php

class Page {
    
    // 分页栏每页显示的页数
    public $rollPage = 5;

    // 页数跳转时要带的参数
    public $parameter  ;

    // 分页URL地址
    public $url     =   '';

    // 默认列表每页显示行数
    public $listRows = 20;

    // 起始行数
    public $firstRow    ;

    // 分页总页面数
    protected $totalPages  ;

    // 总行数
    protected $totalRows  ;

    // 当前页数
    protected $nowPage    ;

    // 分页的栏的总页数
    protected $coolPages   ;

    // 分页显示定制
    protected $config  = array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'=>'最后一页','theme'=>' %totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%');

    // 默认分页变量名
    protected $varPage;

    /**
     * 架构函数
     * @access public
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     */

    public function __construct($totalRows,$listRows='',$parameter=''){
        $this->totalRows    =   $totalRows;
        $this->parameter    =   $parameter;
        $this->varPage      =   C('VAR_PAGE') ? C('VAR_PAGE') : 'p' ;
        if(!empty($listRows)) {
            $this->listRows =   intval($listRows);
        }
        $this->totalPages   =   ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages    =   ceil($this->totalPages/$this->rollPage);
        $this->nowPage      =   !empty($_POST[$this->varPage])?intval($_POST[$this->varPage]):1;
        if($this->nowPage<1){
            $this->nowPage  =   1;
        }elseif(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage  =   $this->totalPages;
        }
        $this->firstRow     =   $this->listRows*($this->nowPage-1);
    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
     * 分页显示输出
     * @access public
     */
    public function show() {
        if(0 == $this->totalRows) return '';
        $p              =   $this->varPage;
        $nowCoolPage    =   ceil($this->nowPage/$this->rollPage);

        // 分析分页参数
        if($this->url){
            $depr       =   C('URL_PATHINFO_DEPR');
            $url        =   rtrim(U('/'.$this->url,'',false),$depr).$depr.'__PAGE__';
        }else{
			
			$request = array_filter(array_keys(array_filter($_REQUEST)), "filter_search_field");
			if(!empty($request)){
				$request=array_combine($request,$request);
				$par