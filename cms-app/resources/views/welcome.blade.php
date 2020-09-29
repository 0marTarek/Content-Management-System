@extends('layouts.app')
@section('styleCheet')
 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.css">  
   <link rel="stylesheet" href="css/main.css">

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
@endsection

@section('script')
   <!-- script
   ================================================== -->
  	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>
@endsection

@section('content')
<style>
	body{
		font-size:15px;
	}
	html
	{
		font-family: sans-serif;
		line-height: 1.15;
		-webkit-text-size-adjust: 100%;	
		color: #212529;
		text-align: left;
		font-size: 0.9rem;
	}
	a:visited
	{
		color:#001
	}
	</style>
   <div class="search-wrap">
	
	<form role="search" method="get" class="search-form" action="#">
		<label>
			<span class="hide-content">Search for:</span>
			<input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="s" title="Search for:" autocomplete="off">
		</label>
		<input type="submit" class="search-submit" value="Search">
	</form>
	<a href="#" id="close-search" class="close-btn">Close</a>
</div> <!-- end search wrap -->	

<div class="triggers">
	<a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
	<a class="menu-toggle" href="#"><span>Menu</span></a>
</div> <!-- end triggers -->	


   <!-- masonry
   ================================================== -->
   <section id="bricks">

   	<div class="masonry">

   		<!-- brick-wrapper -->
         <div class="bricks-wrapper">

         	<div class="grid-sizer"></div>

         	<div class="brick entry featured-grid animate-this">
         		<div class="entry-content">
         			<div id="featured-post-slider" class="flexslider">
			   			<ul class="slides">
					@foreach($posts as $post)
					<li>
						<div class="featured-post-slide">
							<div class="post-background" style="background-image:url({{asset('storage/' . $post->image)}});"></div>
							<div class="overlay"></div>
							<div class="post-content">
								<ul class="entry-meta">
										<li>{{$post->created_at}}</li> 
										<li><a href="#" >{{ $post->user->name }}</a></li>				
									</ul>	
								<h1 class="slide-title"><a href="single-standard.html" title="">{{$post->Title}}</a></h1> 
							</div> 				   					  	
						</div>
					</li> <!-- /slide -->
					@endforeach

				   		</ul> <!-- end slides -->
				   	</div> <!-- end featured-post-slider -->        			
         		</div> <!-- end entry content -->         		
         	</div>
    @foreach($posts as $post) 
		<article class="brick entry format-standard animate-this">
			<div class="entry-thumb">
				<a href="{{ route('showPost', $post->id) }}" class="thumb-link">
					<img src="{{asset('storage/'.$post->image)}}" >                   
				</a>
			</div>
			<div class="entry-text">
				<div class="entry-header">

					<div class="entry-meta">
						<span class="cat-links">
							<a href="#">{{$post->category->name}}</a>             			
						</span>			
					</div>

					<h1 class="entry-title"><a href="single-standard.html">{{$post->Title}}</a></h1>
					
				</div>
					<div class="entry-excerpt">
					{{$post->Description}}
					</div>
			</div>

	</article> <!-- end article -->


    @endforeach
 

         </div> <!-- end brick-wrapper --> 

   	</div> <!-- end row -->

   	<div class="row">
   		
   		<nav class="pagination">
		      <span class="page-numbers prev inactive">Prev</span>
		   	<span class="page-numbers current">1</span>
		   	<a href="#" class="page-numbers">2</a>
		      <a href="#" class="page-numbers">3</a>
		      <a href="#" class="page-numbers">4</a>
		      <a href="#" class="page-numbers">5</a>
		      <a href="#" class="page-numbers">6</a>
		      <a href="#" class="page-numbers">7</a>
		      <a href="#" class="page-numbers">8</a>
		      <a href="#" class="page-numbers">9</a>
		   	<a href="#" class="page-numbers next">Next</a>
	      </nav>

   	</div>

   </section> <!-- end bricks -->

   
   <!-- footer
   ================================================== -->
   <footer>

   	<div class="footer-main">

   		<div class="row">  

	      	<div class="col-four tab-full mob-full footer-info">            

	            <h4>About Our Site</h4>

	               <p>
		          	Lorem ipsum Ut velit dolor Ut labore id fugiat in ut fugiat nostrud qui in dolore commodo eu magna Duis cillum dolor officia esse mollit proident Excepteur exercitation nulla. Lorem ipsum In reprehenderit commodo aliqua irure labore.
		          	</p>

		      </div> <!-- end footer-info -->

	      	<div class="col-two tab-1-3 mob-1-2 site-links">

	      		<h4>Site Links</h4>

	      		<ul>
	      			<li><a href="#">About Us</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>

	      	</div> <!-- end site-links -->  

	      	<div class="col-two tab-1-3 mob-1-2 social-links">

	      		<h4>Social</h4>

	      		<ul>
	      			<li><a href="#">Twitter</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Dribbble</a></li>
						<li><a href="#">Google+</a></li>
						<li><a href="#">Instagram</a></li>
					</ul>
	      	           	
	      	</div> <!-- end social links --> 

	      	<div class="col-four tab-1-3 mob-full footer-subscribe">

	      		<h4>Subscribe</h4>

	      		<p>Keep yourself updated. Subscribe to our newsletter.</p>

	      		<div class="subscribe-form">
	      	
	      			<form id="mc-form" class="group" novalidate="true">

							<input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Type &amp; press enter" required=""> 
	   		
			   			<input type="submit" name="subscribe" >
		   	
		   				<label for="mc-email" class="subscribe-message"></label>
			
						</form>

	      		</div>	      		
	      	           	
	      	</div> <!-- end subscribe -->         

	      </div> <!-- end row -->

   	</div> <!-- end footer-main -->

      <div class="footer-bottom">
      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright Abstract 2016</span> 
		         	<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>		         	
		         </div>

		         <div id="go-top">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
		         </div>         
	      	</div>

      	</div> 
      </div> <!-- end footer-bottom -->  

   </footer>  

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/jquery.appear.js"></script>
   <script src="js/main.js"></script>

@endsection