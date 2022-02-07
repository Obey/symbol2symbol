
 

<div class="input-group rounded py-3 mx-auto" style="font-size: 18px; max-width: 600px; "> 
   <textarea   ng-model="str" class="form-control text-center border rounded bg-tr" ></textarea>
 </div>

<div class="container text-center">
<button class="btn btn-primary px-4 my-2 shadow-sm" type="button" ng-click="finstr = replaceIt(str); ">❔</button>
 <div class="container p-2 m-2 text-center"  style="font-size: 14px">
 

</div>
</div>






<button class="btn btn-secondary d-none" type="button" ng-click="boldIt(); ">!</button>
<span ng-hide="!show"> 
<p id="HERE">{{finstr}}</p>
</span>
 

 