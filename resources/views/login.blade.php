<html>
<head> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script></head>
<body>
<style>
body {
  background-color: #FFE4E1;
  color: white;
  font-family: "Asap", sans-serif;
}
.container-fluid {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateY(-50%) translateX(-50%);
  width: 100%;
}
@media (max-width: 530px) {
  .container-fluid {
    left: 0;
    margin: 10px 0;
    position: relative;
    top: 0;
    transform: none;
  }
}

.submit {
  overflow: hidden;
  background-color: white;
  padding: 40px 30px 30px 30px;
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
  -moz-transition: -moz-transform 300ms, box-shadow 300ms;
  transition: transform 300ms, box-shadow 300ms;
  box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
}
.submit::before, .login::after {
  content: "";
  position: absolute;
  width: 600px;
  height: 600px;
  border-top-left-radius: 40%;
  border-top-right-radius: 45%;
  border-bottom-left-radius: 35%;
  border-bottom-right-radius: 40%;
  z-index: -1;
}
.submit::before {
  left: 40%;
  bottom: -130%;
  background-color: rgba(69, 105, 144, 0.15);
  -webkit-animation: wawes 6s infinite linear;
  -moz-animation: wawes 6s infinite linear;
  animation: wawes 6s infinite linear;
}
.submit::after {
  left: 35%;
  bottom: -125%;
  background-color: rgba(2, 128, 144, 0.2);
  -webkit-animation: wawes 7s infinite;
  -moz-animation: wawes 7s infinite;
  animation: wawes 7s infinite;
}
.submit > input,select {
  font-family: "Asap", sans-serif;
  display: block;
  border-radius: 5px;
  font-size: 16px;
  background: white;
  width: 100%;
  border: 0;
  padding: 10px 10px;
  margin: 15px -10px;
}
.submit > button {
  font-family: "Asap", sans-serif;
  cursor: pointer;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  width: 80px;
  border: 0;
  padding: 10px 0;
  margin-top: 10px;
  margin-left: -5px;
  border-radius: 5px;
  background-color: #f45b69;
  -webkit-transition: background-color 300ms;
  -moz-transition: background-color 300ms;
  transition: background-color 300ms;
}
.submit > button:hover {
  background-color: #f24353;
}

@-webkit-keyframes wawes {
  from {
    -webkit-transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-moz-keyframes wawes {
  from {
    -moz-transform: rotate(0);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}
@keyframes wawes {
  from {
    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    -ms-transform: rotate(0);
    -o-transform: rotate(0);
    transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
a {
  text-decoration: none;
  color: rgba(255, 255, 255, 0.6);
  position: absolute;
  right: 10px;
  bottom: 10px;
  font-size: 12px;
}
@media (max-width: 530px) {
  .col-xs-6 {
    width: 100%;
  }
}
</style>
<div class="container-fluid">
    <form name="myform" id="myform" class="submit" onsubmit="return validate()">
        <input type="text"  id="username"  name="username" placeholder="Username">
        <br><span id="em"></span><br>
        <input type="password"  id="password" name="password" placeholder="Password">
        <br><span id="error"></span><br>
        <button type="submit"  id="submit" value="submit">Login</button>
    </form>
</div>
</body>
 <script>
function validate(){
  var u = document.myform.username.value;
  var p = document.myform.password.value;
  var e = document.getElementById("em");
  var r = document.getElementById("error");
  var atposition =  u.indexOf("@");
  var dotposition = u.lastIndexOf(".");
  if(u == "" || p == ""){
    r.textContent = "*Please fill these fields";
     r.style.color = "red";
      return false;
  }

  if( atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= m.length){
    e.textContent = "*Please enter the valid email address";
     e.style.color = "red";
      return false;
  }

  if(p.length < 6){
    r.textContent = "*Password mudt be atleast 6 characters";
     r.style.color = "red";
      return false;
  }
}
 </script>

   <script>
jQuery(document).ready(function($) {
  console.log("zcss");
    $('#submit').on('click', function(evt) {

        evt.preventDefault();
        var serialized = $('#myform').serialize();
        //console.log(serialized);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/api/login',
                datatype: 'json',
                data: serialized,

                success: function(data) {
                    function not1() {

                        if (data.statuscode == '201')
                        {
                          alert("check login credentials");

                        }



                    }

                    not1();

                    if (data.statuscode == '200')
                    {

                        window.location.href = "/admin/view";
                    }

                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });

    });
});
</script>
   <script>

</html>