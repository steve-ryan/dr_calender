    <div class="menu-icon">
        <strong> &#9776;</strong>
    </div>
    <header class="header">
        <div class="header_search text-success"><?php echo 'Welcome '.$_SESSION['pname'].'!';?></div>
        <div class="header_avatar dropdown "><a href="./logout.php" class="nav-link logout text-danger"> <span
                    class="d-none d-sm-inline confirmation">Logout</span><i class="fa fa-sign-out"></i></a></div>
    </header>
    <aside class="aside ">

        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">
            <li class="aside_list-item"><a class="text-white" href="./../patient/dashboard.php">Home</a></li>
            <li class="aside_list-item"><a class="text-white" href="./../patient/book.php">Book</a></li>
                        <li class="aside_list-item"><a class="text-white text-decoration-none"  href="./../patient/changepwd.php">Password settings</a></li>
            <li class="aside_list-item"><a class="text-white confirmation" href="./../patient/logout.php">Logout</a></li>
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