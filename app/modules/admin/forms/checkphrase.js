$scope.modalIgnore = false;
$scope.modalUpdate = false;
$scope.row = '';

$scope.openModalIgnore = function(row){
    $scope.modalIgnore = true;
    $scope.model.id = row.id;
    $scope.row = row;
}

$scope.closeModalIgnore = function(){
    $scope.modalIgnore = false;
    $scope.row = '';
}

$scope.openModalUpdate = function(row){
    $scope.modalUpdate = true;
    $scope.model.id = row.id;
    $scope.model.word = row.word;
    $scope.model.tag = row.tagset;
    $scope.row = row;
}

$scope.closeModalUpdate = function(){
    $scope.modalUpdate = false;
    $scope.row = '';
}

$scope.setUpdate = function(){
    if($scope.model.tag==''){
        $scope.model.tag = $scope.row.tagset;
    }
    var post = {
        fileid : $scope.params.id,
        wordNew : $scope.model.word,
        tagNew : $scope.model.tag,
        wordOld : $scope.row.word,
        tagOld : $scope.row.tagset
    };
    $http
        .post(Yii.app.createUrl('admin/index/update'), {data: post})
        .success(function(res) { 
            alert(res);
            $scope.dsFile.query();
            $scope.dsPhrase.query();
            $scope.modalUpdate = false;
        })
    
}

$scope.setIgnore = function(){
    var post = {
        fileid : $scope.params.id,
        phrase : $scope.row.phrase
    };
    $http
        .post(Yii.app.createUrl('admin/index/ignorePhrase'), {data: post})
        .success(function(res) { 
            alert(res);
            $scope.dsFile.query();
            $scope.dsPhrase.query();
            $scope.modalIgnore = false;
        })
    
}

$scope.setIgnoreAll = function(){
    var post = {
        phrase : $scope.row.phrase
    };
    $http
        .post(Yii.app.createUrl('admin/index/ignorePhraseAll'), {data: post})
        .success(function(res) { 
            alert(res);
            $scope.dsFile.query();
            $scope.dsPhrase.query();
            $scope.modalIgnore = false;
        })
}