$scope.openAs = false;
$scope.model.rbl2 = 'anything';
$scope.model.rbl1 = 'anything';
$scope.model.rbr2 = 'anything';
$scope.model.rbr1 = 'anything';

$scope.searchWord = function(){
    $scope.dataFilter1.filters[4].value = document.getElementsByName("AdminSearch[word]")[0].value;
    $scope.dsPhrase.query();
}

$scope.openBox = function(){
    $scope.openAs = !$scope.openAs;
}

$scope.searchASWord = function(){   
    if($scope.model.rbl2=='anything'){
        $scope.dataFilter1.filters[0].value = '';
        $scope.model.tagoperatorl2 = 'empty';
    }
    else if($scope.model.rbl2=='empty'){
        $scope.dataFilter1.filters[0].value = '##!@# EMPTY #@!##';
        $scope.model.tagoperatorl2 = 'empty';
    }
    else if($scope.model.rbl2=='match'){
        $scope.dataFilter1.filters[0].value = $scope.model.word_l2;
    }
    
    if($scope.model.rbl1=='anything'){
        $scope.dataFilter1.filters[2].value = '';
        $scope.model.tagoperatorl1 = 'empty';
    }
    else if($scope.model.rbl1=='empty'){
        $scope.dataFilter1.filters[2].value = '##!@# EMPTY #@!##';
        $scope.model.tagoperatorl1 = 'empty';
    }
    else if($scope.model.rbl1=='match'){
        $scope.dataFilter1.filters[2].value = $scope.model.word_l1;
    }
    
    if($scope.model.rbr1=='anything'){
        $scope.dataFilter1.filters[6].value = '';
        $scope.model.tagoperatorr1 = 'empty';
    }
    else if($scope.model.rbr1=='empty'){    
        $scope.dataFilter1.filters[6].value = '##!@# EMPTY #@!##';
        $scope.model.tagoperatorr1 = 'empty';
    }
    else if($scope.model.rbr1=='match'){
        $scope.dataFilter1.filters[6].value = $scope.model.word_r1;
    }
    
    if($scope.model.rbr2=='anything'){
        $scope.dataFilter1.filters[8].value = '';
        $scope.model.tagoperatorr2 = 'empty';
    }
    else if($scope.model.rbr2=='empty'){
        $scope.dataFilter1.filters[8].value = '##!@# EMPTY #@!##';
        $scope.model.tagoperatorr2 = 'empty';
    }
    else if($scope.model.rbr2=='match'){
        $scope.dataFilter1.filters[8].value = $scope.model.word_r2;
    }
    
    
    $scope.dataFilter1.filters[4].value = document.getElementsByName("AdminSearch[word]")[0].value;
    
    $scope.dsPhrase.query();
}

$scope.$watch('dataFilter1.filters', function() {
    $timeout(function() {
        for(var i in $scope.dataFilter1.filters){
            var e = $scope.dataFilter1.filters[i].show = false;
        }
        document.getElementsByClassName("filter-manage")[0].style.display = 'none';
    })
}, true)
