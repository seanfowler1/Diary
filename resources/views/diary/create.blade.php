@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">
        <div class="uk-margin uk-width-1-2@m uk-align-center uk-card uk-card-default uk-padding">

           <form action="/diary/store" method="POST">
           		@csrf
				<fieldset class="uk-fieldset">

					<legend class="uk-legend">New Diary Entry</legend>

					<div class="uk-margin">
						<label class="label-spacing" for="">Title</label>
					    <input class="uk-input" type="text" placeholder="" name="title" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Date</label>
					    <input class="uk-input datepicker" type="text" data-init-set="true" data-format="d/m/Y" data-large-mode="true" data-large-default="true" data-theme="datepicker" placeholder="Search by Date" data-modal="true" name="date" />
					</div>

					<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
						<label class="uk-width-1 label-spacing" for="">Tags</label>
					    <label><input class="uk-checkbox" type="checkbox" value="Favourite" name="favourite"> Favourite</label>
					    <label><input class="uk-checkbox" type="checkbox" value="Social" name="social"> Social</label>
					    <label><input class="uk-checkbox" type="checkbox" value="Productive" name="productive"> Productive</label>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">How was your day?</label>

					    <select id="star-rating" class="uk-select" name="rating">
					        <option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>  
						</select>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Who did you spend your day with?</label>
					    <input class="uk-input" type="text" placeholder="" name="people" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">What are you grateful for?</label>
					    <textarea class="uk-textarea" rows="2" name="grateful"></textarea>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">What could have made your day better?</label>
					    <textarea class="uk-textarea" rows="2" name="improvements"></textarea>
					</div>
					

   					<div class="uk-margin">
						<label class="label-spacing" for="">Main events of your day</label>
					    <textarea class="uk-textarea" rows="3" name="summary"></textarea>
					</div>
				
					<div class="uk-margin">
						<label class="label-spacing" for="">What do you aim to accomplish tomorrow?</label>
					    <textarea class="uk-textarea" rows="2" name="tomorrow"></textarea>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Diary entry</label>
					    <textarea class="uk-textarea" rows="20" name="entry"></textarea>
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


<script type="text/javascript">
  $(function() {
    $('#star-rating').barrating({
      theme: 'css-stars'
    });
  });
</script>

@endsection