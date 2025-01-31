
<html>

<head>
        <title>Moleskine Notebook with jQuery Booklet</title>

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">



 <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script src="booklet/jquery.easing.1.3.js" type="text/javascript"></script>
		<script src="booklet/jquery.booklet.1.1.0.min.js" type="text/javascript"></script>

		<link href="booklet/jquery.booklet.1.1.0.css" type="text/css" rel="stylesheet" media="screen" />


		 <style>

              *{
	margin:0;
	padding:0;
}
body{
	background:#eba426;
	color:#444;
	font-size:12px;
	color: #333;
    font-family: 'Oswald', sans-serif;
}


.booklet           {
	width:900px;
	height:607px;
	position:relative;
	margin:0 auto 10px;
	-moz-box-shadow:0px 0px 1px #fff;
	-webkit-box-shadow:0px 0px 1px #fff;
	box-shadow:0px 0px 1px #fff;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
}
.booklet .b-wrap-left  {
	background:#fff url(images/left_bg.jpg) no-repeat top left;
	-webkit-border-top-left-radius: 10px;
	-webkit-border-bottom-left-radius: 10px;
	-moz-border-radius-topleft:10px;
	-moz-border-radius-bottomleft: 10px;
	border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
}
.booklet .b-wrap-right {
	background:#efefef url(images/right_bg.jpg) no-repeat top left;
	-webkit-border-top-right-radius: 10px;
	-webkit-border-bottom-right-radius: 10px;
	-moz-border-radius-topright: 10px;
	-moz-border-radius-bottomright: 10px;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
}
.booklet .b-counter {
	bottom:10px;
	position:absolute;
	display:block;
	width:90%;
	height:20px;
	border-top:1px solid #ddd;
	color:#222;
	text-align:center;
	font-size:12px;
	padding:5px 0 0;
	background:transparent;
	-moz-box-shadow:0px -1px 1px #fff;
	-webkit-box-shadow:0px -1px 1px #fff;
	box-shadow:0px -1px 1px #fff;
	opacity:0.8;
}
.book_wrapper{
	margin:0 auto;
	padding-top:50px;
	width:905px;
	height:540px;
	position:relative;
	background:transparent url(images/bg.png) no-repeat 9px 27px;
}
.book_wrapper h1{
	color:orange;
	margin:5px 5px 5px 15px;
	font-size:24px;
	background:transparent url(images/h1.png) no-repeat bottom left;
	padding-bottom:7px;
    text-transform: uppercase;
    font-weight: normal;
}
.book_wrapper p{
	font-size:15px;
	margin:5px 5px 5px 15px;
}
.book_wrapper a.article,
.book_wrapper a.demo{
	background:transparent url(images/circle.png) no-repeat 50% 0px;
	display:block;
	width:95px;
	height:41px;
	text-decoration:none;
	outline:none;
	font-size:16px;
	color:#555;
	float:left;
	line-height:41px;
	padding-left:47px;
}
.book_wrapper a.demo{
	margin-left:50px;
}
.book_wrapper a.article:hover,
.book_wrapper a.demo:hover{
	background-position:50% -41px;
	color:#13386a;
}
.book_wrapper img{
	margin:10px 0px 5px 35px;
	width:300px;
	padding:4px;
	border:1px solid #ddd;
	-moz-box-shadow:1px 1px 1px #fff;
	-webkit-box-shadow:1px 1px 1px #fff;
	box-shadow:1px 1px 1px #fff;
}
.booklet .b-wrap-right img{
	border:1px solid #E6E3C2;
}
a#next_page_button,
a#prev_page_button{
	display:none;
	position:absolute;
	width:41px;
	height:40px;
	cursor:pointer;
	margin-top:-20px;
	top:50%;
	background:transparent url(images/buttons.png) no-repeat 0px -40px;
}
a#prev_page_button{
	left:-30px;
}
a#next_page_button{
	right:-30px;
	background-position:-41px -40px;
}
a#next_page_button:hover{
	background-position:-41px 0px;
}
a#prev_page_button:hover{
	background-position:0px 0px;
}



         </style>

    </head>
    <body>
    <br><br><br><br><br>

		<div class="book_wrapper">
			<a id="next_page_button"></a>
			<a id="prev_page_button"></a>

			<div id="mybook" style="display:none;">
				<div class="b-load">
					<div>
						<img src="{{asset('assets/images/1.jpg')}}" alt=""/>
						<h1>Slider Gallery</h1>
						<p>This tutorial is about creating a creative gallery with a
							slider for the thumbnails. The idea is to have an expanding
							thumbnails area which opens once an album is chosen.
							The thumbnails will scroll to the end and move back to
							the first image. The user can scroll through the thumbnails
							by using the slider controls. When a thumbnail is clicked,
							it moves to the center and the full image preview opens.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/2.jpg')}}" alt="" />
						<h1>Animated Portfolio Gallery</h1>
						<p>Today we will create an animated portfolio gallery with jQuery.
							The gallery will contain a scroller for thumbnails and a
							content area where we will display details about the portfolio
							item. The image can be enlarged by clicking on it, making
							it appear as an overlay.</p>
						<a href="" target="_blank" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/3.jpg')}}" alt="" />
						<h1>Annotation Overlay Effect</h1>
						<p>Today we will create a simple overlay effect to display annotations in e.g. portfolio
							items of a web designers portfolio. We got the idea from the wonderful
							portfolio of www.rareview.com where Flash is used to create the
							effect. We will use jQuery.</p>
						<a href="" target="_blank" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/4.jpg')}}" alt="" />
						<h1>Bubbleriffic Image Gallery</h1>
						<p>In this tutorial we will create a bubbly image gallery that
							shows your images in a unique way. The idea is to show the
							thumbnails of albums in a rounded fashion allowing the
							user to scroll them automatically by moving the mouse.
							Clicking on a thumbnail will zoom in a big circle and
							the full image which will be automatically resized to
							fit into the screen.</p>
						<a href="" target="_blank" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/5.jpg')}}" alt="" />
						<h1>Collapsing Site Navigation</h1>
						<p>Today we will create a collapsing menu that contains vertical
							navigation bars and a slide out content area. When hovering
							over a menu item, an image slides down from the top and a
							submenu slides up from the bottom. Clicking on one of the
							submenu items will make the whole menu collapse like a card
							deck and the respective content area will slide out.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/6.jpg')}}" alt="" />
						<h1>Custom Animation Banner</h1>
						<p>In today’s tutorial we will be creating a custom animation banner with jQuery.
							The idea is to have different elements in a banner that will
							animate step-wise in a custom way.</p>
						<p>We will be using the jQuery Easing Plugin and the jQuery 2D
							Transform Plugin to create some nifty animations.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/7.jpg')}}" alt="" />
						<h1>Full Page Image Gallery</h1>
						<p>In this tutorial we are going to create a stunning full page
							gallery with scrollable thumbnails and a scrollable full
							screen preview. The idea is to have a thumbnails bar at
							the bottom of the page that scrolls automatically when
							the user moves the mouse. When a thumbnail is clicked,
							it moves to the center of the page and the full screen
							image is loaded in the background.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/8.jpg')}}" alt="" />
						<h1>Hover Slide Effect</h1>
						<p>Today we will create a neat effect with some images using
							jQuery. The main idea is to have an image area with several
							images that slide out when we hover over them, revealing
							other images. The sliding effect will be random, i.e.
							the images will slide to the top or bottom, left or
							right, fading out or not. When we click on any area,
							all areas will slide their images out.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/9.jpg')}}" alt="" />
						<h1>Merging Image Boxes</h1>
						<p>Today we will show you a nice effect for images with jQuery.
							The idea is to have a set of rotated thumbnails that,
							once clicked, animate to form the selected image.
							You can navigate through the images with previous
							and next buttons and when the big image gets clicked
							it will scatter into the little box shaped thumbnails again.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/10.jpg')}}" alt="" />
						<h1>Compact News Previewer</h1>
						<p>Today we will create a news previewer that let’s you
							show your latest articles or news in a compact way.
							The news previewer will show some list of articles
							on the left side and the preview of the article with a
							longer description on the right. Once a news on the left
							is clicked, the preview will slide in.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="{{asset('assets/images/11.jpg')}}" alt="" />
						<h1>Overlay Effect Menu</h1>
						<p>In this tutorial we are going to create a simple menu
							that will stand out once we hover over it by covering
							everything except the menu with a dark overlay.
							The menu will stay white and a submenu area will
							expand. We will create this effect using jQuery.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="images/12.jpg" alt="" />
						<h1>Polaroid Photobar Gallery</h1>
						<p>In this tutorial we are going to create an image gallery
							with a Polaroid look. We will have albums that will expand
							to sets of slightly rotated thumbnails that pop out on hover.
							The full image will slide in from the bottom once a thumbnail
							is clicked. In the full image view the user can navigate
							through the pictures or simply choose another thumbnail
							to be displayed.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="images/13.jpg" alt="" />
						<h1>Pull Out Content Panel</h1>
						<p>In this tutorial we will create a content panel that
							slides out at a predefined scroll position. It will
							reveal a teaser with related content and it can be
							expanded to full page size to show more. A custom
							slider allows to scroll through many items in the
							panel.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
					<div>
						<img src="images/14.jpg" alt="" />
						<h1>Thumbnails Navigation Gallery</h1>
						<p>In this tutorial we are going to create an extraordinary
							gallery with scrollable thumbnails that slide out from a
							navigation. We are going to use jQuery and some CSS3
							properties for the style. The main idea is to have a
							menu of albums where each item will reveal a horizontal
							bar with thumbnails when clicked.</p>
						<a href="" class="article">ARTICLE</a>
						<a href="" class="demo">DEMO</a>
					</div>
				</div>
			</div>
		</div>

        <script type="text/javascript">
			$(function() {
				var $mybook 		= $('#mybook');
				var $bttn_next		= $('#next_page_button');
				var $bttn_prev		= $('#prev_page_button');
				var $loading		= $('#loading');
				var $mybook_images	= $mybook.find('img');
				var cnt_images		= $mybook_images.length;
				var loaded			= 0;

				$mybook_images.each(function(){
					var $img 	= $(this);
					var source	= $img.attr('src');
					$('<img/>').load(function(){
						++loaded;
						if(loaded == cnt_images){
							$loading.hide();
							$bttn_next.show();
							$bttn_prev.show();
							$mybook.show().booklet({
								name:               null,                            //
								width:              800,                             //
								height:             500,                             //
								speed:              600,                             //
								direction:          'LTR',                           //
								                           //
								next:               $bttn_next,          			//
								prev:               $bttn_prev,          			//

							});
							Cufon.refresh();
						}
					}).attr('src',source);
				});

			});
        </script>

    </body>

</html>
