@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">

    	<div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center">
    		<ul class="uk-breadcrumb">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/addressbook">Address Book</a></li>
                <li><span>Edit</span></li>
            </ul>
        </div>

        <div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center uk-card uk-card-default uk-padding">

           <form action="/addressbook/{{$addressBookEntry->id}}/update" method="POST">
           		@csrf
				<fieldset class="uk-fieldset">

					<legend class="uk-legend">Edit Address Book Entry</legend>

					<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
						<label class="uk-width-1 label-spacing" for="">Tags</label>

					    <label><input class="uk-checkbox" type="checkbox" value="Favourite" name="favourite" 
					    <?php if (strpos($addressBookEntry->tags, 'Favourite') !== false) { echo 'checked'; } ?>> Favourite</label>

					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">First Name</label>
					    <input class="uk-input" type="text" placeholder="" name="firstName" value="{{ $addressBookEntry->first_name }}" required="" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Last Name</label>
					    <input class="uk-input" type="text" placeholder="" name="lastName" value="{{ $addressBookEntry->last_name }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Profile Image</label>
					    <input class="uk-input" type="url" placeholder="" name="image" value="{{ $addressBookEntry->image }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Mobile Number</label>
					    <input class="uk-input" type="text" placeholder="" name="number" value="{{ $addressBookEntry->number }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Email Address</label>
					    <input class="uk-input" type="email" placeholder="" name="email" value="{{ $addressBookEntry->email }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Occupation</label>
					    <input class="uk-input" type="text" placeholder="" name="occupation" value="{{ $addressBookEntry->occupation }}" />
					</div>

					<div class="uk-margin">
					    <?php if($addressBookEntry->birthday){ $dateFormated = DateTime::createFromFormat('d/m/Y',$addressBookEntry->birthday)->format('m-d-Y');} 
					    		else { $dateFormated = '';} 
						?>
						<label class="label-spacing" for="">Birthday</label>
					    <input class="uk-input datepicker" type="text" data-default-date="{{$dateFormated}}" data-init-set="false" data-format="d/m/Y" data-large-mode="true" data-large-default="true" data-theme="datepicker" data-modal="true" name="date" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Facebook</label>
					    <input class="uk-input" type="url" placeholder="" name="facebook" value="{{ $addressBookEntry->facebook }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Instagram</label>
					    <input class="uk-input" type="url" placeholder="" name="instagram" value="{{ $addressBookEntry->instagram }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Twitter</label>
					    <input class="uk-input" type="url" placeholder="" name="twitter" value="{{ $addressBookEntry->twitter }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Linkedin</label>
					    <input class="uk-input" type="url" placeholder="" name="linkedin" value="{{ $addressBookEntry->linkedin }}" />
					</div>


					

					<div class="uk-margin">
						<label class="label-spacing" for="">Address</label>
					    <input class="uk-input" type="text" placeholder="" name="address1" value="{{ $addressBookEntry->address1 }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Address 2</label>
					    <input class="uk-input" type="text" placeholder="" name="address2" value="{{ $addressBookEntry->address2 }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">City</label>
					    <input class="uk-input" type="text" placeholder="" name="city" value="{{ $addressBookEntry->city }}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Postcode</label>
					    <input class="uk-input" type="text" placeholder="" name="postcode" value="{{ $addressBookEntry->postcode }}" />
					</div>

					<div class="uk-margin uk-margin-large-top">
						<button class="uk-button uk-button-primary uk-button-large uk-width-1-1">Update Entry</button>
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


<script type="text/javascript">
  $(function() {
    $('#star-rating').barrating({
      theme: 'css-stars'
    });
  });
</script>

@endsection