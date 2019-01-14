<?php 
    $logo_img = 'app/static/img/pokphand.png';
    $url = Yii::app()->getBaseUrl(true);
    if (@$isPreview) {
        $user = [
            'name' => 'Vendor A',
            'username' => 'v01',
            'password' => '12345678'
        ];
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INVOICE TRACKING - Username and Password</title>
    <style>
        body {
    		background: #F8F8F8;
			text-align: center;
    		font-size: 14px;
    		font-family: 'Serif', Arial;
    		-webkit-font-smoothing: antialiased;
    		background-color: rgb(251,251,251);
	    }
	    
	    .left {
            display: inline-block;
            float: left;
            margin-right: 17px;
            padding-right: 17px;
	    }
	    
	    .border {
            border-right: 1px solid #9E9E9E;
	    }
	    
	    .head {
	        margin-top: 10px;
            line-height: 10%;
	    }
	    
	    .footer {
	        text-align: left;
    		font-family: 'Serif', Arial;
    		-webkit-font-smoothing: antialiased;
    		background-color: rgb(251,251,251);
    		max-width: 700px;
    		margin: auto;
    		color: #888;
    		padding-left: 10px;
	    }
	    
	    p.big {
            line-height: 150%;
        }
	    
	    .footer>.title {
	        font-size: 12px;
	    }
	    
	    .footer>.content {
	        font-size: 10px;
	    }
	    
		.container {
			max-width: 750px;
			text-align: left;
			border-top: solid 5px #388e3c;
			background-color: rgb(251,251,251);
		}
		
		.container >. content {
			width: 100%;
			margin: auto;
		}
		
		.container > .content > .header {
			width: 100%;
			padding-bottom: 10px;
		}
		
		.bottom {
	        padding-bottom: 10px;    
	    }
		
		#rcorners1 {
			border-radius: 25px;
			background-color: #73AD21;
			padding: 20px; 
			width: 200px;
			height: 150px;    
		}

		.main-content {
			border-radius: 5px;
			border: 1px solid #c9c9c8;
			background-color: white;
			padding: 10px; 
			width: 100%-10px;
			height: auto;    
			text-align: center;
		}
		
		.main-content > .sub-content {
			text-align: left;
		}
		
		a {
		    text-align: center;
		}
		
		.jadwal {
	        padding: 0px 0px 0px 25px;
	        width: 100%;
	        text-align: left;
	    }
	    
	    .jadwal > tr:first-child > td {
	        padding-bottom: 10px;
	    }
	    
	    td #kiri {
	       width: 50px;    
	    }
	    
		.link_button {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            border: solid 1px rgb(162,0,0);
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
            -webkit-box-shadow: inset 0 1px 0 rgb(162,0,0), 0 1px 1px rgb(162,0,0);
            -moz-box-shadow: inset 0 1px 0 rgb(162,0,0), 0 1px 1px rgb(162,0,0);
            box-shadow: inset 0 1px 0 rgb(162,0,0), 0 1px 1px rgb(162,0,0);
            background: rgb(162,0,0);
            color: #FFF;
            padding: 8px 12px;
            text-decoration: none;
            text-align: center;
            width: 200px;
        }
    </style>
</head>
<?php $urlHeader = $this->url($logo_img); ?>
<body>
    <div class="container">
	    <div class="content">
	        <div class="header">
    			<div class="left"><img src="<?= $urlHeader ?>" height="50px"></div>
    			<div class="left border head"><h2>INVOICE TRACKING</h2></div>
    			<div class="left head"><h2>PT CHAROEN POKPHAND INDONESIA</h2></div>
    		</div>
    		
    		<div class="main-content" style="clear: left;">
    		    <p class="sub-content big" style="text-align: right;">
    		        Sidoarjo, <?= date('d F Y') ?>
		        </p>
    			<p class="sub-content big" style="text-align: justify;">
    			    Dear <?= $user['name'] ?>, <br>
    			</p>
    			<p class="sub-content" style="text-align: justify; line-height: 20px;">
    			    You have been registered in <b>INVOICE TRACKING</b> application by <b>PT CHAROEN POKPHAND INDONESIA</b>. Here is your Username and Password:
    			</p>
    			<table class="jadwal">
                    <tr>
                        <td style="width: 50px;"> Username </td>
                        <td style="text-align: center;"> : </td>
                        <td> <?= $user['username'] ?> </td>
                    </tr>
                    <tr>
                        <td style="width: 50px;"> Password </td>
                        <td style="text-align: center;"> : </td>
                        <td> <?= $user['password'] ?> </td>
                    </tr>
                </table>
    			<p class="sub-content" style="text-align: justify; line-height: 20px;">
    			    Please login on <a href="<?= $url ?>" target="_blank">this link</a> using Username and Password above. Thank you.
    			</p>
    			<div style="text-align: right; padding: 10px 0 10px 10px;">
    		        Regards,<br><br>
    		        Admin
    		    </div>
    		</div>
    		
    		<div class="left" style="margin-top: 5px;">
        	    <div class="footer">
                    <div class="title"><b>Head Office</b></div>
                    <div class="content">
                        PT Charoen Pokphand Indonesia Tbk<br>
                        Jl. Ancol VIII/1<br>
                        Jakarta 14430<br>
                        Indonesia<br><br>
                        
                        P. 62-21-6919999<br>
                        F. 62-21-6907324<br><br>
                        
                        E. investor.relations@cp.co.id<br>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</body>
</html>