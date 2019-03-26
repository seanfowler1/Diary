@extends('layouts.app')


@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">

        <div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center">
            <ul class="uk-breadcrumb">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/diary">Diary</a></li>
                <li><span>Search</span></li>
            </ul>
        </div>

        <div class="uk-margin uk-width-1-2@m uk-width-3-4@s uk-align-center uk-card uk-card-default uk-padding">

           <form action="/diary/search/results" method="POST">
                @csrf
                <fieldset class="uk-fieldset">

            
                    <legend class="uk-legend">Search For Diary Entry</legend>

                    <div class="uk-margin">
                        <label class="label-spacing" for="">Title</label>
                        <input class="uk-input" type="text" placeholder="" name="title" />
                    </div>

                    <div class="uk-margin">
                        <label class="label-spacing" for="">Date</label>
                        <input class="uk-input datepicker" type="text" data-init-set="false" data-format="d/m/Y" data-large-mode="true" data-large-default="true" data-modal="true" data-theme="datepicker" name="date" />
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
                            <option value=""></option>
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
                        <label class="label-spacing" for="">Diary entry</label>
                        <input class="uk-input" type="text" placeholder="" name="entry" />
                    </div>

                    <div class="uk-margin uk-margin-large-top">
                        <button class="uk-button uk-button-primary uk-button-large uk-width-1-1">Search</button>
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
      theme: 'css-stars',
      allowEmpty: true,
      emptyValue: null,
      initialRating: '0'
    });
  });

    $('#star-rating').barrating('clear');
</script>

@endsection