<!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<title>Your page title here :)</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  
	
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/skeleton.css">
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/devices.css">
		<link rel="stylesheet" href="css/responsivness.css">
		<link rel="stylesheet" href="css/fullpage.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<link rel="icon" type="image/png" href="images/favicon.png">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="js/jquery.fullPage.min.js"></script>

	</head>
	<body>
		<div id="toggle">
			<i class="fa fa-bars fa-2x"></i>
		</div>
		
		<div class="menu closed">
			<div id="mobilelogo" class="only-mobile">
				<h4>prvaVz.com.hr</h4>
				<div class="u-cf"></div>
			</div>
			<div id="userbar">
				<div>
					<div id="avatar" style="background: url(http://lorempixel.com/50/50);">
						<i class="fa fa-lock fa-2x"></i>
					</div>
					<h5 id="username">Username</h5>
				</div>
				<div id="usermenu">
					<a href="#"></a>
				</div>
			</div>	
			
			<ul>
				<li>
					<a href="#"><i class="fa fa-home"></i> Naslovnica</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-commenting"></i> Forum</a>
					<span>Rasprave o aktualnim temama</span>
				</li>
				<li>
					<a href="#"><i class="fa fa-calendar"></i> Raspored sati</a>
					<span>Interaktivan raspored sati</span>
				</li>
				<li>
					<a href="#"><i class="fa fa-users"></i> Upisi</a>
					<span>Sve informacije o školi, profesorima, predmetima i zahtjevima</span>
				</li>
				<li>
					<a href="#"><i class="fa fa-info-circle"></i> O projektu</a>
					<span>O projektu prvaVz</span>
				</li>
			</ul>
			<p>
				&copy;1636 - 2015 Prva gimnazija Varaždin
			</p>
			<p>
				Author: Filip Meštrić
			</p>
		</div>
			<div id="topbar" class="tablet">
				<div id="header" class="container">
					<div class="row">
						<div id="logo">
							<div id="banner">
								<img src="images/logo_small.png" />
								<h4 class="tablet">prvaVz</h4>
							</div>	
						</div>
					
						<div id="slider">
							<h4 id="title">Article title goes here</h4>
						</div>
						
						
						<div class="u-cf"></div>
					</div>
				</div>
			</div>
			
			<div id="fullpage">
				<div data-anchor="landing" class="container section">
					Naslovna
				</div>
				
				<div data-anchor="features" class="container section">
					
					<div class="slide">
						<div class="article_text">
							<pre><? include ("loremipsum.txt"); ?></pre>
						</div>
						<div class="row">
							<div class="six columns">
								Posted by prvaBot
							</div>
							<div class="six columns">
								<button class="comments button-primary" type="button">
									11 <i class="fa fa-comment"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="slide">
						<h3>Comments: Novost 123</h3>
						<div class="article_text">
							<div class="row forum thread">
								<div class="ten columns thread text">
									<div>
										Check out latest news from prvaVz
									</div>
								</div>
								<div class="two columns thread author">
									<img src="http://lorempixel.com/50/50" />
									<h5>prvaBot</h5>
								</div>
							</div>
							<div class="comment otheruser">
								<div class="forum avatar">
									<img src="http://lorempixel.com/50/50" />
									Filip
								</div>
								<div class="forum post">
									<div class="commentbox">
										<p><? include ("loremipsum.txt"); ?></p>
										<span class="readmore">Read More</span>
									</div>
								</div>
								<div class="u-cf"></div>
							</div>
							<div class="u-cf"></div>
							
							<div class="comment self">
								<div class="forum avatar">
									<img src="http://lorempixel.com/50/50" />
								</div>
								<div class="forum post">
									<div class="commentbox">
										<p>Comment goes here</p>
										<span class="readmore">Read More</span>
									</div>
								</div>
								<div class="u-cf"></div>
							</div>
							<div class="u-cf"></div>
							
							<div class="comment otheruser">
								<div class="forum avatar">
									<img src="http://lorempixel.com/50/50" />
								</div>
								<div class="forum post">
									<div class="commentbox">
										<p>Comment goes here</p>
										<span class="readmore">Read More</span>
									</div>
								</div>
								<div class="u-cf"></div>
							</div>
							<div class="u-cf"></div>
						</div>
					</div>
				</div>
				
				<div data-anchor="dashboard" class="container section">
				
				</div>
				
				<div data-anchor="editor" class="container section">
				
				</div>
			</div>
		<script>
			$(document).ready(function() {
				var mobile = false;
				var container = false;
				if((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )) mobile = true 
			
				function toggleMenu() {
					$(".menu, .content, #wrapper, #toggle").toggleClass("closed");
				}
				
				function openMenu() {
					$(".menu, .content, #wrapper").removeClass("closed");
					$('#toggle').addClass("closed");
				}
				
				function closeMenu() {
					$(".menu, .content, #wrapper").addClass("closed");
					$('#toggle').removeClass("closed");
				}
				
				function trimComment(comment) {
					if($(comment).outerHeight(true) > 100) {
						$(comment).addClass('trimmed');
						container = comment;
					}
				}
				
				// if( !(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )) {
					$('#fullpage').fullpage({
						paddingTop: (mobile) ? '30px' : '180px',
						loopHorizontal: false,
						controlArrows: false,
						continuousVertical: false,
						onLeave: function (index, target) {
							//getting the section by the index
							var section = $('.section:eq(' + (target - 1) + ')');

							$.fn.fullpage.moveTo(section, 0);
							
						}
					});
				// }
				
				// else {
					$(".menu").on('swipeleft', toggleMenu);
					$('body')
						.on('swiperight', openMenu)
						.on('swipeleft', closeMenu);
				// }
				
				$('.comments').click(function() {
					$.fn.fullpage.moveSlideRight();
				});
				
				$("#toggle").on('click', toggleMenu);	
				
				$('.article_text').on('mousewheel touchmove', function(e) {
					e.stopPropagation();
				});
				
				$('.commentbox').each(function() {
					trimComment($(this));
				});
				
				$('.commentbox').dblclick(function() {
					trimComment($(this));
				});
				
				$(document).mouseup(function(e) {
					if (!container.is(e.target) && container.has(e.target).length === 0) {
						trimComment(container);
					}
				});
				
				
				$('.readmore').click(function() {
					$(this).parents('.commentbox').removeClass('trimmed');
				});
				
				$('.article_text').bind('scroll', function() {
					var scrollPosition = $(this).scrollTop() + $(this).outerHeight();
					var divTotalHeight = $(this)[0].scrollHeight 
                          + parseInt($(this).css('padding-top'), 10) 
                          + parseInt($(this).css('padding-bottom'), 10)
                          + parseInt($(this).css('border-top-width'), 10)
                          + parseInt($(this).css('border-bottom-width'), 10);

					if( scrollPosition == divTotalHeight ) {
						$.fn.fullpage.moveSectionDown();
					}
				});;
			});
		</script>

		
	</body>
</html>
