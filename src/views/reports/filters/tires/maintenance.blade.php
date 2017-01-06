@section('filter')

    @include('includes.filter-buttons', [ 'pageActive' => 'reports-tires-maintenance' ])
      
    <form method="get" id="search">
      <div class="demo-drawer mdl-layout__drawer-right">
        <span class="mdl-layout-title mdl-color--primary mdl-color-text--accent-contrast">{{Lang::get('general.Search')}}<span class="mdl-search__div-close"><i class="material-icons">highlight_off</i></span></span>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('fleet_number', $filters['fleet-number'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('fleet_number', Lang::get('webreports.fleetNumber'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('number', $filters['number'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('number', Lang::get('webreports.number'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('plate', $filters['plate'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('plate', Lang::get('webreports.plate'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('position', $filters['position'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('position', Lang::get('webreports.position'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('datetime', $filters['datetime'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('datetime', Lang::get('webreports.dateAndTime'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('cost', $filters['cost'], ['id' => 'cost', 'class' => 'mdl-textfield__input mdl-search__input  mdl-textfield__maskmoney'])!!}
    		{!!Form::label('cost', Lang::get('general.cost'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('maintenance_type', $filters['maintenance-type'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('maintenance_type', Lang::get('webreports.maintenanceType'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <button type="submit" class="mdl-button mdl-color--primary mdl-color-text--accent-contrast mdl-js-button mdl-button--raised mdl-button--colored mdl-search__button">
    		{{Lang::get('general.Search')}}
         </button>
      </div>
    </form>
	<script>
    	$( document ).ready(function() {
    		$('#cost').maskMoney({!!Lang::get("masks.money")!!});
    	});
    </script>
    
@stop
