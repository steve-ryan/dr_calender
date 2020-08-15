    <div class="menu-icon">
        <strong> &#9776;</strong>
    </div>
    <header class="header">
        <div class="header_search text-danger"><?php echo 'Welcome '.$_SESSION['drname'].'!';?></div>
        <div class="header_avatar dropdown"><a href="./logout.php" class="nav-link logout"> <span
                    class="d-none d-sm-inline confirmation">Logout</span><i class="fa fa-sign-out"></i></a></div>
    </header>
    <aside class="aside ">

        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">

            <li class="aside_list-item"><a class="text-white" href="./../doctor/dashboard.php">Home</a></li>
            <li class="aside_list-item"><a class="text-white" href="./../doctor/manageapp.php">Manage</a></li>
            <li class="aside_list-item"><a class="text-white confirmation" href="./../doctor/logout.php">Logout</a></li>
        </ul>
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
    <script type="text/javascript">
$('.confirmation').on('click', function() {
    return confirm('Are you sure to logout?');
});
    </script>