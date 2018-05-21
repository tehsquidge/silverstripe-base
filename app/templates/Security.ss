<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login to $SiteConfig.Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<style type="text/css">
body{ font-family:sans-serif;}
fieldset{ border:0;}
#SecurityForm { min-height: 100vh; min-width: 100vw; display: flex; flex-direction: column; justify-content: center; align-items: center; /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#4096ee+0,4096ee+100;Blue+Flat+%232 */
background: #4096ee; /* Old browsers */
background: -moz-linear-gradient(top, #4096ee 0%, #4096ee 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #4096ee 0%,#4096ee 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #4096ee 0%,#4096ee 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4096ee', endColorstr='#4096ee',GradientType=0 ); /* IE6-9 */ }
#SecurityForm a, #SecurityForm label { color: #fff; }
#SecurityForm .field { display: flex; justify-content: flex-end; align-items: center; width: 21rem;margin: 0 auto 1rem;}
#SecurityForm h1 { color: #FFF; text-transform: uppercase; }
#SecurityForm .btn-toolbar { text-align: center; }
#SecurityForm label.left { margin-right: 1rem; }
#SecurityForm .message { color: #FFF; }
#SecurityForm .message.bad { background: red; }
</style>

<div id="SecurityForm">
<h1>$Title</h1>
$Form
</div>

</body>
</html>
