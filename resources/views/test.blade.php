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
<form id="myForm" method="post" action="/test2">
    message <input type="text" name="message"><br>
    <input type="button" onclick="sendMessage()" value="Submit form">
  </form>

    <script type="text/javascript">
        function sendMessage() {
            document.getElementById("myForm").submit();

        
         
        }

  
    </script>
</body>
</html>