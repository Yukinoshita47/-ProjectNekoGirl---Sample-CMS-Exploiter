	<center>
	<form>
<body>
<style>
html,body { 
                background: url(<? print $bg; ?>) no-repeat center center fixed; 
                -webkit-background-size: 100% 100%;
                -moz-background-size: 100% 100%;
                -o-background-size: 100% 100%;
                background-size: 100% 100%;
            }
</style>

	<meta http-equiv='content-type' content='text/html;charset=utf-8' />
	<meta name='generator' content='Geany 1.22' />
	<script type='text/javascript' src='jquery.js'></script>
	<div id='container'>
		<title>Exploiter- <? print $tt; ?></title>
		<link rel="shortcut icon" href="<? print $titit; ?>">
		<br/>
		<h1><b><font color="red">C</font><font color="blue">S</font><font color="gold">R</font><font color="indigo">F</font></b></h1>
		<h2><b><font color="<? print $trz; ?>">Exploiter - By Lyonc</font></b></h2>
		<br/>
		<br/>
		<b><font color="red">Enter Site Url</font></b>
		<br/>
		<input type="text" class="str" placeholder="Enter Site Url" size="30" id="str" required="required">
		<br/>
		<b><font color="red">Post Name</font></b>
		<br/>
		<select class="ztr" id="ztr">
		<option value="Filedata" selected="selected">Filedata</option>
		<option value="uploadfile">uploadfile</option>
		<option value="qqfile">qqfile</option>
		<option value="files[]">files[]</option>
		<option value="upload-file">upload-file</option>
		<option value="file">file</option>
		<option value="files">files</option>
		<option value="filename">filename</option>
		<option value="data">data</option>
		<option value="userfile">userfile</option>
		<option value="userfiles">userfiles</option>
		<option value="imgfile">imgfile</option>
		<option value="datafile">datafile</option>
		<option value="datafiles">datafiles</option>
		</select>
		<br/>
		<b><font color="red">Open Target</font></b>
		<br/>
		<select class="tgr" id="tgr">
		<option value="" selected="selected">This Tab</option>
		<option value="_blank">New Tab</option>
		</select>
		<br/>
		<input type="button" id="tbl-dekrip" name="tbl-dekrip" value="NEXT"/><br/>
	<div id='result-bar'>
		<span class='hasil'></span>
	</div>
	</div>
	<!-- manipulasi AJAX -->
	<script>
		$(document).ready(function(){
		$('#tbl-dekrip').click(function(){
			var string = $('.str').val();
			var timex = $('.ztr').val();
			var trgt = $('.tgr').val();
			$('.hasil').html('<br/><img src="loader.gif">');
			$('.hasil').load('starting.php?str='+string+'&ztr='+timex+'&tgr='+trgt);
			});
		});
	</script>
	<!-- Akhir manipulasi AJAX -->
