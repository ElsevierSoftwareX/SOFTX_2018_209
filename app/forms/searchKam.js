$scope.openAs = false;
$scope.whereCat = null;

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
$(document).keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        e.preventDefault();
        $timeout(function(){
            if($scope.openAs){
                $scope.searchASWord();
            } else {
                $scope.searchWord(); 
            }    
        })
        
    }
});

$scope.openNav = function(){
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";    
}

$scope.closeNav = function(){
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}

$scope.searchWord = function(){
    $timeout(function(){
        if(!$scope.model.word || $scope.model.word == ''){
            alert('Mohon isi kolom pencarian');
        } else {
            // $scope.dataFilter1.filters[4].value = document.getElementsByName("AppSearch[word]")[0].value;
            $scope.dsPhrase.query();    
        }
    })
}

$scope.explodeCat = function(){
    var whereCat = $scope.model.cbl.split(',');
    $scope.whereCat = whereCat;
}

$scope.openBox = function(){
    $scope.openAs = !$scope.openAs;
}

$scope.markSearch = function(stc){
    var lower = stc.toLowerCase();
    var search = $scope.model.word.toLowerCase();
    
    var re = new RegExp(search, 'g');
    return lower.replace(re, '<b>'+search+'</b>');
    // for(var z; z < splitted.length; z++){
    //     res += splitted[z];
    //     re
    // }
    
}