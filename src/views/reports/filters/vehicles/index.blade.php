@section('filter')

    @include('includes.filter-buttons', [ 'pageActive' => 'reports-vehicles' ])
      
    <form method="get" id="search">
      <div class="demo-drawer mdl-layout__drawer-right">
        <span class="mdl-layout-title mdl-color--primary mdl-color-text--accent-contrast">{{Lang::get('general.Search')}}<span class="mdl-search__div-close"><i class="material-icons">highlight_off</i></span></span>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('fleet_number', $filters['fleet-number'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('fleet_number', Lang::get('webreports.fleetNumber'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('plate', $filters['plate'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('plate', Lang::get('webreports.plate'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('vendor', $filters['vendor'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('vendor', Lang::get('webreports.vendor'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('model', $filters['model'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('model', Lang::get('webreports.model'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('year', $filters['year'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('year', Lang::get('webreports.year'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('number_of_tires', $filters['number-of-tires'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('number_of_tires', Lang::get('webreports.numberOfTires'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('number_of_sensors', $filters['number-of-sensors'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('number_of_sensors', Lang::get('webreports.numberOfSensors'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('number_of_alerts', $filters['number-of-alerts'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('number_of_alerts', Lang::get('webreports.numberOfAlerts'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('number_of_maintenances', $filters['number-of-maintenances'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('number_of_maintenances', Lang::get('webreports.numberOfMaintenances'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <div class="mdl-textfield mdl-js-textfield is-upgraded is-focused mdl-textfield--floating-label mdl-search__div" data-upgraded="eP">
     		{!!Form::text('number_of_active_alerts', $filters['number-of-active-alerts'], ['class' => 'mdl-textfield__input mdl-search__input'])!!}
    		{!!Form::label('number_of_active_alerts', Lang::get('webreports.numberOfActiveAlerts'), ['class' => 'mdl-textfield__label is-dirty'])!!}
         </div>
         <button type="submit" class="mdl-button mdl-color--primary mdl-color-text--accent-contrast mdl-js-button mdl-button--raised mdl-button--colored mdl-search__button">
    		{{Lang::get('general.Search')}}
         </button>
      </div>
    </form>
@stop
