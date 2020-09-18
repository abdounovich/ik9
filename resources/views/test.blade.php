<!DOCTYPE html>
<html>

<body>
    <style type="text/css">
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 50%;
            margin: 25%;
        }
    </style>
<form id="myForm" method="POST" action="/test2">
    @csrf




    
    message <input type="text" name="message"><br>
   <input type="hidden" id="id" name="id"><br>

    <input type="button" onclick="sendMessage()" value="Submit form">
  </form>

    <script type="text/javascript">
        function sendMessage() {
            document.getElementById("myForm").submit();

        
            MessengerExtensions.requestCloseBrowser(function success() {
            window.location.replace("https://www.messenger.com/closeWindow/?image_url=https://scontent-mrs2-1.xx.fbcdn.net/v/t39.2081-6/c0.0.76.76a/p75x75/851578_455087414601994_1601110696_n.png?_nc_cat=1&_nc_sid=eaa83b&_nc_ohc=hLP1X0haog0AX-20AX5&_nc_ht=scontent-mrs2-1.xx&oh=34d8b052619a32417f8503522f5287ad&oe=5F8965A9&display_text=textjjjjjjjj");

            }, function error(err) {

            });
        }

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.com/en_US/messenger.Extensions.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "Messenger"));

        window.extAsyncInit = function () {
            // the Messenger Extensions JS SDK is done loading
            MessengerExtensions.getUserID(function success(uids) {
                var psid = uids.psid;//This is your page scoped sender_id
                document.getElementById("id").value =psid;

            }, function error(err) {
                alert("Messenger Extension Error: " + err);
            });
        };
    </script>
</body>
</html>