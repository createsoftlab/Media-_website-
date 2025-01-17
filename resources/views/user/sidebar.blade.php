<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{url('user/dashboard')}}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-newspaper"></i> <span>My Blog Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.myblogPosts') }}">All Blog Posts</a></li>
                        <li><a href="{{ route('user.create.blogpost') }}">Add New Blog Post</a></li>
                        <li><a href="{{ route('user.draft.myblogPosts') }}">Draft Blog Posts</a></li>
                        <li><a href="{{ route('user.bin.blogPost') }}">Blog Post Bin</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-calendar-alt"></i> <span>My Event Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.myEventPosts') }}">All Event Posts</a></li>
                        <li><a href="{{ route('user.draft.myEventPosts') }}">Draft Event Posts</a></li>
                        <li><a href="{{ route('user.bin.eventPost') }}">Bin Event Posts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-comment"></i> <span> Comments</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li>
                            <a href="{{url('user/view_blogComments')}}">Blog Post Comments</a>
                            <a href="{{url('user/view_eventComments')}}">Event Post Comments</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('user.profile') }}"><i class="la la-user"></i> <span> Profile</span></a>
                </li>
                <li>
                    <a href="{{ url('/') }}"><i class="la la-undo"></i> <span> Return Home</span></a>
                </li>
        </div>
    </div>
</div>
