<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">movie</i>
                </div>
                <p class="card-category">{{\App\Models\Video::count()}}</p>
                <h3 class="card-title">Videos
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('videos.index')}}" class="warning-link">All Videos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <p class="card-category">{{\App\Models\User::count()}}</p>
                <h3 class="card-title">Users</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('users.index')}}" class="warning-link">All Users</a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">calendar_view_day</i>
                </div>
                <p class="card-category">{{\App\Models\Skill::count()}}</p>
                <h3 class="card-title">Skills</h3>

            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('skills.index')}}" class="warning-link">All Skills</a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">chat_bubble</i>

                </div>
                <p class="card-category">{{\App\Models\Comments::count()}}</p>
                <h3 class="card-title">Comments</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('videos.index')}}" class="warning-link">All Videos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">message</i>

                </div>
                <p class="card-category">{{\App\Models\Message::count()}}</p>
                <h3 class="card-title">Messages</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('messages.index')}}" class="warning-link">All Message</a>
                </div>
            </div>
        </div>
    </div>

</div>