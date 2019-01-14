
.default-content-panel {
background-color: rgba(255, 255, 255, 0.8);
margin:30px 15px 0px 15px;
padding:20px;
}
body {
background-color: #f5f5f5;
background-image:url('app/static/img/bg.png');
background-repeat: repeat; 
background-attachment: fixed;    
background-position: bottom;
background-size: 30%;
}
#content > div > .stretch {
top: 0px !important;
}
/* The side navigation menu */
.sidenav {
height: 100%; /* 100% Full-height */
width: 0; /* 0 width - change this with JavaScript */
position: fixed; /* Stay in place */
z-index: 6; /* Stay on top */
top: 0; /* Stay at the top */
left: 0;
background-color: #111; /* Black*/
overflow-x: hidden; /* Disable horizontal scroll */
padding-top: 60px; /* Place content 60px from the top */
transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
padding: 8px 8px 8px 32px;
text-decoration: none;
font-size: 25px;
color: #818181;
display: block;
transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
position: absolute;
top: 0;
right: 25px;
font-size: 36px;
margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
transition: margin-left .5s;
padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
.sidenav {padding-top: 15px;}
.sidenav a {font-size: 18px;}
}

#sidebar-btn{
display:inline-block;
vertical-align: middle;
width:20px;
height:15px;
cursor:pointer;
margin:20px;
position:absolute;
top:0px;
left:0px;

display: inline-block;
text-transform: uppercase;
text-decoration: none;
/* letter-spacing: 5px; */
color: #FAFAFA;
padding: 33px;

transform: translate(-50%, -50%);
-webkit-transform: translate(-50%, -50%);
-moz-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
-o-transform: translate(-50%, -50%);
background: rgba(0,0,0,0.5);
@include fade-transition(background);

&:hover {
background: rgba(8,97,76,0.6);
}
}


#sidebar-btn i {
/*   positioning */
position: absolute;
opacity: 0;
top: 0;
left: 0;

/*   gradient   */
background: -moz-linear-gradient(left,  rgba(255,255,255,0) 0%, rgba(255,255,255,0.03) 1%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.85) 70%, rgba(255,255,255,0.85) 71%, rgba(255,255,255,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(1%,rgba(255,255,255,0.03)), color-stop(30%,rgba(255,255,255,0.85)), color-stop(50%,rgba(255,255,255,0.85)), color-stop(70%,rgba(255,255,255,0.85)), color-stop(71%,rgba(255,255,255,0.85)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* IE10+ */
background: linear-gradient(to right,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.03) 1%,rgba(255,255,255,0.6) 30%,rgba(255,255,255,0.85) 50%,rgba(255,255,255,0.85) 70%,rgba(255,255,255,0.85) 71%,rgba(255,255,255,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#00ffffff',GradientType=1 ); /* IE6-9 */

/*  forming the shine element
play around with the width, skew and gradient to get different effects
*/
width: 15%;
height: 100%;
transform: skew(-10deg,0deg);
-webkit-transform: skew(-10deg,0deg);
-moz-transform: skew(-10deg,0deg);
-ms-transform: skew(-10deg,0deg);
-o-transform: skew(-10deg,0deg);

/*  animating it  */
animation: move 2s;
animation-iteration-count: infinite;
animation-delay: 1s;
-webkit-animation: move 2s;
-webkit-animation-iteration-count: infinite;
-webkit-animation-delay: 1s;
-moz-transform: skew(-10deg,0deg);
-moz-animation: move 2s;
-moz-animation-iteration-count: infinite;
-moz-animation-delay: 1s;
-ms-transform: skew(-10deg,0deg);
-ms-animation: move 2s;
-ms-animation-iteration-count: infinite;
-ms-animation-delay: 1s;
-o-transform: skew(-10deg,0deg);
-o-animation: move 2s;
-o-animation-iteration-count: infinite;
-o-animation-delay: 1s;
}

/*  */
@keyframes move {
0%  { left: 0; opacity: 0; }
5% {opacity: 0.0}
48% {opacity: 0.2}
80% {opacity: 0.0}
100% { left: 82%}
}

@-webkit-keyframes move {
0%  { left: 0; opacity: 0; }
5% {opacity: 0.0}
48% {opacity: 0.2}
80% {opacity: 0.0}
100% { left: 82%}
}

@-moz-keyframes move {
0%  { left: 0; opacity: 0; }
5% {opacity: 0.0}
48% {opacity: 0.2}
80% {opacity: 0.0}
100% { left: 88%}
}

@-ms-keyframes move {
0%  { left: 0; opacity: 0; }
5% {opacity: 0.0}
48% {opacity: 0.2}
80% {opacity: 0.0}
100% { left: 82%}
}

@-o-keyframes move {
0%  { left: 0; opacity: 0; }
5% {opacity: 0.0}
48% {opacity: 0.2}
80% {opacity: 0.0}
100% { left: 82%}
}