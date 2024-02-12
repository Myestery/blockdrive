<div class="sidebar__menu-group">
    <ul class="sidebar_nav">

        <li>
            <a href="/files" class="{{ Request::is('/files') ? 'active':'' }}">
                <span class="nav-icon uil uil-repeat"></span>
                <span class="menu-text">
                    Files
                </span>
            </a>
        </li>

        <li>
            <a href="/shared" class="{{ Request::is('/shared') ? 'active':'' }}">
                <span class="nav-icon uil uil-repeat"></span>
                <span class="menu-text">
                    Shared Files
                </span>
            </a>
        </li>

        <li>
            <a href="#" id="logoutbtn">
                <span class="nav-icon uil uil-lock"></span>
                <span class="menu-text">
                    Logout
                </span>
            </a>
        </li>
    </ul>
</div>
