$('document').ready(function(){
				$("#log-form").validate({
				      	rules:
						   {
						   password: {
						   required: true,
						   },
						   username: {
						            required: true,
						            },
						    },
				       	messages:
					    	{
					            password:{
					                      required: "Masukkan Password"
					                     },
					            username: "Masukkan Username",
					       	},
				    	submitHandler: submitForm
			    });

				function submitForm(){
					var data = $('#log-form').serialize();

					$.ajax({
						type : 'POST',
						url  : 'login.php',
						data : data,
						beforeSend : function(){
							$('#error').fadeOut();
							$('#btn-login').attr('value','mengirim data...');
						},
						success :  function(response){
							if (response == "Berhasil") {
								$('#btn-login').attr('value','memasuki halaman..');
								setTimeout('window.location.href = "../index.php";',2000);
							}else{
								$('#error').fadeIn(1000,function(){
									$('#error').html('<b> '+response+'!</b>');
									$('#btn-login').attr('value','login');
								});
							}
						}
					});
					return false;
				}
});