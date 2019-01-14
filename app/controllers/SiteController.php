<?php

Yii::import("application.controllers.PsDefaultController");

class SiteController extends PsDefaultController {
    
    public function beforeLogin($model) {}

    public function afterLogin($model) {}

    public function beforeLogout($model) {}

    public function afterLogout($model) {}
    
    public function actionSearch() {
        $this->renderForm("AppSearch");
    }
    
    public function actionAbout() {
        $this->renderForm("AppAbout");
    }
    
    public function actionHome(){
        $this->renderForm("AppHome");
    }
    
    
    public function actionSentences() {
        $this->renderForm("AppSentences");
    }
    
    public function actionKolokat() {
        $this->renderForm("AppKolokat");
    }
    
    public function actionFreq(){
        $this->renderForm("AppFreq");
    }
    
    public function actionTeest(){
        
            $file = File::model()->findByPk(33);
            $id = 33;
            $text = $file->content;
            $ischange = false;
            
            // print_r($text);
            
            // $text = mb_convert_encoding($text, 'UTF8');
            // // $text = ltrim($text, '?');
            // print_r($text);
            // die();
            
            
            #cek supaya tidak double running service pada file yang id'nya sama 
            $test = CMappingFile::model()->findByAttributes(['file_id'=>$id]);
            
            if($test){
                if($test['wordcount']>0){
                    die();
                }
            }

            echo 'Process id : '.$id.'<br/>';
            echo 'Post content ... <br/>';
            $contents = [];
            $url = 'http://bahasa.cs.ui.ac.id/postag/API/tag';
            $data = ["Text[value]"=>strtolower($text)];
            $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method'  => 'POST',
                            'content' => http_build_query($data)
                        ) );
            $result = file_get_contents($url, false, stream_context_create($options));
            if ($result === FALSE) {
                vdump('Cannot get result');die();
            }
            else{
                echo 'Success get result<br/>';
                $arrResult = json_decode($result)->taggedText->data;
            }
            
            $startIdx = 0;
            $endIdx = 0;
            
            #breakdown word dan cari tagnya
            foreach($arrResult as $r){
                if($r[0]!=''){
                    echo 'Get kata '.$r[0].'<br/>';
                    $tag = preg_replace('/[ \t]+/', '', preg_replace('/[\r\n]+/', "", $r[1]));
                    
                    if($tag!=''){
                        #caranya agar petik bisa kebaca
                        $tmp[0] = str_replace("'","''",$r[0]);
                        #pisahkan tag dengan | supaya waktu disearch ndak ambigu
                        $tmp[1] = '|'.str_replace(',','|,|',$tag).'|';
                        
                        #cari update word
                        $uw = Yii::app()->db->createCommand("SELECT * FROM update_word WHERE old_word = '".$tmp[0]."' AND tagset_old = '".$tmp[1]."' ORDER BY created_date DESC LIMIT 1")->queryRow();
                        if($uw){
                            $startIdx = strpos(strtolower($text), $r[0],$startIdx);
                            $endIdx = strpos(strtolower($text), $r[0],$startIdx)+strlen($r[0]);
                            $tmp[0] = $uw['new_word'];
                            $tmp[1] = $uw['tagset_new'];
                            
                            #update content file
                            $text = substr($text, 0, $startIdx).$tmp[0].substr($text, $endIdx);
                            $ischange = true;
                        }
                        $contents[] = $tmp;
                    }
                    
                    #exception, kalau ternyata ada di tabel exception, maka ndak diitung
                    $ex = Exceptions::model()->countByAttributes(['word'=>$r]);
                    $strEx = 'Y';
                    if($ex==0){
                        $strEx = 'N';
                        #tabel c_word
                        if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM c_word WHERE word='".$tmp[0]."' AND tagset = '".$tmp[1]."'")->queryScalar()==0){
                            Yii::app()->db->createCommand("INSERT INTO c_word VALUES (DEFAULT,'".$tmp[0]."', 1, '".$tmp[1]."')")->execute();
                        }
                        else{
                            Yii::app()->db->createCommand("UPDATE c_word SET count = count+1 WHERE word = '".$tmp[0]."' AND tagset = '".$tmp[1]."'")->execute();
                        }
                    }
                    
                    #tabel c_mapping_file
                    if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM c_mapping_file WHERE word='".$tmp[0]."' AND tagset_word = '".$tmp[1]."' AND file_id = '".$id."'")->queryScalar()==0){
                        Yii::app()->db->createCommand("INSERT INTO c_mapping_file VALUES (DEFAULT, '".$id."', '".$tmp[0]."', null, 1, null, '".$strEx."', '".$tmp[1]."')")->execute();
                    }
                    else{
                        Yii::app()->db->createCommand("UPDATE c_mapping_file SET wordcount = wordcount+1, is_ignored = '".$strEx."', tagset_word = '".$tmp[1]."' WHERE word = '".$tmp[0]."' AND tagset_word = '".$tmp[1]."' AND file_id = '".$id."'")->execute();
                    }
                    
                    #insert tagset ke master agar ndak error, nanti descriptionnya bisa diubah sendiri
                    $arrTag = explode(',',str_replace('|','',$tmp[1]));
                    foreach($arrTag as $a){
                        if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM m_tagset WHERE code='".$a."'")->queryScalar()==0){
                            Yii::app()->db->createCommand("INSERT INTO m_tagset VALUES (DEFAULT, '".$a."', '".$a."')")->execute();
                        }   
                    }
                }
            }
            
            if($ischange){
                Yii::app()->db->createCommand("UPDATE file SET content = '".str_replace("'","''",$text)."' WHERE id = ".$id)->execute();
            }
                    
            $subsql = [];
            $phraseArr = [];
            $startIdx = 0;
            $endIdx = 0;
            $tempText = strtolower($text);
            
            foreach($contents as $k=>$c){
                $tmpnode = [];
                $tmp = [];
                #get left word
                for($i=2;$i>0;$i--){
                    if(($k-$i)>=0){
                        $tmpnode[] = $contents[$k-$i][0];
                        $tmp['word_l'.$i] = $contents[$k-$i][0];
                        $tmp['tagset_word_l'.$i] = $contents[$k-$i][1];
                    }
                }
                
                #get node
                $tmpnode[] = $c[0];
                $tmp['word'] = $c[0];
                $tmp['tagset_word'] = $c[1];
                
                #get right word
                for($i=1;$i<=2;$i++){
                    if(($k+$i)<count($contents)){
                        $tmpnode[] = $contents[$k+$i][0];
                        $tmp['word_r'.$i] = $contents[$k+$i][0];
                        $tmp['tagset_word_r'.$i] = $contents[$k+$i][1];
                    }
                    else{
                        break;
                    }
                }
                
                #mapping file
                $phrase = implode(' ',$tmpnode);
                $startIdx = strpos($tempText, $contents[$k][0],$startIdx);
                $endIdx = strpos($tempText, $contents[$k][0],$startIdx)+strlen($contents[$k][0]);
                $html = ($startIdx>20? '... ':'').substr($text,$startIdx>20?($startIdx-20):0,$startIdx>20?20:$startIdx).'<b><i>'.substr($text,$startIdx,$endIdx-$startIdx).'</i></b>'.(substr($text,$endIdx,50).(strlen($text)-$endIdx>50?'...':''));
                $html = str_replace("'","''",$html);
                
                $subsql[] = "(DEFAULT,'".$id."', '".$c[0]."', '".$c[1]."', '".$phrase."', '".$html."')";
                
                #c_phrase
                $tmp['phrase'] = $phrase;
                $tmp['isignored'] = 'N';
                $phraseArr[] = $tmp;
            }
            
            if(!Yii::app()->db->createCommand("INSERT INTO mapping_file VALUES ".implode(",",$subsql))->execute()){
                echo implode(",",$subsql);
                echo "INSERT INTO mapping_file VALUES ".implode(",",$subsql);
                echo "GAGAL SAVE?";
                die();
            }
            
            #tabel c_phrase
            foreach($phraseArr as $p){
                if($p['isignored']=='N'){
                    $insert = [];
                    $where = [];
                    $keyArr = ['word_l2', 'word_l1', 'word', 'word_r1', 'word_r2'];
                    
                    foreach($keyArr as $k){
                        if(isset($p[$k])){
                            $insert[] = "'".$p[$k]."', '".$p['tagset_'.$k]."'";
                            $where[] = $k." = '".$p[$k]."' AND tagset_".$k." = '".$p['tagset_'.$k]."'";
                        }
                        else{
                            $insert[] = 'null, null';
                            $where[] = $k." IS NULL";
                        }    
                    }
                    
                    $whereSql = implode(' AND ',$where);
                    $insertSql = implode(', ',$insert);
                    
                    if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM c_phrase WHERE ".$whereSql)->queryScalar()==0){
                        Yii::app()->db->createCommand("INSERT INTO c_phrase VALUES (DEFAULT,'".$p['phrase']."',".$insertSql.", 1)")->execute();
                    }
                    else{
                        Yii::app()->db->createCommand("UPDATE c_phrase SET count = count+1 WHERE ".$whereSql)->execute();
                    }
                }
                
                #tabel c_mapping_file
                if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM c_mapping_file WHERE phrase='".$p['phrase']."' AND file_id = '".$id."'")->queryScalar()==0){
                    Yii::app()->db->createCommand("INSERT INTO c_mapping_file VALUES (DEFAULT, '".$id."', null, '".$p['phrase']."', null, 1, '".$p['isignored']."', null)")->execute();
                }
                else{
                    Yii::app()->db->createCommand("UPDATE c_mapping_file SET phrasecount = phrasecount+1, is_ignored = '".$p['isignored']."' WHERE phrase = '".$p['phrase']."' AND file_id = '".$id."'")->execute();
                }
            }
        
    }
    
    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $this->redirect(array("home"));
        } else {
            if (is_array(Yii::app()->user->info)) {
                foreach(Yii::app()->user->info['roles'] as $role) {
                    if ($role['role_name'] == Yii::app()->user->info['full_role']) {
                        if (!@$role['home_url']) {
                            $this->redirect(['/docs/welcome']);
                        } else {
                            $this->redirect([$role['home_url']]);
                        }
                    }
                }
            } else {
                $this->redirect(['/site/logout']);
            }
        }
    }
    
    
    public function actionLogin(){
        if (Yii::app()->session['logout'] == 1) {
            $_SERVER['PHP_AUTH_USER'] = '';
            Yii::app()->session['logout'] = null;            
            $this->logout();
            $this->redirect(array("search"));
        }
        if(isset($_POST['ajax']) && $_POST['ajax']==='SilkLogin'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        
        if(isset($_POST['LoginForm']['username'])&&isset($_POST['LoginForm']['password'])){
            // validate user input
            $this->validateLogin($_POST['LoginForm']['username'], $_POST['LoginForm']['password']);
        }
            // display the login form
        $this->renderForm('LoginForm', null, null, ['layout' => '//layouts/blank']);
    }

    public function validateLogin($username, $pass){       
        $identity=new UserIdentity($username,$pass);        
        $identity->authenticate(); 
   		
       	if($identity->errorCode===UserIdentity::ERROR_NONE)
       	{
       	    Yii::app()->user->login($identity,3600*24*30);
       	    $_SERVER['PHP_AUTH_USER'] = ''; 
            $this->redirect(Yii::app()->user->returnUrl);
       	} else {
       	    Yii::app()->session['logout'] = 1;
        	$this->redirect(array("login"));
        }    
    }

    public function logout() {
        if (!Yii::app()->user->isGuest) {
            $model = new LoginForm;
            $model->username = Yii::app()->user->name;
            $this->beforeLogout($model);

            ## audit trail tracker
            AuditTrail::logout();

            ## logout user
            Yii::app()->user->logout();

            $this->afterLogout($model);
        }

        $_SESSION = array();

        // unset cookies
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        
        $_SERVER['PHP_AUTH_USER'] = ''; 
    }
    
    public function actionLogout() {
        Yii::app()->session['logout'] = 1;
        $this->redirect(array('login'));
    }
    
}

