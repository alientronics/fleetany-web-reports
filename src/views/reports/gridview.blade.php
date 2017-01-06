<style>
<!--
.mdl-card__supporting-text {
  overflow: auto;
}

.mdl-card {
  width: fit-content;
}
-->
</style>

<div class="mdl-cell mdl-cell--12-col mdl-grid">
	<div class="mdl-data-table mdl-js-data-table mdl-cell--12-col mdl-shadow--2dp">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--1-col"><a class="mdl-color-text--primary-contrast" href="{{url('/')}}/{{$filters['sort_url']['id']}}">{{Lang::get("general.id")}}</a></div>
          
          @foreach($gridview['sortFilters'] as $sortFilter)
          <div class="mdl-cell {{$sortFilter['class']}}"><a class="mdl-color-text--primary-contrast" href="{{url('/')}}/{{$filters['sort_url'][$sortFilter['name']]}}">{{Lang::get($sortFilter['lang'])}}</a></div>
          @endforeach
          @permission('delete.'.$gridview['pageActive'].'|update.'.$gridview['pageActive'])
          <div class="mdl-cell mdl-cell--1-col"></div>
          @endpermission
        </div>
    </div>
    
</div>
