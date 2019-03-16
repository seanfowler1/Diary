@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">
        <div class="uk-margin uk-width-1-2@m uk-align-center uk-card uk-card-default uk-padding">

           <form action="/diary/{{$diaryEntry->id}}/update" method="POST">
           		@csrf
				<fieldset class="uk-fieldset">

					<legend class="uk-legend">New Diary Entry</legend>

					<div class="uk-margin">
						<label class="label-spacing" for="">Title</label>
					    <input class="uk-input" type="text" placeholder="" name="title" value="{{$diaryEntry->title}}" />
					</div>

					<div class="uk-margin">
					    <?php $dateFormated = DateTime::createFromFormat('d/m/Y',$diaryEntry->date)->format('m-d-Y'); ?>
						<label class="label-spacing" for="">Date</label>
					    <input class="uk-input datepicker" type="text" data-default-date="{{$dateFormated}}" data-format="d/m/Y" data-large-mode="true" data-large-default="true" data-theme="datepicker" placeholder="Search by Date" data-modal="true" name="date" />


					</div>

					<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
						<label class="uk-width-1 label-spacing" for="">Tags</label>

					    <label><input class="uk-checkbox" type="checkbox" value="Favourite" name="favourite" 
					    <?php if (strpos($diaryEntry->tags, 'Favourite') !== false) { echo 'checked'; } ?>> Favourite</label>

					    <label><input class="uk-checkbox" type="checkbox" value="Social" name="social"
					    <?php if (strpos($diaryEntry->tags, 'Social') !== false) { echo 'checked'; } ?>> Social</label>

					    <label><input class="uk-checkbox" type="checkbox" value="Productive" name="productive"
					    <?php if (strpos($diaryEntry->tags, 'Productive') !== false) { echo 'checked'; } ?>> Productive</label>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">How was your day?</label>

					    <select id="star-rating" class="uk-select" name="rating">
					        <option value="1" <?php if($diaryEntry->rating == 1) { echo 'selected=""'; } ?>>1</option>
							<option value="2" <?php if($diaryEntry->rating == 2) { echo 'selected=""'; } ?>>2</option>
							<option value="3" <?php if($diaryEntry->rating == 3) { echo 'selected=""'; } ?>>3</option>
							<option value="4" <?php if($diaryEntry->rating == 4) { echo 'selected=""'; } ?>>4</option>
							<option value="5" <?php if($diaryEntry->rating == 5) { echo 'selected=""'; } ?>>5</option>  
						</select>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Who did you spend your day with?</label>
					    <input class="uk-input" type="text" placeholder="" name="people" value="{{$diaryEntry->people}}" />
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">What are you grateful for?</label>
					    <textarea class="uk-textarea" rows="2" name="grateful">{{$diaryEntry->grateful}}</textarea>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">What could have made your day better?</label>
					    <textarea class="uk-textarea" rows="2" name="improvements">{{$diaryEntry->improvements}}</textarea>
					</div>
					

   					<div class="uk-margin">
						<label class="label-spacing" for="">Main events of your day</label>
					    <textarea class="uk-textarea" rows="3" name="summary">{{$diaryEntry->summary}}</textarea>
					</div>
				
					<div class="uk-margin">
						<label class="label-spacing" for="">What do you aim to accomplish tomorrow?</label>
					    <textarea class="uk-textarea" rows="2" name="tomorrow">{{$diaryEntry->tomorrow}}</textarea>
					</div>

					<div class="uk-margin">
						<label class="label-spacing" for="">Diary entry</label>
					    <textarea class="uk-textarea" rows="20" name="entry">{{$diaryEntry->entry}}</textarea>
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