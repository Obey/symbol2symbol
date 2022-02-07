
  <div class="container-fluid  d-flex flex-wrap  justify-content-center" >
 <div ng-class="{'bg-light': cur.fix}" ng-if="cur.what != ' ' " ng-repeat="cur in curArr  track by $index" class="vstack gap-1 border rounded p-1 m-1" style="max-width: 80px;">
  <div class="bg-light border d-none">{{ cur.what }}</div> 
  <div class="btn-group dropdown">
  <button  style="font-size: 18px;" type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  {{ cur.with }}</button>
  <ul class="dropdown-menu">
  <li ng-repeat="new in cur.arr  track by $index"><button class="dropdown-item" type="button" ng-click="cur.with=new; cur.fix = true;">{{new}}</button></li>
  </ul>
</div>
<div class="form-check form-switch mx-auto">
  <input ng-model="cur.fix" class="form-check-input" type="checkbox" role="switch" id="ult_{{$index}}">
  <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
</div>
</div>
</div>