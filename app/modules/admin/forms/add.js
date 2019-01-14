$scope.checkLength = function(){
    if($scope.model.uploads.length == 11){
        alert('Maximum is 10');
        $scope.model.uploads = $scope.model.uploads.slice(0, -1);    
    }
    
}