		// parse url detect uid
		var url_string = window.location.href;
		var url = new URL(url_string);
		var uid = url.searchParams.get("uid");

		var widthBrowser = window.innerWidth;
		var w = document.getElementById("landing-main").offsetWidth;
		if (widthBrowser>660) {
			var h = w*1.42;
		} else {
			var h = w*1.91;
		}
		var h2= h+'px';
		document.getElementById("landing-main").style.minheight = h2;

		// typing efect on overlay
		$(function(){
		    $('.landing-main').trigger('click');
		});
		
		var i = 0;
		var txt = '"Dialah yang menciptakan kamu dari jiwa yang satu (Adam) dan daripadanya Dia menciptakan pasangannya agar dia cenderung dan merasa tenteram kepadanya..."(QS Al-A`raf: 189)';
		var speed = 50;

		function typeWriter() {
		  if (i < txt.length) {
		    document.getElementById("demo").innerHTML += txt.charAt(i);
		    i++;
		    setTimeout(typeWriter, speed);
		  }else{
		  	$("#Audio").show();
		  }
		 
		}

		// trigger audio on
		var x = document.getElementById("audio");
			function playAudio() { 
			  x.play();
			}


		
		$(document).ready(function(){
			$.ajax({
				url:"../admin/query/fetch_tamu_2.php",  
		        method:"POST",  
		        data:{uid:uid},  
		        dataType:"json",  
		        success:function(data){
		        	if(data === "undefined"){
		        		$("#preload").css("display", "block");
		        		$("#preload").html("<div class='overlay__inner'><div class='overlay__content'><div class='notfound'><div class='notfound-404 animate fadeIn one'><h1>404</h1></div><h2 class='animate fadeInDown two'>Maaf, halaman ini tidak tersedia</h2><p class='animate fadeInDown three'>Tautan yang Anda ikuti mungkin rusak atau telah dihapus.<br><a href='https://www.google.com/'>Kembali ke halaman utama</a></p><div class='notfound-social animate fadeInDown four'><a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a><a href='#'><i class='fa fa-pinterest'></i></a><a href='#'><i class='fa fa-instagram'></i></a><br><span class='animate fadeInDown five'>Source form freepik.com & colorlib.com</span></div></div></div></div>");
		        		var imageUrl ="src/img/28faf6993de4841588887606918bed96.jpg";
                		$(".overlay").css("background-image", "url(" + imageUrl + ")");
		        	}else{
		        		// var namaLengkap = data.callname+" "+data.nama;
		        		$("#tamu").html(data.nama);
		        		var result = data.undangan.split(';');
		        		var keys = Object.keys(result);
						if (keys.length > 1 || result[0]=='kirim kabar') {
							$("#event").html('WALIMATUL URS');	
						}else{
							$("#event").html(result[0]);
						}
		        		
		        	}            
		        }
			});

			$("#Audio").click(function(){
				$("#preload").fadeOut('slow');
				$("#cover").fadeIn(5000);
			});
			$("#view").on("click", function() {
				$.ajax({  
				    url:"../admin/query/view_undangan_2a.php",  
				    method:"POST",  
				    data:{uid:uid},  
				    success:function(data){ 
				        $("#view_undangan").html(data);
				        $("#view_undangan").fadeIn(3000);
				        $("#cover").fadeOut('slow');
				        $("#back").fadeIn(5000);
					
				        // $("#view_undangan").css("display", "block");
				        // $("#cover").css("display", "none");
				    } 
				});
			});

			$("#back").click(function(){
			  $("#view_undangan").fadeOut('slow');
			  $("#back").fadeOut('slow');
			  $("#cover").fadeIn('slow');
			});



		});