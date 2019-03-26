@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">

    	<div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center">
    		<ul class="uk-breadcrumb">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/addressbook">Address Book</a></li>
                <li><span>{{ ucwords($addressBookEntry->first_name) }} {{ ucwords($addressBookEntry->last_name) }}</span></li>
            </ul>
        </div>
        
        <div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center uk-card uk-card-default uk-padding">

           
				<fieldset class="uk-fieldset">

					@if ( $addressBookEntry->image )
						<div class="uk-margin">
							<img src="{{ $addressBookEntry->image }}" alt="" style="max-width: 250px; border-radius: 5px;">
						</div>
					@endif
					
					<div class="uk-margin">
						<h2>{{ ucwords($addressBookEntry->first_name) }} {{ ucwords($addressBookEntry->last_name) }}</h2>
					</div>


					@if ( trim($addressBookEntry->tags) )
					<!-- <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
						<label class="uk-width-1 label-spacing uk-text-muted" for="">Tags</label>

						<div class="uk-margin-remove">
							<?php if (strpos($addressBookEntry->tags, 'Favourite') !== false) { echo '<span class="uk-badge uk-padding-small">Favourite</span>'; } ?>
						</div>
					</div> -->
					@endif

					@if ($addressBookEntry->number)
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Mobile Number</label>
						<p class="uk-margin-remove"><a href="tel:{{ $addressBookEntry->number }}">{{ $addressBookEntry->number }}</a></p>
					</div>
					@endif

					@if ($addressBookEntry->email)
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Email Address</label>
						<p class="uk-margin-remove"><a href="mailto:{{ $addressBookEntry->email }}">{{ $addressBookEntry->email }}</a></p>
					</div>
					@endif

					@if ($addressBookEntry->occupation)
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Occupation</label>
						<p class="uk-margin-remove">{{ $addressBookEntry->occupation }}</p>
					</div>
					@endif

					@if ($addressBookEntry->birthday)
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Birthday</label>
						<p class="uk-margin-remove">{{ $addressBookEntry->birthday }}</p>
					</div>
					@endif

					@if ($addressBookEntry->facebook || $addressBookEntry->instagram || $addressBookEntry->twitter || $addressBookEntry->linkedin)
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Social Media</label>
						@if ($addressBookEntry->facebook) <a href="{{ $addressBookEntry->facebook }}" target="_blank"><i class="fab fa-facebook fa-2x uk-margin-small-right"></i></a> @endif 
						@if ($addressBookEntry->instagram) <a href="{{ $addressBookEntry->instagram }}" target="_blank"><i class="fab fa-instagram fa-2x uk-margin-small-right"></i></a> @endif 
						@if ($addressBookEntry->twitter) <a href="{{ $addressBookEntry->twitter }}" target="_blank"><i class="fab fa-twitter fa-2x uk-margin-small-right"></i></a> @endif 
						@if ($addressBookEntry->linkedin) <a href="{{ $addressBookEntry->linkedin }}" target="_blank"><i class="fab fa-linkedin fa-2x uk-margin-small-right"></i></a> @endif 
					</div>
					@endif

					@if ($addressBookEntry->address1 || $addressBookEntry->postcode)
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Address</label>
						@if ($addressBookEntry->address1) <p class="uk-margin-remove">{{ $addressBookEntry->address1 }}</p> @endif
						@if ($addressBookEntry->address2) <p class="uk-margin-remove">{{ $addressBookEntry->address2 }}</p> @endif
						@if ($addressBookEntry->city) <p class="uk-margin-remove">{{ $addressBookEntry->city }}</p> @endif
						@if ($addressBookEntry->postcode) <p class="uk-margin-remove">{{ $addressBookEntry->postcode }}</p> @endif
						<a href="https://www.google.com/maps/place/{{ $addressBookEntry->address1 }}+{{ $addressBookEntry->address2 }}+{{ $addressBookEntry->city }}+{{ $addressBookEntry->postcode }}" target="_blank">View Address</a>
					</div>
					@endif


					
					

					<div class="uk-margin uk-margin-large-top">
						<div class="uk-button-group uk-width-1-1">
						    <a href="/addressbook/{{$addressBookEntry->id}}/edit" class="uk-button uk-button-default uk-button-large uk-width-1-1">Edit</a>
						    <button uk-toggle="target: #modal-delete" type="button" class="uk-button uk-button-danger uk-button-large uk-width-1-1">Delete</button>
						</div>
					</div>

				</fieldset>

        </div>
    </div>
</div>

<div id="modal-delete" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Delete Entry</h2>
        <p>Are you certain you want to delete this diary entry? <br>
        Once deleted there is no way to retrieve any information from this entry.</p>
        <hr>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <a href="/addressbook/{{$addressBookEntry->id}}/destroy" class="uk-button uk-button-danger" type="button">Delete</a>
        </p>
    </div>
</div>


@endsection