<?php

class CPhrase extends ActiveRecord {


    public function tableName() {
        return 'c_phrase';
    }

    public function rules() {
        return [
         ['phrase, word, tagset_word, count', 'required'],
         ['count', 'numerical', 'integerOnly' => true],
         ['tagset_word_l2, tagset_word_l1, tagset_word, tagset_word_r1, tagset_word_r2', 'length', 'max' => 50],
         ['word_l2, word_l1, word_r1, word_r2', 'safe'],
        ];
    }

    public function relations() {
        return [];
    }

    public function attributeLabels() {
        return [
         'id' => 'ID',
         'phrase' => 'Phrase',
         'word_l2' => 'Word L2',
         'tagset_word_l2' => 'Tagset Word L2',
         'word_l1' => 'Word L1',
         'tagset_word_l1' => 'Tagset Word L1',
         'word' => 'Word',
         'tagset_word' => 'Tagset Word',
         'word_r1' => 'Word R1',
         'tagset_word_r1' => 'Tagset Word R1',
         'word_r2' => 'Word R2',
         'tagset_word_r2' => 'Tagset Word R2',
         'count' => 'Count',
        ];
    }
    
    public function searchKelasKata($params){
        $word = @$params[':word'];
        
        $kolokat = @$params[':kolokat'];
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            } else if ($kolokat == 'l2'){
                $queryKol = "AND tagset_word_l2	= ";
            } else if ($kolokat == 'l1'){
                $queryKol = "AND tagset_word_l1	= ";
            } else if ($kolokat == 'r1'){
                $queryKol = "AND tagset_word_r1	= ";
            } else if ($kolokat == 'r2'){
                $queryKol = "AND tagset_word_r2	= ";
            }
        } else {
            $queryKol = "";
        }
        
        $kelas = @$params[':kelas'];
        if(!is_null($kelas)){
            if($kelas == '' || $kelas == 'js:model.kelas'){
                $queryKol = "";    
            } else {
                $queryKol .= "'|$kelas|'";
            }
        } else {
            $queryKol = "";
        }
        
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            }
        } else {
            $queryKol = "";
        }
        
        $category = @$params[':cbl'];
        if(!is_null($category)){
            $queryCat = "AND f.category IN ('" . str_replace(',',"','",$params[':cbl'] . "')");
        } else {
            $queryCat = "";
        }
        
        $sql = "SELECT p.*, f.name, f.category FROM 
                    (SELECT * FROM c_phrase WHERE word = '$word' $queryKol) p
                    INNER JOIN file f ON f.id = p.file_id $queryCat
                {[order]}
                {[paging]} 
                ";
        return $sql;
        
    }
    
    public function searchKelasKataCount($params){
        $word = @$params[':word'];
        
        $kolokat = @$params[':kolokat'];
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            } else if ($kolokat == 'l2'){
                $queryKol = "AND tagset_word_l2	= ";
            } else if ($kolokat == 'l1'){
                $queryKol = "AND tagset_word_l1	= ";
            } else if ($kolokat == 'r1'){
                $queryKol = "AND tagset_word_r1	= ";
            } else if ($kolokat == 'r2'){
                $queryKol = "AND tagset_word_r2	= ";
            }
        } else {
            $queryKol = "";
        }
        
        $kelas = @$params[':kelas'];
        if(!is_null($kelas)){
            if($kelas == '' || $kelas == 'js:model.kelas'){
                $queryKol = "";    
            } else {
                $queryKol .= "'|$kelas|'";
            }
        } else {
            $queryKol = "";
        }
        
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            }
        } else {
            $queryKol = "";
        }
        
        $category = @$params[':cbl'];
        if(!is_null($category)){
            $queryCat = "AND f.category IN ('" . str_replace(',',"','",$params[':cbl'] . "')");
        } else {
            $queryCat = "";
        }
        
        $sql = "SELECT COUNT(1) FROM (
                    SELECT p.*, f.name, f.category FROM 
                        (SELECT * FROM c_phrase WHERE word = '$word' $queryKol) p
                        INNER JOIN file f ON f.id = p.file_id $queryCat
                ) x
                ";
        return $sql;
    }
    
    public function getSearch($params) {
        $arrSub = [];
        $arrWord = ['word', 'word_l1', 'word_l2', 'word_r1', 'word_r2'];
        
        foreach ($arrWord as $a) {
            if (isset($params[':' . $a]) && @$params[':' . $a]!='' && strpos(@$params[':' . $a],'js:dataFilter1.')===false) {
                if ($params[':' . $a]=="'") {
                    $params[':' . $a] = "''";
                }
                if ($params[':' . $a]=='##!@# EMPTY #@!##') {
                    $arrSub[] = 'c.' . $a . ' IS NULL ';
                } else {
                    $arrSub[] = 'c.' . $a . " = '" . $params[':' . $a] . "' ";
                }
            }
            $op = 'empty';
            if (isset($params[':tagop_' . $a])) {
                $op = $params[':tagop_' . $a];
            }
            if ($op!='empty') {
                $subTag = [];
                foreach ($params[':tagset_' . $a] as $b) {
                    if (isset($b['tag'])) {
                        $subTag[] = ' c.tagset_' . $a . " ILIKE '%|" . $b['tag'] . "|%'";
                    }
                }
                if (count($subTag)>0) {
                    $arrSub[] = '(' . implode(' ' . $op . ' ',$subTag) . ')';
                }
            }
        }
        if ($params[':cbl']!='js:model.cbl') {
            $arrSub[] = "f.category IN ('" . str_replace(',',"','",$params[':cbl'] . "')");
        }
        
        if (count($arrSub)>0) {
            $whereSql = 'WHERE ' . implode(' AND ', $arrSub);
        } else {
            $whereSql = 'WHERE 1 = 1';
        }
        
        $sql = "SELECT c.*, c2.count, string_agg(category, ', ') category
                FROM c_phrase c
                INNER JOIN file f ON f.id = c.file_id
                INNER JOIN (SELECT phrase, count( DISTINCT phrase) count FROM c_phrase GROUP BY phrase) c2 ON c2.phrase = c.phrase
                ".$whereSql." { AND [where]} 
                GROUP BY c.id, c.phrase, c.word_l2, c.word_l1, c.word, c.word_r1, c.word_r2, c.tagset_word_r2, c.tagset_word_r1, c.tagset_word, c.tagset_word_l1, c.tagset_word_l2, c.file_id, c2.count
                {[order]} {[paging]}";
        return $sql;
    }
    
    public function getCountSearch($params) {
        $arrSub = [];
        $arrWord = ['word', 'word_l1', 'word_l2', 'word_r1', 'word_r2'];
        foreach ($arrWord as $a) {
            if (isset($params[':' . $a]) && @$params[':' . $a]!='' && strpos(@$params[':' . $a],'js:dataFilter1.')===false) {
                if ($params[':' . $a]=="'") {
                    $params[':' . $a] = "''";
                }
                if ($params[':' . $a]=='##!@# EMPTY #@!##') {
                    $arrSub[] = 'c.' . $a . ' IS NULL ';
                } else {
                    $arrSub[] = 'c.' . $a . " = '" . $params[':' . $a] . "' ";
                }
            }
            $op = 'empty';
            if (isset($params[':tagop_' . $a])) {
                $op = $params[':tagop_' . $a];
            }
            if ($op!='empty') {
                $subTag = [];
                foreach ($params[':tagset_' . $a] as $b) {
                    if (isset($b['tag'])) {
                        $subTag[] = ' c.tagset_' . $a . " ILIKE '%|" . $b['tag'] . "|%'";
                    }
                }
                if (count($subTag)>0) {
                    $arrSub[] = '(' . implode(' ' . $op . ' ',$subTag) . ')';
                }
            }
        }
        if ($params[':cbl']!='js:model.cbl') {
            $arrSub[] = "f.category IN ('" . str_replace(',',"','",$params[':cbl'] . "')");
        }
        
        if (count($arrSub)>0) {
            $whereSql = 'WHERE ' . implode(' AND ', $arrSub);
        } else {
            $whereSql = 'WHERE 1 = 1';
        }
        
        $sql = "SELECT COUNT(1) FROM (
            SELECT COUNT(1)
            FROM c_phrase c
            INNER JOIN file f ON f.id = c.file_id
            ".$whereSql." { AND [where]}
            GROUP BY c.id, c.phrase, c.word_l2, c.word_l1, c.word, c.word_r1, c.word_r2, c.tagset_word_r2, c.tagset_word_r1, c.tagset_word, c.tagset_word_l1, c.tagset_word_l2, c.file_id
        ) a";
        return $sql;
    }
    
    public function getSumSearch($params) {
        $arrSub = [];
        $arrWord = ['word', 'word_l1', 'word_l2', 'word_r1', 'word_r2'];
        foreach ($arrWord as $a) {
            if (isset($params[':' . $a]) && @$params[':' . $a]!='' && strpos(@$params[':' . $a],'js:dataFilter1.')===false) {
                if ($params[':' . $a]=="'") {
                    $params[':' . $a] = "''";
                }
                if ($params[':' . $a]=='##!@# EMPTY #@!##') {
                    $arrSub[] = 'c.' . $a . ' IS NULL ';
                } else {
                    $arrSub[] = 'c.' . $a . " = '" . $params[':' . $a] . "' ";
                }
            }
            $op = 'empty';
            if (isset($params[':tagop_' . $a])) {
                $op = $params[':tagop_' . $a];
            }
            if ($op!='empty') {
                $subTag = [];
                foreach ($params[':tagset_' . $a] as $b) {
                    if (isset($b['tag'])) {
                        $subTag[] = ' c.tagset_' . $a . " ILIKE '%|" . $b['tag'] . "|%'";
                    }
                }
                if (count($subTag)>0) {
                    $arrSub[] = '(' . implode(' ' . $op . ' ',$subTag) . ')';
                }
            }
        }
        
        if ($params[':cbl']!='js:model.cbl') {
            $arrSub[] = "f.category IN ('" . str_replace(',',"','",$params[':cbl'] . "')");
        }
        
        if (count($arrSub)>0) {
            $whereSql = 'WHERE ' . implode(' AND ', $arrSub);
        } else {
            $whereSql = 'WHERE 1 = 1';
        }
        
          // $sql = "SELECT COALESCE(SUM(count),0) sum
          //             FROM c_phrase c
          //             INNER JOIN mapping_file m ON m.phrase = c.phrase
          //             INNER JOIN file f ON f.id = m.file_id
          //             ".$whereSql." { AND [where]}";
        $sql = "SELECT COUNT(1) as sum
                FROM c_phrase c
                INNER JOIN file f ON f.id = c.file_id
                ".$whereSql." { AND [where]}";
        return $sql;
    }
    
    public function getKolokatRsatu($params) {
        $word = @$params[':word'];
        
        $kolokat = @$params[':kolokat'];
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            } else if ($kolokat == 'l2'){
                $queryKol = "AND tagset_word_l2	= ";
            } else if ($kolokat == 'l1'){
                $queryKol = "AND tagset_word_l1	= ";
            } else if ($kolokat == 'r1'){
                $queryKol = "AND tagset_word_r1	= ";
            } else if ($kolokat == 'r2'){
                $queryKol = "AND tagset_word_r2	= ";
            }
        } else {
            $queryKol = "";
        }
        
        $kelas = @$params[':kelas'];
        if(!is_null($kelas)){
            if($kelas == '' || $kelas == 'js:model.kelas'){
                $queryKol = "";    
            } else {
                $queryKol .= "'|$kelas|'";
            }
        } else {
            $queryKol = "";
        }
        
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            }
        } else {
            $queryKol = "";
        }
        
        $category = @$params[':cbl'];
        if(!is_null($category)){
            $queryCat = "AND f.category IN ('" . str_replace(',',"','",$params[':cbl'] . "')");
        } else {
            $queryCat = "";
        }
        
        $sql = "SELECT COUNT(a.word_r1), a.word_r1 
                FROM (
                    SELECT c.*, string_agg(category, ', ') category
                    FROM c_phrase c
                    INNER JOIN file f ON f.id = c.file_id
                    AND c.word = '$word' $queryKol $queryCat
                    GROUP BY c.id, c.phrase, c.word_l2, c.word_l1, c.word, c.word_r1, c.word_r2, c.tagset_word_r2, c.tagset_word_r1, c.tagset_word, c.tagset_word_l1, c.tagset_word_l2, c.file_id
                    ) a
                GROUP BY a.word_r1
                ORDER BY count DESC
                LIMIT 25
                ";
        return $sql;
    }
    
    public function getKolokatLsatu($params) {
        $word = @$params[':word'];
        
        $kolokat = @$params[':kolokat'];
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            } else if ($kolokat == 'l2'){
                $queryKol = "AND tagset_word_l2	= ";
            } else if ($kolokat == 'l1'){
                $queryKol = "AND tagset_word_l1	= ";
            } else if ($kolokat == 'r1'){
                $queryKol = "AND tagset_word_r1	= ";
            } else if ($kolokat == 'r2'){
                $queryKol = "AND tagset_word_r2	= ";
            }
        } else {
            $queryKol = "";
        }
        
        $kelas = @$params[':kelas'];
        if(!is_null($kelas)){
            if($kelas == '' || $kelas == 'js:model.kelas'){
                $queryKol = "";    
            } else {
                $queryKol .= "'|$kelas|'";
            }
        } else {
            $queryKol = "";
        }
        
        if(!is_null($kolokat)){
            if($kolokat == '-'){
                $queryKol = "";
            }
        } else {
            $queryKol = "";
        }
        
        $category = @$params[':cbl'];
        if(!is_null($category)){
            $queryCat = "AND f.category IN ('" . str_replace(',',"','",$params[':cbl'] . "')");
        } else {
            $queryCat = "";
        }
        
        $sql = "SELECT COUNT(a.word_l1), a.word_l1 
                FROM (
                    SELECT c.*, string_agg(category, ', ') category
                    FROM c_phrase c
                    INNER JOIN file f ON f.id = c.file_id
                    AND c.word = '$word' $queryKol $queryCat
                    GROUP BY c.id, c.phrase, c.word_l2, c.word_l1, c.word, c.word_r1, c.word_r2, c.tagset_word_r2, c.tagset_word_r1, c.tagset_word, c.tagset_word_l1, c.tagset_word_l2, c.file_id
                    ) a
                GROUP BY a.word_l1
                ORDER BY count DESC
                LIMIT 25 
                ";
        return $sql;
    }
}
