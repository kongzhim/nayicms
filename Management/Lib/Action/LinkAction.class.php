<?php

class LinkAction extends CommonAction{
	protected $table = 'Link';
	public function index(){
		$this->assign('list',M($this->table)->where(1)->order('listorder DESC')->select())->display();
	}

	public function add(){
		if(!IS_POST){
			$this->display();
		} else {
			$banner = D($this->table);
			if(!$banner->create()){
				$this->error($banner->getError());
			}
			$banner->add() ? $this->success('成功',U('index')) : $this->error('失败');
		}
	}

	public function edit(){
		if(!IS_POST){
			$id = I('id',0,'intval');
			if($id<=0){
				$this->error('Id is wrong');
			}
			$this->assign('info',M($this->table)->where('id='.$id)->find())->display();
		} else {
			if($_POST['yulan'] && $_POST['yulan'] != $_POST['thumb']){
				$path = '..'.$_POST['yulan'];
				if(file_exists($path)){
					unlink($path);
				}
			}
			$banner = D($this->table);
			if(!$banner->create()){
				$this->error($banner->getError());
			}
			$banner->save() ? $this->success('成功',U('index')) : $this->error('失败');	
		}
	}

	public function delete(){
		$id = I('id',0,'intval');
		if($id<=0){
			$this->error('Id is wrong');
		}
		$thumb = M($this->table)->where('id='.$id)->getField('thumb');
		if($thumb){
			$path = '..'.$thumb;
			if(file_exists($path)){
				unlink($path);
			}
		}
		M($this->table)->where('id='.$id)->delete() ? $this->success('成功',U('index')) : $this->error('失败');	
	}

	public function listorder(){
        if(!IS_POST){
            $this->error('非法请求');
        }
        $arr = I('list');
        $num = 0;
        $data = array();
        foreach($arr as $k=>$v){
            $data[$num]['id'] = $k;
            $data[$num]['listorder'] = $v;
            $num++;
        }
        foreach($data as $n){
            if(M($this->table)->where($n)->find()){
                continue;
            }else{
                M($this->table)->save($n);
            }
        }
        $this->redirect('index');
	}
}