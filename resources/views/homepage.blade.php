@extends('layouts.app')

@section('content')

<div class="uk-section">
    <div class="uk-container uk-container-expand">

        <div class="uk-card uk-card-body uk-width-1-2@m uk-align-center">
            <h1 class="uk-heading-primary uk-text-center">Diary Planner</h1>
            <p class="uk-text-center">Your own online diary planner. Features the ability to record diary posts, track financial statements, log notes and much more!</p>
			
			<div class="uk-text-center uk-margin-medium-top">
				@if (Auth::id())
					<a class="uk-button uk-button-primary" href="/dashboard">View Dashboard</a>
				@else
					<a class="uk-button uk-button-primary" href="/login">Login</a>
					<a class="uk-button uk-button-default" href="/register">Register</a>
				@endif
			</div>
			

        </div>

    </div>
</div>

@endsection
