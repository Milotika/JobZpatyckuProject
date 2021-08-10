<aside id="sidebar-content">
    <img src="/img/add.png" alt="Advertisement" class="add-image" />
    @if (Auth::user())
        <div class="profile">
            <div class="profile-avatar">
                <img src="{{url('avatar/'.Auth::user()->avatar)}}" alt="Avatar profile" class="profile-avatar-img" />
            </div>
            <div class="profile-info">
                <ul class="profile-details">
                    <li class="profile-name">
                        <i class="fas fa-user"></i> <a href="{{url('uzytkownik/'.Auth::user()->login)}}">{{Auth::user()->login}}</a>
                    </li>
                    <li class="profile-create-date">
                        <i class="fas fa-calendar-alt"></i> {{Auth::user()->join_date}}
                    </li>
                    <li class="profile-comments">
                        <i class="fas fa-comments"></i>{{Auth::user()->comment_count}}
                    </li>
                </ul>
            </div>

        </div>
        <div class="profile-actions">
            <ul class="profile-settings">
                <li><a href="{{url('uzytkownik/'.Auth::user()->login)}}">Profil</a></li>
                <li><a href="{{url('uzytkownik/ustawienia')}}">Ustawienia</a></li>
            </ul>
        </div>
    @endif
    <div class="popular">
        <h3>Zyskujące popularność</h3>
        <div class="popular-posts">
            <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="trending-post"
                alt="Trending post on page" />
        </div>
        <div class="popular-posts">
            <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="trending-post"
                alt="Trending post on page" />
        </div>
        <div class="popular-posts">
            <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="trending-post"
                alt="Trending post on page" />
        </div>
    </div>
</aside>
