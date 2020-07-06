<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
       <nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="#">YourLogo</a>
        </div>
        <div class="main_list" id="mainListDiv">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Client</a></li>
                <li><a href="#">Staff Login</a></li>
            </ul>
        </div>
        <div class="media_button">
            <button class="main_media_button" id="mediaButton">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>

<div class="slider">
		<ul>
			<li>one</li>
			<li>two</li>
			<li>three</li>
			<li>four</li>
			<li>five</li>
			<li>six</li>
			<li>seven</li>
		</ul>
	</d>
	<div class="sliderControl"></div>
	<div class="timer">
		<div class="percentage">
			<div class="percentage0"></div>
			<div class="percentage1"></div>
			<div class="percentage2"></div>
			<div class="percentage3"></div>
			<div class="percentage4"></div>
		</div>
  </div>
    
<section class="home"></section>
        
        <script src="function.js" async defer></script>
        <script src="./../assets/js/jquery.js">
               $(document).ready(function(){
        // Show hide popover
        $(".dropdown").click(function(){
            $(this).find(".dropdown-menu").slideToggle("fast");
        });
    });
    $(document).on("click", function(event){
        var $trigger = $(".dropdown");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".dropdown-menu").slideUp("fast");
        }            
    });
        </script>
    </body>
</html>