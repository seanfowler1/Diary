@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">

    	<div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center">
    		<ul class="uk-breadcrumb">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/addressbook">Address Book</a></li>
                <li><span>Create</span></li>
            </ul>
        </div>

        <div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center uk-card uk-card-default uk-padding">

           <form action="/addressbook/store" method="POST">
           		@csrf
				<fieldset class="uk-fieldset">

					<legend class="uk-legend">New Address Book Entry</legend>

					<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
						<label class="uk-width-1 label-spacing" for="">Tags</label>
					    <label><input class="uk-checkbox" type="checkbox" value="Favourite" name="favourite"> Favourite</label>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">First Name</label>
					    <input class="uk-input" type="text" placeholder="" name="firstName" required="" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Last Name</label>
					    <input class="uk-input" type="text" placeholder="" name="lastName" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Profile Image</label>
					    <input class="uk-input" type="url" placeholder="" name="image" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Mobile Number</label>
					    <input class="uk-input" type="text" placeholder="" name="number" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Email Address</label>
					    <input class="uk-input" type="email" placeholder="" name="email" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Occupation</label>
					    <input class="uk-input" type="text" placeholder="" name="occupation" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Birthday</label>
					    <input class="uk-input datepicker" type="text" data-init-set="false" data-format="d/m/Y" data-large-mode="true" data-large-default="true" data-theme="datepicker" data-modal="true" name="birthday" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Facebook</label>
					    <input class="uk-input" type="url" placeholder="" name="facebook" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Instagram</label>
					    <input class="uk-input" type="url" placeholder="" name="instagram" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Twitter</label>
					    <input class="uk-input" type="url" placeholder="" name="twitter" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Linkedin</label>
					    <input class="uk-input" type="url" placeholder="" name="linkedin" />
					</div>


					

					<div class="uk-margin">
						<label class="label-spacing" for="">Address</label>
					    <input class="uk-input" type="text" placeholder="" name="address1" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Address 2</label>
					    <input class="uk-input" type="text" placeholder="" name="address2" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">City</label>
					    <input class="uk-input" type="text" placeholder="" name="city" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Postcode</label>
					    <input class="uk-input" type="text" placeholder="" name="postcode" />
					</div>


					

					<div class="uk-margin uk-margin-large-top">
						<button class="uk-button uk-button-primary uk-button-large uk-width-1-1">Create Entry</button>
					</div>

				</fieldset>
			</form>

        </div>
    </div>
</div>

<!-- init dateDropper -->
<script>
$('input.datepicker').dateDropper();
</script>


@endsection