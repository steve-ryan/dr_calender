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
                <li class="aside_list-item">Bookings
                    <ul class="subitem">
                        <li><a class="text-white" href="./../patient/book.php">Book Appointment</a></li>
                        <li><a class="text-white" href="./../patient/appointment-history.php">History</a></li>
                    </ul>
                    <li class="aside_list-item"><a class="text-white" href="./../patient/logout.php">Logout</a></li>
                </li>
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