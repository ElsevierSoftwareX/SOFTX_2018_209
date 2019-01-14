$scope.modalUpdate = false;
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
    if($scope.model.word===''){
        alert('Tidak dapat menyimpan. Mohon isi field yang dibutuhkan. ');
    }
    else{
        var post = {
            word : $scope.model.word
        };
        $http
            .post(Yii.app.createUrl('admin/exceptions/new'), {data: post})
            .success(function(res) { 
                alert(res);
                $scope.dataSource1.query();
                $scope.modalUpdate = false;
            })    
    }
    
    
}