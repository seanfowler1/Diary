@extends('layouts.app')

@section('content')


<div class="uk-section">
    <div class="uk-container uk-container-expand">


        <div class="uk-margin-large uk uk-width-1-2@m uk-align-center">
		
			<!-- Afternoon Evening -->

			<?php 
				// GOES IN CONTROLLER

		    $time = date('H');
		    /* Set the $timezone variable to become the current timezone */
		    $timezone = date('e');

		    if ($time >= '6' && $time < '12') {
		        $greeting = 'Good morning ' . Auth::user()->name . '!';
		    }
		    else if ($time >= '12' && $time < '17') {
		        $greeting = 'Good afternoon ' . Auth::user()->name . '!';
		    }
		    else if ($time >= '17' && $time < '19') {
		        $greeting = 'Good evening ' . Auth::user()->name . '!';
		    } 
		    else if ($time >= '19' || $time < '1') {
		        $greeting = 'Good night ' . Auth::user()->name . '!';
		    }
		    else {
		        $greeting = 'What are you thinking ' . Auth::user()->name . '? Get some sleep!';
		    }


				$randomQuote = rand(0,101);
				$response = file_get_contents('https://gist.githubusercontent.com/nasrulhazim/54b659e43b1035215cd0ba1d4577ee80/raw/e3c6895ce42069f0ee7e991229064f167fe8ccdc/quotes.json');
				$response = json_decode($response);

				$quoteMessage = $response->quotes[$randomQuote]->quote;
				$quoteAuthor = $response->quotes[$randomQuote]->author;

			 ?>

			<h2 class="uk-text-center">{{ucwords($greeting)}}</h2>

			 <blockquote class="uk-text-center uk-margin-large">
			    <p class="uk-margin-small-bottom uk-text-small">{{$quoteMessage}}</p>
			    <footer>{{$quoteAuthor}}</footer>
			</blockquote>

		</div>


        <div class="uk-margin-large uk uk-width-3-4@m uk-align-center uk-card uk-card-default uk-padding">

        	
    		<div class="uk-grid-match uk-grid-collapse uk-flex-center uk-text-center" uk-grid>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="#" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-address-book"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Address Book</h5>
					</a>
			    </div>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="#" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-calendar-alt"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Calendar</h5>
					</a>
			    </div>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="/diary" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-book"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Diary</h5>
					</a>
			    </div>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="#" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-money-bill-alt"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Finances</h5>
					</a>
			    </div>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="#" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-redo-alt"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Habits</h5>
					</a>
			    </div>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="#" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-sticky-note"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Notepad</h5>
					</a>
			    </div>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="#" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-bullseye"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Objectives</h5>
					</a>
			    </div>

			    <div class="uk-width-1-4@m uk-width-1-2@s border-card">
					<a href="#" class="link-reset uk-padding">
				    	<i class="fas fa-2x fa-chart-pie"></i>
				    	<h5 class="uk-margin uk-margin-remove-bottom">Statistics</h5>
					</a>
			    </div>

			</div>
			

    	</div>

    </div>
</div>

@endsection
