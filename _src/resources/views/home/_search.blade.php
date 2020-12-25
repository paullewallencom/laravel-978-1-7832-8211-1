<div>
    <form method="GET" class="form-horizontal" novalidate>
        <div class="input-group">
            <input type="text" name="name" class="form-control col-lg-10"
                   placeholder="Search for your comic..." ng-model="vm.search">
        <span class="input-group-btn">
            <input type="submit" id="search" class="btn btn-primary" ng-click="vm.searchFor()" ng-disabled="vm.disableSearch()">Search</input>
        </span>
        </div>
        <div class="help-block">You are going to search for ... @{{ vm.search }}</div>
        <div class="alert alert-info" ng-if="vm.searching">
            <i class="fa fa-gear fa-spin"></i>&nbsp;Searching for results will be right back...</div>
        <div class="alert alert-danger" ng-if="vm.error">Error getting results :( </div>
    </form>
    <hr>
    @include('home._angular_search_results')
</div>
