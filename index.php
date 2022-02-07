<html>
<title>Symbol2Symbol</title>
<meta name="robots" content="max-snippet:-1,max-image-preview:standard,max-video-preview:-1" />

<meta name="description" content="">
<meta name="keywords" content="">

<meta property="og:type" content="website" />
<meta property="og:url" content="https://shop.zabor-ss.ru/CHARS2SYMBOL/" />
<meta property="fb:image" content="" />

<meta property="og:image" content="" />
<meta property="og:image:width" content="330"/>
<meta property="og:image:height" content="330"/>
<meta property="og:site_name" content=""/>
<!--  -->
<meta property="og:asset" content="" />
<meta property="og:title" content="Symbol2Symbol" />
<meta property="og:description" content="" />

<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <link href="/new/depend/noui1551/dist/nouislider.css" rel="stylesheet">
<script src="/new/depend/noui1551/dist/nouislider.js"></script>
<link rel="stylesheet" href="/js_css/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

<style>

.bw {
  
  filter: grayscale(100%);
}
.invert {
  filter: saturate(0%);   
}

.trid {
  position: absolute;


  text-shadow:     0 1px 0 hsl(174,5%,80%),
	                 0 2px 0 hsl(174,5%,75%),
	                 0 3px 0 hsl(174,5%,70%),
	                 0 4px 0 hsl(174,5%,66%),
	                 0 5px 0 hsl(174,5%,64%),
	                 0 6px 0 hsl(174,5%,62%),
	                 0 7px 0 hsl(174,5%,61%),
	                 0 8px 0 hsl(174,5%,60%),
	
	                 0 0 5px rgba(0,0,0,.05),
	                0 1px 3px rgba(0,0,0,.2),
	                0 3px 5px rgba(0,0,0,.2),
	               0 5px 10px rgba(0,0,0,.2),
	              0 10px 10px rgba(0,0,0,.2),
	              0 20px 20px rgba(0,0,0,.3);
}

</style>
  <body  ng-app="myApp" ng-controller="myCtrl" class="container-fluid p-1 m-1 text-center bg-tr">
  <div  class="p-1 mx-auto text-center mt-1 mb-2" ng-show="str!=''" style="max-width: 600px;">
 <div id="slider"></div>
</div>


  <div class="container p-2 mx-auto text-center"  style="font-size: {{fs}}px; min-height: 100px;">
 <p id="ERE" class="p-4 m-4"></p>
 </div>


  

  <nav>
  <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="bi bi-house"></i></button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="bi bi-share"></i></button>
 <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="bi bi-table"></i></button>  -->
  </div>
</nav>
<div class="tab-content bg-hftr" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    
<? include "maintab.php"; ?>
<? include "letters.php"; ?>

  </div>
  <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <? include "tab.php"; ?>

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <? include "ggltbl.php"; ?>

  </div>
</div>










 

 

 
</body>

<script>
var app = angular.module("myApp", []);
app.controller("myCtrl", function($scope, $http, $filter) {
  function onlyUnique(value, index, self) {
  return self.indexOf(value) === index;
}
  var RND = (to) => Math.floor(Math.random() * to);

  let url = 'https://shop.zabor-ss.ru/CHARS2SYMBOL/chars.json?new=' + RND(22);
  $http.get(url).then(function(response) {
    $scope.chArr = response.data;
  });
  $scope.fs = 48;
  $scope.str = "";
  $scope.curArr = [];  


  $scope.$watch('str', function() {
  $scope.strSplit =  $scope.str.split("").filter((el) => el.what != " ").map((el) => el = el.toUpperCase()).filter(onlyUnique);


  $scope.strSplit.map(function(el, i) {
  
   if (!$scope.curArr.find((cur, i) => cur.what == el.toUpperCase())) $scope.curArr.push({ what: el.toUpperCase(), with: el.toUpperCase(), fix: false });
  
  });



  $scope.curArr.map((el, i) => el.arr = $scope.chArr.find((row) => row.what.includes(el.what))?.with  );
  });

$scope.replaceIt = function(str, rand = 0) {
 
let lastrnd = $scope.chArr[$scope.chArr.length - 1].with;
rand = RND(lastrnd.length);
if (str == "")  str = $scope.str =  lastrnd[rand];

$scope.curArr.map(function(cur) { 

  let randsymb =  cur.what;
  let charrow = $scope.chArr.find((el) => el.what.includes(cur.what));

if (charrow) rand = RND(charrow.with.length);
if (charrow) randsymb = charrow.with[rand];

if (cur.fix != true) cur.with = randsymb;

str = str.toUpperCase().replaceAll(cur?.what, cur?.with);      

    }); 

    return str;		
  }



  $(document).ready(function(){
    var pipsSlider = document.getElementById('slider');
 
  $scope.noUiSlider = noUiSlider.create(pipsSlider, {
    range: {
        min: 9,
        max: 72
    },
    start: [$scope.fs],
    pips: {mode: 'count', values: 10},
    tooltips: false
});

$scope.noUiSlider.on('change', function (values, handle) {
  $scope.fs = values[handle];
  pipsSlider.noUiSlider.set($scope.fs);
  $scope.$apply();
 
});
$scope.$watch('fs', function() {
 
});

var pips = pipsSlider.querySelectorAll('.noUi-value');

function clickOnPip() {
    var value = Number(this.getAttribute('data-value'));
    pipsSlider.noUiSlider.set(value);
    $scope.fs = value;
    $scope.$apply();
}

for (var i = 0; i < pips.length; i++) {    // For this example. Do this in CSS!
  pips[i].style.font =  i*8 + 'px';  
  pips[i].style.cursor = 'pointer';
    pips[i].addEventListener('click', clickOnPip);
}


});

  $.fn.wrapInTag = function(opts) {
    var tag = opts.tag || 'strong',
      words = opts.words || [],
      regex = RegExp(words.join('|'), 'gi'),
      replacement = '<' + tag + '>$&</' + tag + '>';

    return this.html(function() {
      return $(this).text().replace(regex, replacement);
    });
  };

  $scope.boldIt = function() {
		let words = $scope.chArr[0].what;	
	   $("#ERE").empty();	
    $("#HERE").clone().prependTo("#ERE");		
    $('#ERE').wrapInTag({
      tag: 'b',
      words: words
    });
  }

$scope.$watch('finstr', function() {
 setTimeout($scope.boldIt,220);
// $scope.$apply();
 });
});


</script>
</html>
