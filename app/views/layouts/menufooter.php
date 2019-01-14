<li class="dl-divider"></li>
<?php 
    
    function loopMenuFooter($menu){
          $html = '';
          foreach($menu as $k => $v){
                if($v['label'] == '---'){
                     $html .= '<li class="dl-divider">
		                    </li>';
                } else {
                     $html .= '<li>';
                     if(isset($v['url'])){
                        
                        if(is_array($v['url'])){
                            $url = $v['url'][0];
                            $params = $v['url'];
                            unset($params[0]);
                            $url = Yii::app()->createUrl($url, $params);
                            $html .= '<a href="' . $url .'">'.$v['label'].'</a>';	    
                        } else {
                            $url = Yii::app()->createUrl($url);
                            $html .= '<a href="' . $url .'">'.$v['label'].'</a>';	    
                        }
                        
                     } else {
                          $html .= '<a href="#">'.$v['label'].'</a>';	
                     }
                     if(isset($v['items'])){
                          $html .=  extractChild($v['items']);
                     }
                     $html .= '</li>';
                }
          }
          return $html;
     }
     
     if(Yii::app()->user->info['role'] == 'dev'){
          echo loopMenuFooter($menu[1]['items']);     
     }
     
     $html = '';
     if (Yii::app()->user->role == 'user') {
        if (sizeof(Yii::app()->user->info['roles']) > 1) {
            $html .= '<li>';  
            $html .= '<a ng-url="sys/profile/changeRole&id=2">Ubah Ke Admin</a>';     
            $html .= '</li>';
        }
     }
     if (Yii::app()->user->role == 'admin') {  
        if (sizeof(Yii::app()->user->info['roles']) > 1) {
            $html .= '<li>';  
            $html .= '<a ng-url="sys/profile/changeRole&id=3">Ubah Ke Pegawai</a>';     
            $html .= '</li>';
        }
    }  
    echo $html;
    echo '<li class="dl">
                <a href="index.php?r=site/logout">Logout</a> 
            </li>';
?>


