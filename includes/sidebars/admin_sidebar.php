    <div class="menu-icon">
        <strong> &#9776;</strong>
    </div>
    <header class="header">
        <div class="header_search">Dr.Calender</div>
        <div class="header_avatar dropdown"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></div>
    </header>
    <aside class="aside">
        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">
            <li class="aside_list-item" rel="admin-dash"><a href="./../admin/dashboard.php">Home</a></li>
            <li class="aside_list-item">Doctors
                <ul class="subitem ">

                    <li><a href="./../admin/add-doctor.php" rel="admin-add-doc">Add Doctor</a> </li>
                    <li><a href="./../admin/manage-doctor.php" rel="admin-mang-doc">Manage Doctors</a></li>
                </ul>
            </li>
            <li class="aside_list-item">Speciality
                <ul class="subitem">
                    <li><a href="./../admin/add-speciality.php">Specialization</a></li>
                    <li><a href="./../admin/manage-specialization.php">Manage</a></li>
                </ul>
            </li>
            <li class="aside_list-item">Patients
                <ul class="subitem">
                    <li><a href="./../admin/manage-patient.php">Manage</a></li>
                </ul>
            </li>
            <li class="aside_list-item">Appointments
                <ul class="subitem">
                    <li><a href="./../admin/appointment-history.php">History</a></li>
                </ul>
            </li>
            <li class="aside_list-item">Profile
                <ul class="subitem">
                    <li><a href="./../admin/appointment-history.php">Settings</a></li>
                    <li><a href="./../admin/changepwd.php">Change Password</a></li>
                </ul>
            </li>

            <li class="aside_list-item"><a href="./../admin/logout.php">Logout</a></li>


        </ul>
    </aside>
    <script>
$(document).ready(() => {
    $('.aside_list').on('click', "li", function() {
        //   console.log("hello");
        $(this).children(".subitem").show().end().siblings().find('.subitem').hide();
    });
});
    </script>