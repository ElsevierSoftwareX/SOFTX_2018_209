$scope.modalUpdate = false;
$scope.dis = true;
$scope.cansave = false;
$scope.row = '';

$scope.syncDoc = function(){
    var r = confirm("Apakah Anda yakin? Data yang diubah secara lokal akan terganti.");
    if (r == true) {
        alert('Mohon Tunggu...');
        $http
            .post(Yii.app.createUrl('admin/index/sync'), {data: []})
            .success(function(res) { 
                alert('Service selesai dijalankan...');
            })    
    }
}

$scope.openModalUpdate = function(){
    $scope.modalUpdate = true;
    $scope.dis = true;
    //$("#dcacl").attr('disabled','disabled');
}

$scope.closeModalUpdate = function(){
    $scope.modalUpdate = false;
    $scope.row = '';
}

$scope.setUpdate = function(){
    if(!$scope.cansave){
        alert('Tidak dapat menyimpan. Mohon isi field yang dibutuhkan. ');
    }
    else{
        var post = {
            wordnew : $scope.model.new_word,
            wordold : $scope.model.old_word,
            tagold : $scope.model.tagset_old,
            tagnew : $scope.model.tag
        };
        $http
            .post(Yii.app.createUrl('admin/updateWord/new'), {data: post})
            .success(function(res) { 
                alert(res);
                $scope.dataSource1.query();
                $scope.modalUpdate = false;
            })    
    }
}

$scope.$watch('model.old_word', function() {
    $timeout(function() {
        if($scope.model.old_word!==null&&$scope.model.old_word!==''){
            $scope.dis = false;    
            $scope.model.new_word = $scope.model.old_word;
            check();
            }
        }
    )
});

$scope.$watch('model.new_word', function() {
    $timeout(function() {
        if($scope.model.new_word!==null&&$scope.model.new_word!==''){
            check();
            }
        }
    )
});

$scope.$watch('model.tagset_old', function() {
    $timeout(function() {
        check();
    })
});

$scope.$watch('model.tagset_new', function() {
    $timeout(function() {
        check();
    })
});

function check(){
    var cansave = true;
    if($scope.model.old_word==''||$scope.model.old_word==null){
        cansave = false;
    }
    else if ($scope.model.new_word==''||$scope.model.new_word==null){
        cansave = false;
    }
    else if($scope.model.tagset_old==''||$scope.model.tagset_old==null){
        cansave = false;
    }
    $scope.cansave = cansave;
}