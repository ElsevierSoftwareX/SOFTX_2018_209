$scope.modalUpdate = false;
$scope.modalIgnore = false;
$scope.updateword = false;
$scope.row = '';

$scope.openModalUpdate = function(row){
    $scope.modalUpdate = true;
    console.log(row);
    //$scope.model.id = row.id;
    $scope.model.word = row.word;
    $scope.model.tag = row.tagset;
    $scope.row = row;
}

$scope.closeModalUpdate = function(){
    $scope.modalUpdate = false;
    $scope.row = '';
}

$scope.setUpdateWord = function(){
    if($scope.model.tag==''){
        $scope.model.tag = $scope.row.tagset_desc;
    }
    $timeout(function(){
        var post = {
            fileid : $scope.params.id,
            wordNew : $scope.model.word,
            tagNew : $scope.model.tag,
            wordOld : $scope.row.word,
            tagOld : $scope.row.tagset,
            idMappingFile : $scope.row.id, 
            isWord : $scope.row.isword
        };
        $http
            .post(Yii.app.createUrl('admin/index/update'), {data: post})
            .success(function(res) {
                alert(res);
                $scope.row = '';
                $scope.dsWord.query();
                $scope.modalUpdate = false;
            })    
    })
    
}

// $scope.$watch('service', function() {
//     $timeout(function() {
//         if($scope.service.running('UpdateWord')){
//             $scope.updateword = true;
//         }
//         else if($scope.updateword){
//             $scope.updateword = false;
//         }
//     })
// }, 3000)

$scope.dsWord.afterQuery = function(){
    console.log('baru', $scope.dsWord);
}

$scope.setUpdateAll = function(){
    if($scope.model.tag==''){
        $scope.model.tag = $scope.row.tagset;
    }
    var post = {
        wordNew : $scope.model.word,
        tagNew : $scope.model.tag,
        wordOld : $scope.row.word,
        tagOld : $scope.row.tagset
    };
    $http
        .post(Yii.app.createUrl('admin/index/updateAll'), {data: post})
        .success(function(res) { 
            alert(res);
            $scope.dsWord.query();
            $scope.modalUpdate = false;
        })
}

$scope.openModalIgnore = function(row){
    $scope.modalIgnore = true;
    $scope.model.id = row.id;
    $scope.row = row;
}

$scope.closeModalIgnore = function(){
    $scope.modalIgnore = false;
    $scope.row = '';
}

$scope.setIgnore = function(){
    var post = {
        fileid : $scope.params.id,
        word : $scope.row.word,
        tagset : $scope.row.tagset
    };
    $http
        .post(Yii.app.createUrl('admin/index/ignore'), {data: post})
        .success(function(res) { 
            alert(res);
            $scope.dsFile.query();
            $scope.dsWord.query();
            $scope.modalIgnore = false;
        })
    
}

$scope.setIgnoreAll = function(){
    if($scope.model.tag==''){
        $scope.model.tag = $scope.row.tagset;
    }
    var post = {
        word : $scope.row.word,
        tagset : $scope.row.tagset
    };
    $http
        .post(Yii.app.createUrl('admin/index/ignoreAll'), {data: post})
        .success(function(res) { 
            alert(res);
            $scope.dsFile.query();
            $scope.dsWord.query();
            $scope.modalIgnore = false;
        })
}

$scope.dsWord.query();