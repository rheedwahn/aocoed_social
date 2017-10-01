@foreach ($status->replies as $reply)
	<div class="media" id="ag1">
		<a href="{{ route('profile.index', ['username'=>$reply->user->username]) }}" class="pull-left">
		@if(!$reply->user->profile->profile_image)
			<img src="{{ $reply->user->getAvatarUrl() }}" alt="{{ $reply->user->getNameOrUsername() }}" class="media-object">
		@else
			<img src="{{ asset($reply->user->profile->profile_image) }}" width="70" height="60" alt="{{ $reply->user->getNameOrUsername() }}" class="media-object">
		@endif
		</a>
		<div class="media-body">
			<h5 class="media-heading"><a href="{{ route('profile.index', ['username'=>$reply->user->username]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
			<p>{{ $reply->body }}</p>
			{{-- <div> --}}
			<ul class="list-inline">
				<li>{{ $reply->created_at->diffForHumans() }}</li>
				@if ($reply->user->id !== Auth::user()->id )
					@if(!Auth::user()->hasLikedStatus($reply))
					<li><button type="button" replyId="{{ $reply->id }}" id="likereply">Like <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></button></li>
					@else
					<li><i><button type="button" replyId="{{ $reply->id }}" id="likedreply">Liked <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a></i></li>
					@endif
				@endif
				<li>{{ $reply->likes->count() }} {{ str_plural('like', $reply->likes->count()) }}</li>
			</ul>
			{{-- </div> --}}
		</div>
	</div>
@endforeach