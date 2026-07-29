<html>
<head>
<title>gallery</title>
<style>
*{margin: 0; padding: 0;}
body
{
background: white;
font-family: 'Segoe UI', Arial, sans-serif;
}
.container
{
width: 90%;
height: 100%;
padding-bottom: 50px;
align-items: center;;
box-shadow:7px 10px 10px 7px rgba(0,0,0,.1);
border-radius: 5px;
position: relative;
}
.trans
{
transition: all 1s ease;
-moz-transition: all 1s ease;
-ms-transition: all 1s ease;
-o-transition: all 1s ease;
-webkit-transition: all 1s ease;
}
.top
{
display: flex;
width: 80vw;
height: 80vh;
margin-top: 10vh;
margin-left: auto;
margin-right: auto;
margin-bottom: 10vh;
}
.top ul
{
list-style: none;
width: 100%;
height: 100%;
z-index: 1;
box-sizing: border-box;
padding-bottom:20px;
}
.top ul li
{
position: relative;
float: left;
width: 24%;
height: 25%;
overflow: hidden;
align-items:center;
padding:3px;
}
.top ul li::before
{
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
content: center;
color: white;
opacity: 0.4;
text-align: center;
box-sizing: border-box;
pointer-events: none;
transition: all 0.5s ease;
-moz-transition: all 0.5s ease;
-ms-transition: all 0.5s ease;
-o-transition: all 0.5s ease;
-webkit-transition: all 0.5s ease;
}
.top ul li:hover::before
{
opacity: 50;
background-color: black;
}
.top ul li img
{
width: 100%;
height: auto;
overflow: hidden;
padding : 5px;
}
.lightbox
{
position: fixed;
width: 100%;
height: 100%;
text-align: center;
top: 0;
left: 0;
background-color: rgba(0,0,0,0.75);
z-index: 999;
opacity: 0;
pointer-events: none;
}
.lightbox img
{
max-width: 90%;
max-height: 80%;
position: relative;
top: -100%;
/* Transition */
transition: all 1s ease;
-moz-transition: all 1s ease;
-ms-transition: all 1s ease;
-o-transition: all 1s ease;
-webkit-transition: all 1s ease;
}
.lightbox:target
{
outline: none;
top: 0;
opacity: 1;
pointer-events: auto;
transition: all 1.2s ease;
-moz-transition: all 1.2s ease;
-ms-transition: all 1.2s ease;
-o-transition: all 1.2s ease;
-webkit-transition: all 1.2s ease;
}
.lightbox:target img
{
top: 0;
top: 50%;
transform: translateY(-50%);
-moz-transform: translateY(-50%);
-ms-transform: translateY(-50%);
-o-transform: translateY(-50%);
-webkit-transform: translateY(-50%);
}

.gallary a{
color: #e23845;
text-align :center;
padding:0;
}
.lab a{
color: #000000;
text-align :center;
padding-bottom:20px;
}
.republic a{
color: #000000;
text-align :center;
padding-bottom:20px;
}
.picnic a{
color: #000000;
text-align :center;
padding-bottom:20px;
}
.farewell a{
color: #000000;
text-align :center;
padding-bottom:20px;
}
.fresher a{
color: #000000;
text-align :center;
padding-bottom:20px;
}

.btn_back{
  background-color:white;
   width: 10%;
   border-radius: 5px;
   padding:10px 30px;
   display: block;
   text-align: center;
   cursor: pointer;
   font-size: 20px;
   margin-top: 10px;
   border: none;
   box-shadow:3px 5px 5px 3px rgba(0,0,0,.1);
 }
.btn_back:hover{
background-color:grey;
 }
</style>
</head>
<body>
<div class="back">
 <input type="button" value="< Home" class="btn_back" onclick="goBack()">
<div class="gallary">
<a href="#">
<h1>GALLARY</h1></a></div>
<center>
<div class="container">
<div class="top">
<ul>
<div class="lab">
<a href="#">
<h2>PU Campus</h2></a></div><br>
<li><a href="#img_1"><img src="images\pucampus1.jpg"></a></li>
<li><a href="#img_2"><img src="images\puadmin.jpg"></a></li>
<li><a href="#img_3"><img src="images\puvisit1.jpg"></a></li>
<li><a href="#img_4"><img src="images\pucampus2.jpg"></a></li>
<li><a href="#img_13"><img src="images\pu11.jpg"></a></li>
<li><a href="#img_14"><img src="images\pu12.jpg"></a></li>
<li><a href="#img15"><img src="images\pu14.jpg"></a></li>
<li><a href="#img_16"><img src="images\pu16.jpg"></a></li><br><br><br><br>
<div class="republic">
<a href="#">
<br><br><br><br><h2>Events</h2></a></div><br>
<li><a href="#img_5"><img src="images\pu5.jpg"></a></li>
<li><a href="#img_6"><img src="images\pu6.jpg"></a></li>
<li><a href="#img_7"><img src="images\pu7.jpg"></a></li>
<li><a href="#img_8"><img src="images\pu8.jpg"></a></li>
<div class="farewell">
<a href="#">
<br><br><br><br><br><br><br><h2>PU Fest</h2></a></div><br>
<li><a href="#img_9"><img src="images\pu1.jpg"></a></li>
<li><a href="#img_10"><img src="images\pu10.jpeg"></a></li>
<li><a href="#img_11"><img src="images\pu3.jpg"></a></li>
<li><a href="#img_12"><img src="images\pu4.jpg"></a></li>
<div class="fresher">
<a href="#">
<br><br><br><br><br><h2>Freshers Fest</h2></a></div><br>
<li><a href="#img_29"><img src="images\pu2.jpg"></a></li>
<li><a href="#img_30"><img src="images\pu18.jpg"></a></li>
<li><a href="#img_31"><img src="images\pu19.jpg"></a></li>
<li><a href="#img_32"><img src="images\pu20.jpg"></a></li>
</ul>

<a href="#_1" class="lightbox trans" id="img_1"><img src="images\pucampus1.jpg"></a>
<a href="#_2" class="lightbox trans" id="img_2"><img src="images\puadmin.jpg"></a>
<a href="#_3" class="lightbox trans" id="img_3"><img src="images\puvisit1.jpg"></a>
<a href="#_4" class="lightbox trans" id="img_4"><img src="images\pucampus2.jpg"></a>
<a href="#_13" class="lightbox trans" id="img_13"><img src="images\pu11.jpg"></a>
<a href="#_14" class="lightbox trans" id="img_14"><img src="images\pu12.jpg"></a>
<a href="#_15" class="lightbox trans" id="img_15"><img src="images\pu14.jpg"></a>
<a href="#_16" class="lightbox trans" id="img_16"><img src="images\pu16.jpg"></a>

<a href="#_5" class="lightbox trans" id="img_5"><img src="images\pu5.jpg"></a>
<a href="#_6" class="lightbox trans" id="img_6"><img src="images\pu6.jpg"></a>
<a href="#_7" class="lightbox trans" id="img_7"><img src="images\pu7.jpg"></a>
<a href="#_8" class="lightbox trans" id="img_8"><img src="images\pu8.jpg"></a>

<a href="#_9" class="lightbox trans" id="img_9"><img src="images\pu1.jpg"></a>
<a href="#_10" class="lightbox trans" id="img_10"><img src="images\pu10.jpeg"></a>
<a href="#_11" class="lightbox trans" id="img_11"><img src="images\pu3.jpg"></a>
<a href="#_12" class="lightbox trans" id="img_12"><img src="images\pu4.jpg"></a>

<a href="#_29" class="lightbox trans" id="img_29"><img src="images\pu2.jpg"></a>
<a href="#_30" class="lightbox trans" id="img_30"><img src="images\pu18.jpg"></a>
<a href="#_31" class="lightbox trans" id="img_31"><img src="images\pu19.jpg"></a>
<a href="#_32" class="lightbox trans" id="img_32"><img src="images\pu20.jpg"></a>

</div>
</center>
<script>
    function goBack() {
      if (window.history.length > 1) {
        window.history.back(); // Goes to the last visited page
      } else {
        // Optional: if there's no history, go to a default page
        window.location.href = "index.php";
      }
    }
  </script>
</body>
</html>
