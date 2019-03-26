@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">

    	<div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center">
    		<ul class="uk-breadcrumb">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/diary">Diary</a></li>
                @if ( $diaryEntry->title )
                	<li><span>{{ ucwords( $diaryEntry->title ) }}</span></li>
				@else
                	<li><span>{{ $diaryEntry->date }}</span></li>
				@endif
            </ul>
        </div>

        <div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center uk-card uk-card-default uk-padding">

           
				<fieldset class="uk-fieldset">
					
					@if ( $diaryEntry->title )
					<div class="uk-margin">
						<h2>{{ $diaryEntry->title }}</h2>
					</div>
					@endif

					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Date</label>
					    <p class="uk-margin-remove">{{ $diaryEntry->date }}</p>
					</div>

					@if ( trim($diaryEntry->tags) )
					<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
						<label class="uk-width-1 label-spacing uk-text-muted" for="">Tags</label>

						<div class="uk-margin-remove">
							<?php if (strpos($diaryEntry->tags, 'Favourite') !== false) { echo '<span class="uk-badge uk-padding-small">Favourite</span>'; } ?>
							<?php if (strpos($diaryEntry->tags, 'Social') !== false) { echo '<span class="uk-badge uk-padding-small">Social</span>'; } ?>
							<?php if (strpos($diaryEntry->tags, 'Productive') !== false) { echo '<span class="uk-badge uk-padding-small">Productive</span>'; } ?>
						</div>
					</div>
					@endif

					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">How was your day?</label>

					    <select id="star-rating" class="uk-select" name="rating">
					        <option value="1" <?php if($diaryEntry->rating == 1) { echo 'selected=""'; } ?>>1</option>
							<option value="2" <?php if($diaryEntry->rating == 2) { echo 'selected=""'; } ?>>2</option>
							<option value="3" <?php if($diaryEntry->rating == 3) { echo 'selected=""'; } ?>>3</option>
							<option value="4" <?php if($diaryEntry->rating == 4) { echo 'selected=""'; } ?>>4</option>
							<option value="5" <?php if($diaryEntry->rating == 5) { echo 'selected=""'; } ?>>5</option>  
						</select>
					</div>

					@if ( $diaryEntry->people )
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Who did you spend your day with?</label>
						<p class="uk-margin-remove">{{ $diaryEntry->people }}</p>
					</div>
					@endif

					@if ( $diaryEntry->grateful )
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">What are you grateful for?</label>
						<p class="uk-margin-remove">{!! nl2br($diaryEntry->grateful) !!}</p>
					</div>
					@endif

					@if ( $diaryEntry->improvements )
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">What could have made your day better?</label>
						<p class="uk-margin-remove">{!! nl2br($diaryEntry->improvements) !!}</p>
					</div>
					@endif

					@if ( $diaryEntry->summary )
   					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Main events of your day</label>
						<p class="uk-margin-remove">{!! nl2br($diaryEntry->summary) !!}</p>
					</div>
					@endif

					@if ( $diaryEntry->tomorrow )
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">What do you aim to accomplish tomorrow?</label>
						<p class="uk-margin-remove">{!! nl2br($diaryEntry->tomorrow) !!}</p>
					</div>
					@endif
				
					@if ( $diaryEntry->entry )
					<div class="uk-margin">
						<label class="label-spacing uk-text-muted" for="">Diary entry</label>
						<p class="uk-margin-remove">{!! nl2br($diaryEntry->entry) !!}</p>
					</div>
					@endif

					<div class="uk-margin uk-margin-large-top">
						<div class="uk-button-group uk-width-1-1">
						    <a href="/diary/{{$diaryEntry->id}}/edit" class="uk-button uk-button-default uk-button-large uk-width-1-1">Edit</a>
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
            <a href="/diary/{{$diaryEntry->id}}/destroy" class="uk-button uk-button-danger" type="button">Delete</a>
        </p>
    </div>
</div>


<!-- init dateDropper -->
<script>
$('input.datepicker').dateDropper();



</script>


<script type="text/javascript">
  $(function() {
    $('#star-rating').barrating({
      theme: 'css-stars',
      readonly: true,
      hoverState: false,
    });
  });
</script>

@endsection