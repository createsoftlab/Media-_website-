<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li >
                    <a href="{{url('admin/dashboard')}}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-newspaper"></i> <span>Blog Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.allblogPosts')}}">All Blog Posts</a></li>
                        <li><a href="{{ route('admin.myblogPosts')}}">My Blog Posts</a></li>
                        <li><a href="{{ route('create.post') }}">Add New Blog Post</a></li>
                        <li><a href="{{ route('admin.draft.myblogPosts') }}">My Drafts</a></li>
                        <li><a href="{{ route('admin.bin.blogPost') }}">Blog Post Bin</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-calendar-alt"></i> <span>Event Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('view.events') }}">Ongoing Events</a></li>
                        <li><a href="{{ route('view.inactive.events') }}">Offline Events</a></li>
                        <li><a href="{{ route('view.liveevents') }}">Live Events</a></li>
                        <li><a href="{{ route('admin.eventPosts') }}">All Event Posts</a></li>
                        <li><a href="{{ route('admin.bin.eventPost') }}">Bin Event Posts</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('view.categories')}}"><i class="la la-layer-group"></i> <span> Categories</span></a>
                </li>
                <li>
                    <a href="{{ route('view.tags') }}"><i class="la la-tag"></i> <span> Tag</span></a>
                </li>
                <li>
                    <a href="{{ route('view.gallery') }}"><i class="la la-image"></i> <span> Gallery</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-comment"></i> <span> Comments</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li>
                            <a href="{{url('admin/view_comment')}}">Blog Post Comments</a>
                            {{-- <a href="{{url('admin/view_Event_comment')}}">Event Post Comments</a> --}}
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('view.users') }}"><i class="la la-user-shield"></i> <span> Users</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.profile') }}"><i class="la la-user-circle"></i> <span> Profile</span></a>
                </li>
                <li>
                    <a href="{{ url('/') }}"><i class="la la-undo"></i> <span> Return Home</span></a>
                </li>
        </div>
    </div>
</div>
