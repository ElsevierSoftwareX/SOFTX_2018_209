<ul class="ds-me ds-nav" >
    <?php
        if((sizeof(Yii::app()->user->info) > 1)){ //if menu items available open bracket

    ?>
    <li class="flyout" style="margin-top: 0px; padding: 10px; vertical-align: bottom;">
        <?php 
            // $role = Yii::app()->user->info['role'];
            // if($role == 'dsn.' || $role == 'kps' || $role == 'admin'){                
            //     $mkar = MKaryawan::model()->findByAttributes(['id_user' => Yii::app()->user->info['id']]);
            //     echo strtoupper($mkar->name);
            // } else if ($role == 'mhs'){
            //     $mkar = MMahasiswa::model()->findByAttributes(['id_user' => Yii::app()->user->info['id']]);
            //     echo strtoupper($mkar->name);
            // }
        ?>  
    </li>
    <li class="logout">
        <a href="index.php?r=site/logout" title="Logout"><i class="fa fa-sign-out"></i> Logout</a>
    </li>            
     <li style="margin-top: 4px; padding-left: 10px;">
          <span id="jam"></span>
         <br/>
         <span id="tanggal"></span>
     </li>     
     <?php
        }
        else {
        
    ?>
        <li style="margin-top: 0px; padding: 10px; vertical-align: bottom;">
            <a href="index.php?r=site/login"><i class="fa fa-sign-in"></i> Login</a>
        </li>        
    <?php
            }
    ?>
</ul>
