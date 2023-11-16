<div class="media @if (! $loop->last) border-bottom @endif">
  <div class="media-left mr-3">
    <a href="{{ route('users.show', $notification->data['user_id']) }}">
      <img class="img-thumbnail" alt="{{ $notification->data['user_name'] }}"
           src="{{ $notification->data['user_avatar'] }}" style="width:48px; height:48px;">
    </a>
  </div>

  <div class="media-body">
    <div class="media-heading text-secondary">
      <a href="{{ route('users.show', $notification->data['user_id']) }}">
        {{ $notification->data['user_name'] }}
      </a>
      评论了
      <a href="{{ $notification->data['topic_link'] }}">
        {{ $notification->data['topic_title'] }}
      </a>

      {{-- Hồi đáp (rep tin nhắn) / Xoá / Nút ấn --}}
      <span class="pull-right" title="{{ $notification->created_at }}">
        <i class="fa fa-clock"></i> {{ $notification->created_at->diffForHumans() }}
      </span>
    </div>
    <div class="reply-content">
      {!! $notification->data['reply_content'] !!}
    </div>
  </div>
</div>
<hr>
