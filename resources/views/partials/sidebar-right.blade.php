<!-- Sidebar-right -->
<div class="sidebar sidebar-right sidebar-animate">
    <div class="panel panel-primary card mb-0">
        <div class="panel-body tabs-menu-body p-0 border-0">
            <ul class="Date-time">
                <li class="time">
                    <h1 class="animated ">21:00</h1>
                    <p class="animated ">Sat, October 1st 2029</p>
                </li>
            </ul>
            <div class="card-body border-top border-bottom">
                <div class="row">
                    <div class="col-4 text-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#inboxModal">
                            <i class="dropdown-icon mdi mdi-message-outline fs-20 m-0 leading-tight"></i>
                        </a>
                        <div>Inbox</div>
                    </div>
                    <div class="col-4 text-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">
                            <i class="dropdown-icon mdi mdi-tune fs-20 m-0 leading-tight"></i>
                        </a>
                        <div>Settings</div>
                    </div>
                    <div class="col-4 text-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="dropdown-icon mdi mdi-logout-variant fs-20 m-0 leading-tight"></i>
                        </a>
                        <div>Sign out</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Sidebar-right -->
@include('partials.modals.modal-notification')