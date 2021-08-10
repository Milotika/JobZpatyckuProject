<article class="comment">
  <div class="comment-header">
      <div class="comment-wrapper">
          <div class="comment-avatar">
              <img src="{{ url('avatar/' . $comment->user->avatar) }}" alt="User avatar">
          </div>
          <div class="comment-details">
              <a
                  href="{{ url('uzytkownik/' . $comment->user->login) }}">{{ $comment->user->login }}</a>
              <span class="comment-time">{{ $comment->interval }}</span>
          </div>
      </div>
      <div class="comment-stats">
          @auth
              <form action="/{{ $comment->meme_id }}/vote/{{ $comment->id }}" method="POST">
                  @csrf
                  @if ($comment->vote == 'vote_up')
                      <button class="button-plus-vote fa-sm active-plus" name="vote" type="submit"
                          value="vote_up">
                          <i class="fas fa-plus"></i>
                      </button>
                      <span class="comment-votes ">{{ $comment->vote_count }}</span>
                      <button class="button-minus-vote" name="vote" type="submit" value="vote_down">
                          <i class="fas fa-minus fa-sm "></i>
                      </button>
                  @endif
                  @if ($comment->vote == 'vote_down')
                      <button class="button-plus-vote fa-sm" name="vote" type="submit"
                          value="vote_up">
                          <i class="fas fa-plus"></i>
                      </button>
                      <span class="comment-votes ">{{ $comment->vote_count }}</span>
                      <button class="button-minus-vote active-minus" name="vote" type="submit"
                          value="vote_down">
                          <i class="fas fa-minus fa-sm "></i>
                      </button>
                  @endif
                  @if ($comment->vote == null)
                      <button class="button-plus-vote fa-sm" name="vote" type="submit"
                          value="vote_up">
                          <i class="fas fa-plus"></i>
                      </button>
                      <span class="comment-votes ">{{ $comment->vote_count }}</span>
                      <button class="button-minus-vote" name="vote" type="submit" value="vote_down">
                          <i class="fas fa-minus fa-sm "></i>
                      </button>
                  @endif
              </form>

          @endauth
      </div>
  </div>
  <div class="comment-content">
      <p class="comment-text my-1">{{ $comment->text }}</p>
  </div>
  <div class="comment-actions">
      <a href="#" class="comment-reply">
          <span><i class="fas fa-reply"></i> Odpowiedź</span>
      </a>
      <a href="#" class="comment-report"><span><i class="far fa-flag"></i> Zgłoś</span></a>
  </div>
</article>