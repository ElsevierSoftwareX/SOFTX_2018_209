$scope.processSync = '[0/0]';

$scope.$watch('service', function() {
    $timeout(function() {
        if($scope.service.running('SyncFile')){
            watchSync();
        }
    })
}, 3000)


function watchSync() {
    $http.post(Yii.app.createUrl('admin/index/getProcessStatus'), {
        data: []
        })
        .success(function(res) {
            $scope.processSync = '['+res+']';
    })
}