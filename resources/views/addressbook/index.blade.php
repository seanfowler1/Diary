@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">
        <div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center">

            <ul class="uk-breadcrumb">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><span>Address Book</span></li>
            </ul>

            <!-- <input class="uk-input uk-form-width-medium uk-align-center datepicker" type="text" data-init-set="false" data-format="d/m/Y" data-large-mode="true" data-large-default="true" data-modal="true" data-theme="datepicker" placeholder="Search by Date" /> -->
            <a class="uk-button uk-button-primary uk-button-large uk-align-center" href="/addressbook/create">Create New Entry</a>
            <hr class="uk-margin-large">
        </div>

        <div class="uk-margin">
			@foreach ($addressBookEntries as $addressBookEntry)
        		<div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center uk-card uk-card-default uk-padding uk-card-hover">
        			<h2 class="uk-margin-remove uk-display-inline-block">{{ ucwords($addressBookEntry->first_name) }} {{ ucwords($addressBookEntry->last_name) }}</h2>
        			<p class="uk-display-inline-block uk-float-right uk-align-right" style="margin-top: 15px;"><a href="/addressbook/{{ $addressBookEntry->id }}">View Entry</a></p>
				</div>
			@endforeach
		</div>
    </div>
</div>

<!-- init dateDropper -->
<script>
$('input.datepicker').dateDropper();
</script>



@endsection