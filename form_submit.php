<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset=UTF-8>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
		<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded',function(){
			
				setupBehavour();
			});
			
			//
			
			function setupBehavour(){
				
				// When a text field's div recieves the focus, shift the focus to the child '<input>' element
				
				let fieldElems = document.querySelectorAll('.form-field');
				
				let txtElems = [...fieldElems].filter(function(x){ return !!x.firstElementChild && x.firstElementChild.localName === 'input'; });
				
				txtElems.forEach(function(x){ x.onfocus = function(){  x.firstElementChild.focus(); }; });
			};
		</script>
		<style>
			:root {
				--width:0;
			}
			
			div {
				box-sizing: border-box;
			}
			
			input {
				outline: none;
				width: 100%;
			}
			
			div, input {
				padding: 0;
				border: 0;
				margin: 0;
			}
			
			.div-top {
				height: 50%;
				background-color: #bbdefb;
			}
			
			.div-bottom {
				height: 50%;
				background-color: #cfd8dc;
				
			}
			
			@keyframes example {
			  0%   {background-color: blue;}
			  1%  {background-color: white;}
			  100% {background-color: blue;}
			}
			
			.form-field {
				outline: none;
				width: 100%;
				height: 100%;
				font-family: "Segoe UI", "Segoe UI Web (West European)", "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
			}
			
			.form-field > .div-button {
				width: 100%;
				height: 100%;
				border: 1px solid #303f9f;
				background-color:#9fa8da;
				border-radius: 2px;
				box-shadow: 0 2px 5px 0 rgb(0 0 0 / 20%), 0 2px 10px 0 rgb(0 0 0 / 10%);
			}
			
			.div-button {
				text-align: center;
				margin: auto;
				display: flex;
				cursor: pointer;
			}
			
			.form-field:not(:active) > .div-button {
				background-color:#3f51b5;
				transition: background-color 0.4s linear;
			}
			
			.form-field > input{
				border-bottom: 1px solid grey;
				box-sizing: border-box;
				padding-left: 3px;
				padding-bottom: 5px;
			}
			
			.form-field > .div-focus {
				width: 0;
				height: 2px;
				background-color: #3f51b5;
				transition: width 0.4s ease-in-out;
			}
			
			.form-field:focus-within > .div-focus {
				width: 100%;
			}
			
			.form-field:focus-within > input {
				border-bottom: 0;
			}
		</style>
	</head>
	<body>
  
		<div>
			<div>
				<form action = "./form_submit.php" method = "POST">
				<p>
				<div style='width: 250px; height: auto;'>
					<div class='form-field' tabindex='0'>
						<input type='text' placeholder='First-Name' name='firstname'></input>
						<div class='div-focus'></div>
					</div>
				</div>
				</p>
				
				<p>
					<div style='width: 250px; height: auto;'>
						<div class='form-field' tabindex='0'>
							<input type='text' placeholder='Last-Name' name='lastname'></input>
							<div class='div-focus'></div>
						</div>
					</div>
				</p>
				
				<p>
					<div style='width: 100px; height: 35px;'>
						<div class='form-field' tabindex='0' onclick='document.querySelector("form").submit()'>
							<div class='div-button'><span style='color: white; font-weight: bold; margin: auto; user-select: none;'>Save</span></div>
						</div>
					</div>
				</p>
				</form>
			</div>
			<div>
				<p>
					 Welcome <?php echo $_POST["firstname"]; ?> </br>  
					Your last name is: <?php echo $_POST["lastname"]; ?>  
				</p>
			</div>
		</div>
	</body>
</html>