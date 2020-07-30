    <div class="menu-icon">
        <strong> &#9776;</strong>
    </div>
    <header class="header">
        <div class="header_search">Dr.Calender</div>
        <div class="header_avatar dropdown">
            <button class="btn dropdown-toggle" type="button">settings</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>
    </header>
    <aside class="aside ">

        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">
            <li class="aside_list-item">Appointment
                <ul class="subitem">
                <li><a class="text-white" href="./../admin/#">Today's appointment</a></li>
                    <li><a class="text-white" href="./../admin/#">Manage</a></li>
                    <li><a class="text-white" href="./../admin/#">History</a></li>
                </ul>
            </li>
            <li class="aside_list-item">Schedule timings</li>
            <li class="aside_list-item">Profile setting</li>
            <li class="aside_list-item"><a class="text-white" href="./../doctor/changepwd.phpclass="text-white" ">Change password</a></li>

            <li class="aside_list-item">Logout</li>
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