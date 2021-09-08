<html>

<head>
    <title>App Name - @yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>


    <script src="https://codefixup.com/demo/multi-step-form/js/jquery.validate.js"></script>      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>    




<style type="text/css">
    


<style type="text/css">
  html {
  height: 100%;
/*
  background-color: #e3e9ee;
*/
}

html, body {
  font-family: 'Source Sans Pro', sans-serif;
  font-size: 14px;
  width: 100%;
}
a {
  color: #d91b5b;
  text-decoration: none;
  font-weight: 600;
  padding-bottom: 3px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}
a:hover {
  border-bottom: 1px solid;
}

.navbar-brand > img{
  max-width:240px; 
}

/* Form styles */
#msform {
  width: 100%;
  margin: 50px auto;
  
  position: relative;
}
#msform fieldset {
  background: #fff;
  border: 0 none;
  border-radius: 5px;
  box-sizing: border-box;
  width: 100%;
  margin: 0 0% 20px;
  
  /*stacking fieldsets above each other*/
  position: relative;
}

/* Hide all except first fieldset */
#msform fieldset:not(:first-of-type) {
  display: none;
}
img.logo {
  max-width: 155px;
  margin-top: 5px;
}
#msform p {
  color: #8b9ab0;
  font-size: 12px;
}

#msform label {
  padding-right:0px 15px;
  font-size: 16px;
  text-align: left;
  
/*
  font-weight:600px !important;
*/
}


/* Inputs */
#msform input, #msform textarea {
  padding: 5px 15px;
  border: 1px solid transparent;
  border-radius: 3px;
  margin-bottom: 10px;
  margin-top: 5px;
  background-color: #eef5ff;
  width: 100%;
  box-sizing: border-box;
  font-family: montserrat;
  color: #333;
  font-size: 14px;
  font-family: inherit;
}
#msform input:focus, #msform textarea:focus {
  outline: none;
  border-color: #7bbdf3;
}

/* Buttons */

#msform .submitbutton {
  width: 30%;
  text-transform: uppercase;
  background: #d91b5b;
  font-weight: bold;
  color: white;
  border: 1px solid transparent;
  border-radius: 3px;
  cursor: pointer;
  padding: 12px 5px;
  margin: 10px 0;
  font-size: 16px;
  display: inline-block;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}

#msform .action-button {
  width: 30%;
  text-transform: uppercase;
  background: #d91b5b;
  font-weight: bold;
  color: white;
  border: 1px solid transparent;
  border-radius: 3px;
  cursor: pointer;
  padding: 12px 5px;
  margin: 10px 0;
  font-size: 16px;
  display: inline-block;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}
#msform .previous.action-button {
  background: #fff;
  border: 1px solid #7bbdf3;
  color: #7bbdf3;
}

#msform .action-button:hover, #msform .action-button:focus {
  box-shadow: 0 10px 30px 1px rgba(0, 0, 0, 0.2);
}

/* Headings */
.fs-title {
  font-size: 20px;
  font-weight: 400;
  color: #a94442;
  margin-bottom: 20px;
  background-color: #9999CC;
  margin-top: 20px;
  padding:5px;
  color:#fff;
}
.fs-subtitle {
  font-weight: 400;
  font-size: 19px;
  color: #434a54;
  margin-bottom: 20px;
}

/* Progressbar */
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
}
#progressbar li {
  list-style-type: none;
  color: #8b9ab0;
  text-transform: uppercase;
  font-size: 9px;
  width: 25%;
  float: left;
  position: relative;
  text-align: center;
}
#progressbar li.active {
  color: #d91b5b;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 10px;
  color: #333;
  background: white;
  border-radius: 3em;
  margin: 0 auto 5px auto;
  text-align: center;
}

/* Progressbar connectors */
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: white;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1;
}
#progressbar li:first-child:after {
  /* connector not needed before the first step */
  content: none; 
}

/* Marking active/completed steps green */
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: #d91b5b;
  color: white;
}

/* css for checkbox */

/* The container */
#msform .checkstyle {
  display: inline-flex;
  position: relative;
  width: auto;
  padding-left: 35px;
  padding-right: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
#msform .checkstyle input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
#msform .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
#msform .checkstyle:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
#msform .checkstyle input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
#msform .checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
#msform .checkstyle input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
#msform .checkstyle .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.terms_text a:hover {
    text-decoration:none !important;
}

.listordercls {
  line-height: 25px !important;
  font-size:13px !important;
  list-style: none !important;
  padding-left:0px !important;
}

/* Header */
header {
  margin: 0;
  padding: 0;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
  z-index: 999;
  border-bottom: 1px solid #00000024;
}
header .navbar {
  margin: 0;
  padding: 0;
  background-color: #fff;
  border-radius: 0px;
}

/* Footer */
footer {
  margin: 0;
  padding: 55px 0 50px;
  float: left;
  width: 100%;
  text-align: center;
}
footer img {
  max-height: 60px;
  margin-bottom: 35px;
}
.footer-img2 {
  margin-left: auto;
  margin-right: auto;
  display: table;
  width: auto;
  float: none;
}
.footer-img3 {
  float: right;
}
footer p {
  margin-bottom: 2px;
  color: #272727;
  font-size: 13px;
}
footer a {
  color: #272727;
  font-size: 13px;
}


@media (max-width:480px){

.navbar-brand > img{
  max-width:180px !important; 
}

#enroltextcls{
  font-size: 14px !important;
}

}

.service-custom{
  border-top: 1px solid ;
  border-bottom: 1px solid;
  width: 78%;
  padding: 15px;
}


.service-custom .hours,.grey-title{
  color: #959595;
}
.checkstyle{
  margin-top: 15px;
}
</style>
</style>
   
</head>

<body>
    @section('sidebar')

    @show

    <div class="container">
        @yield('content')
    </div>

</body>



<script type="text/javascript">
  

    $(function () {
        $("#postaliddiv").click(function () {
            if ($(this).is(":checked")) {
                $("#showpostaladssdiv").show();
               
            } else {
                $("#showpostaladssdiv").hide();
            }
        });
    });

</script>
    <style>

.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('img/Spinner.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .5;
}

.error
{
color:red !important;
font-size: 15px !important;
}

.form-group.required .control-label:after {
  content:"*";
  color:red;
}
</style>

<script>

 $(window).on('load', function () 
 {
     
      
     $("input", "#step2").addClass("ignore"); // do not validate #form2 input
     $("input", "#step3").addClass("ignore"); // do not validate #form2 input
     $("input", "#step4").addClass("ignore"); // do not validate #form2 input
     
 });


var _0xa9fc=["\x2E\x69\x67\x6E\x6F\x72\x65","\x72\x65\x71\x75\x69\x72\x65\x64","\x73\x68\x6F\x77","\x23\x6C\x6F\x61\x64\x69\x6E\x67\x6D\x65\x73\x73\x61\x67\x65","\x66\x6F\x72\x6D\x73\x75\x62\x6D\x69\x74\x61\x6A\x61\x78\x2E\x70\x68\x70","\x50\x4F\x53\x54","\x73\x75\x63\x63\x65\x73\x73","\x68\x69\x64\x65","\x23\x73\x75\x63\x65\x73\x73\x6D\x73\x67","\x65\x72\x72\x6F\x72","\x23\x65\x72\x72\x6F\x72\x6D\x73\x67","\x61\x6A\x61\x78","\x73\x63\x72\x6F\x6C\x6C\x54\x6F","\x76\x61\x6C\x69\x64\x61\x74\x65","\x23\x6D\x73\x66\x6F\x72\x6D","\x70\x61\x72\x65\x6E\x74","\x6E\x65\x78\x74","\x66\x6F\x72\x6D","\x69\x67\x6E\x6F\x72\x65","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x69\x6E\x70\x75\x74","\x23\x73\x74\x65\x70\x32","\x61\x63\x74\x69\x76\x65","\x61\x64\x64\x43\x6C\x61\x73\x73","\x69\x6E\x64\x65\x78","\x66\x69\x65\x6C\x64\x73\x65\x74","\x65\x71","\x23\x70\x72\x6F\x67\x72\x65\x73\x73\x62\x61\x72\x20\x6C\x69","\x23\x73\x74\x65\x70\x31","\x63\x6C\x69\x63\x6B","\x23\x73\x74\x65\x70\x6F\x6E\x65","\x70\x72\x65\x76","\x23\x70\x72\x65\x76\x69\x6F\x75\x73\x31","\x23\x73\x74\x65\x70\x33","\x23\x73\x74\x65\x70\x74\x77\x6F","\x23\x70\x72\x65\x76\x69\x6F\x75\x73\x32","\x23\x73\x74\x65\x70\x34","\x23\x73\x74\x65\x70\x74\x68\x72\x65\x65","\x23\x70\x72\x65\x76\x69\x6F\x75\x73\x33","\x3A\x63\x68\x65\x63\x6B\x65\x64","\x69\x73","\x23\x74\x65\x72\x6D\x73\x63\x6C\x73","\x70\x72\x6F\x70","\x23\x74\x65\x6D\x73\x61\x6E\x64\x63\x6F\x6E\x64\x65\x72\x72\x6F\x72","\x6F\x6E","\x23\x73\x74\x65\x70\x66\x6F\x75\x72","\x72\x65\x61\x64\x79"];jQuery()[_0xa9fc[46]](function(){var _0xb70ex1=jQuery(_0xa9fc[14])[_0xa9fc[13]]({ignore:_0xa9fc[0],rules:{firstname:_0xa9fc[1],lastname:_0xa9fc[1],'\x67\x65\x6E\x64\x65\x72':{required:true},address:_0xa9fc[1],mobilenumber:_0xa9fc[1],email:_0xa9fc[1],postalcode:_0xa9fc[1],cityname:_0xa9fc[1]},submitHandler:function(_0xb70ex2){var _0xb70ex3= new FormData(_0xb70ex2);$(_0xa9fc[3])[_0xa9fc[2]]();$[_0xa9fc[11]]({url:_0xa9fc[4],type:_0xa9fc[5],data:_0xb70ex3,contentType:false,cache:false,processData:false,success:function(_0xb70ex4){if(_0xb70ex4== _0xa9fc[6]){$(_0xa9fc[3])[_0xa9fc[7]]();$(_0xa9fc[8])[_0xa9fc[2]]()};if(_0xb70ex4== _0xa9fc[9]){$(_0xa9fc[3])[_0xa9fc[7]]();$(_0xa9fc[10])[_0xa9fc[2]]()}},error:function(){}})},highlight:function(_0xb70ex5,_0xb70ex6){window[_0xa9fc[12]](0,0)},unhighlight:function(_0xb70ex5,_0xb70ex6){}});$(_0xa9fc[30])[_0xa9fc[29]](function(){current_fs= $(this)[_0xa9fc[15]]();next_fs= $(this)[_0xa9fc[15]]()[_0xa9fc[16]]();if(_0xb70ex1[_0xa9fc[17]]()){$(_0xa9fc[20],_0xa9fc[21])[_0xa9fc[19]](_0xa9fc[18]);$(_0xa9fc[27])[_0xa9fc[26]]($(_0xa9fc[25])[_0xa9fc[24]](next_fs))[_0xa9fc[23]](_0xa9fc[22]);$(_0xa9fc[28])[_0xa9fc[7]]();$(_0xa9fc[21])[_0xa9fc[2]]();window[_0xa9fc[12]](0,0)}});$(_0xa9fc[32])[_0xa9fc[29]](function(){$(_0xa9fc[20],_0xa9fc[21])[_0xa9fc[23]](_0xa9fc[18]);current_fs= $(this)[_0xa9fc[15]]();previous_fs= $(this)[_0xa9fc[15]]()[_0xa9fc[31]]();$(_0xa9fc[27])[_0xa9fc[26]]($(_0xa9fc[25])[_0xa9fc[24]](current_fs))[_0xa9fc[19]](_0xa9fc[22]);$(_0xa9fc[21])[_0xa9fc[7]]();$(_0xa9fc[28])[_0xa9fc[2]]();window[_0xa9fc[12]](0,0)});$(_0xa9fc[34])[_0xa9fc[29]](function(){current_fs= $(this)[_0xa9fc[15]]();next_fs= $(this)[_0xa9fc[15]]()[_0xa9fc[16]]();if(_0xb70ex1[_0xa9fc[17]]()){$(_0xa9fc[20],_0xa9fc[33])[_0xa9fc[19]](_0xa9fc[18]);$(_0xa9fc[27])[_0xa9fc[26]]($(_0xa9fc[25])[_0xa9fc[24]](next_fs))[_0xa9fc[23]](_0xa9fc[22]);$(_0xa9fc[21])[_0xa9fc[7]]();$(_0xa9fc[33])[_0xa9fc[2]]();window[_0xa9fc[12]](0,0)}});$(_0xa9fc[35])[_0xa9fc[29]](function(){$(_0xa9fc[20],_0xa9fc[33])[_0xa9fc[23]](_0xa9fc[18]);current_fs= $(this)[_0xa9fc[15]]();previous_fs= $(this)[_0xa9fc[15]]()[_0xa9fc[31]]();$(_0xa9fc[27])[_0xa9fc[26]]($(_0xa9fc[25])[_0xa9fc[24]](current_fs))[_0xa9fc[19]](_0xa9fc[22]);$(_0xa9fc[33])[_0xa9fc[7]]();$(_0xa9fc[21])[_0xa9fc[2]]();window[_0xa9fc[12]](0,0)});$(_0xa9fc[37])[_0xa9fc[29]](function(){current_fs= $(this)[_0xa9fc[15]]();next_fs= $(this)[_0xa9fc[15]]()[_0xa9fc[16]]();if(_0xb70ex1[_0xa9fc[17]]()){$(_0xa9fc[20],_0xa9fc[36])[_0xa9fc[19]](_0xa9fc[18]);$(_0xa9fc[27])[_0xa9fc[26]]($(_0xa9fc[25])[_0xa9fc[24]](next_fs))[_0xa9fc[23]](_0xa9fc[22]);$(_0xa9fc[33])[_0xa9fc[7]]();$(_0xa9fc[36])[_0xa9fc[2]]();window[_0xa9fc[12]](0,0)}});$(_0xa9fc[38])[_0xa9fc[29]](function(){$(_0xa9fc[20],_0xa9fc[36])[_0xa9fc[23]](_0xa9fc[18]);current_fs= $(this)[_0xa9fc[15]]();previous_fs= $(this)[_0xa9fc[15]]()[_0xa9fc[31]]();$(_0xa9fc[27])[_0xa9fc[26]]($(_0xa9fc[25])[_0xa9fc[24]](current_fs))[_0xa9fc[19]](_0xa9fc[22]);$(_0xa9fc[36])[_0xa9fc[7]]();$(_0xa9fc[33])[_0xa9fc[2]]();window[_0xa9fc[12]](0,0)});})
</script> 

<script>

           $("#stepone").click(function()
    {

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();  
  
    if (v.form())
      {
      
      $("input","#step2").removeClass("ignore");
      
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
      $('#step1').hide();
      $('#step2').show(); 
      window.scrollTo(0, 0);
      }

    });

    $("#previous1").click(function()
    {
      
      $("input","#step2").addClass("ignore");
      
      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();
      
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
      $('#step2').hide();
      $('#step1').show(); 
      window.scrollTo(0, 0);
    });




        var v = jQuery("#msform").validate({
   ignore: ".ignore", 
      rules: {
 firstname: "required",
 lastname: "required",
            'gender': {
 required: true
 },
            address: "required",
            mobilenumber: "required",
            email: "required",
            postalcode: "required",
            cityname: "required",
                        postalcode: "required",

        },
        submitHandler: function(form) 
        { 
 

   $.ajax({
          url: "/contact-form",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            service_id:$('input[name="service_id"]:checked').val(),
            selected_date:$('input[name="selected_date"]').val(),
            name:$('input[name="name"]').val(),
            business_id:$('input[name="business_id"]').val(),
            slug:$('input[name="slug"]').val(),
            
            email:$('input[name="email"]').val()
          },
          success:function(response){
            if (response.success == true) {
                $("#step4").css("display", "block");
                $("#step3").css("display", "none");

                $(".enquiry_email").text($('input[name="email"]').val());
                $(".enquiry_date").text($('input[name="selected_date"]').val());

            }else{
                alert("bo9");

            }
          },
         });


 
 //return false;  //This doesn't prevent the form from submitting.
 },
 highlight: function(element, errorClass) {
 
 window.scrollTo(0, 0);
 
 },
 unhighlight: function(element, errorClass) {
 //$(element).closest(".form-group").removeClass("has-error");
 },
    });
</script>



</html>
