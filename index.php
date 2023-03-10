
<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>load data</title>
<style type="text/css">
	*{
		padding: 0;
		margin: 0;
		color: #000;
		text-decoration: none;
		box-sizing: border-box;
		font-family: Montserrat;
	}
	.container{
		margin: 0 200px;
	}

/* text css	*/
	.text-light{
		color: #fff !important;
	}

	.text-bold{
		font-weight: bold;
	}

	.text-center{
		text-align: center;
	}

	.display-1{
		font-size: 35px;
	}

/* element width css */
	.col-6{
		width: 50%;
	}



/* flex css */
	.row{
		display: flex;
		flex-wrap: nowrap;
	}

	.d-flex{
		display: flex;
	}

	.d-block{
		display: block;
	}
	.align-item-center{
		align-items: center;
	}

	.justify-content-end{
		justify-content: flex-end;
	}


	.btn{
		display: inline-block;
		padding: 10px 15px;
		border-radius: 20px;
	}

/* background css */
	.bg-sky-blue{
		background-color: #47afe7;
	}

	.btn-orange{
		background-color: #f49c63;
	}

	.bg-light{
		background-color: #fff;
	}
	.bg-sky-light{
		background-color: #d2e6f9;
	}


/* margin css*/

.mt-5{
	margin-top: 50px !important;
}

.mb-2{
	margin-bottom: 20px;
}

/*padding css*/

.py-1{
	padding: 10px 0;
}

.p-1{
	padding: 10px;
}


.data-details>.item{
	border-radius: 20px;
	background-color: #6dcf8c;
	overflow: hidden;
	box-shadow: 0 5px 2px -1px #1d0e0e45;
}
.number{
	width: 5%;
	justify-content: center;
	align-items: center;
	font-size: 40px;
	font-weight: bolder;
}

.details{
	width: 95%;
}

.details>div{
	font-size: 20px;
}
</style>

</head>
<body class="bg-sky-blue">
	<section class="data mt-5">
		<div class="container">
			<div class="row align-item-center mb-2">
				<div class="col-6"><h1 class="text-light text-bold display-1">PEOPLE DATA</h1></div>
				<div class="col-6 d-flex justify-content-end next"> <a  href="#" id="btn" data-start="0" data-end="3" class="btn btn-orange text-light text-bold text-center">NEXT PERSON</a></div>
			</div>

			<div class="data-details" id="data-details">
				
			</div>
			<div class="text-center text-light text-bold">CURRENTLY <span id="total_data" class="text-light">3</span> PEOPLE SHOWING</div>
		</div>
	</section>

<script src="jquery.js"></script>

      <script>

		$(document).ready(function() {

			$.getJSON('json/data.json', function(data) {
                //   $('#main').html('<p> Name: ' + jd[0].name + '</p>');
				var jd = '';
				var a = 0;
				$.each(data, function (key, value) {
					jd += '<div class="row mb-2 item"><div class="number row"><span class="text-light d-block">'+ ++a +'</span></div><div class="details w-100"><div class="name p-1 bg-sky-light"><p>Name: <span>'+ value.name +'</span></p></div><div class="location p-1 bg-light"><p>Location: <span>'+ value.location +'</span></p></div></div></div>';
				});

				$('#data-details').html(jd);
				var y = 3;
				var number_of_items = $('.item').length;

                $('#data-details .item').hide().slice(0,3).show();
                
                $("#btn").on('click', function (e) {
                    e.preventDefault();
					let shownSubs = $('.item').filter((_,e) => e.style.display == 'none');
					if(shownSubs.length != 0){
						$(".item:hidden").slice(0, y).slideDown();
						let shownSubs = $('.item').filter((_,e) => e.style.display == 'none');
						var total = number_of_items - shownSubs.length;
						$('#total_data').html(total);
					}
                    else{
                        alert('no more people');
                    }
                    // console.log(shownSubs.length);  
                });
           
				

			});

			
			   
				
        });
      </script>
</body>
</html>