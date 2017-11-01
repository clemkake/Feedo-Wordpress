<?php
$current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
global $wpdb;

if(empty($_POST)){
}
else{
    if(isset($_POST['ID'])){
	    $id =$_POST['ID'];
    }
    if(isset($_POST['DESCRIPTION'])){
	    $description = $_POST['DESCRIPTION'];
    }
    if(isset($_POST['AVAILIBILITY'])){
	    $availibility =$_POST['AVAILIBILITY'];
    }
    if(isset($_POST['CONDITION'])){
	    $condition = $_POST['CONDITION'];
    }
    if(isset($_POST['GPC'])){
	    $gpc = $_POST['GPC'];
    }

	$wpdb->update(
		$wpdb->prefix.'Feedosetting',
		array(
			'date'         => current_time( 'mysql' ),
			'pr_Description'  => $description,
			'pr_Availibility' => $availibility,
			'Gpc_value'    => $gpc,
			'pr_condition'    => $condition,
		),
		array( 'id' => 1 ),
		array(
			'%d',	// date
			'%s',	// description
			'%s',	// availibility
			'%s',	// gpc_value
			'%s'	// condition
		),
		array( '%d' )
	);
}

?>



<br xmlns="http://www.w3.org/1999/html">
<br>
<br>
<br>

<form class="form-box" action="<?php echo $current_url;  ?>" enctype="multipart/form-data" method="POST" >

<main>

	<input id="tab1" type="radio" name="tabs" checked>
	<label for="tab1">Basic Settings</label>

	<input id="tab2" type="radio" name="tabs">
	<label for="tab2">G P C</label>

	<input id="tab3" type="radio" name="tabs">
	<label for="tab3">Feed Link</label>


	<section id="content1">
        <?php
		$attr_array = ['ID','DESCRIPTION','AVAILIBILITY','CONDITION'];
         for ($i=0;$i<sizeof($attr_array);$i++){
         	?>
             <div>
                 <input type="hidden" name="<?php print_r($attr_array[$i])?>" value="<?php lcfirst(print_r($attr_array[$i]));?>">
                 <p> <label> <?php print_r($attr_array[$i])?> </label> <select> <option value="">none</option>
	        <option name="<?php print_r($attr_array[$i])?>" value="<?php print_r($attr_array[$i])?>"><?php print_r($attr_array[$i])?></option> </select> </p>
		    </div>
        <?php
         }
		?>
	</section>

	<section id="content2">

		<?php
		$myFile = plugin_dir_path( __FILE__ )."taxonomy.txt";
		$lines = file($myFile);
		unset($lines[0]); // we don't need this line
		unset($lines[1]); // we don't need this line

		foreach($lines as $line)
		{
			$var = explode('-', $line, 2);
			$arr[$var[0]] = $var[1];
		}
		?>
		<p> <label> Google Product Category </label>
            <input type="hidden" name="GPC" value="">

            <select class="selector"> <option value="">none</option>
				<?php
		foreach ($arr as $key => $value) {?>

			<option class="selector" name="GPC" value="<?php echo "{$key}"; ?>"><?php echo trim($value); ?></option>

			<?php
		}
		?>
			</select>
	</section>

	<section id="content3">
        <a href="<?php echo get_site_url().'/wp-content/plugins/Feedo/feedo_feed.php'; ?>" target="_blank"> Feed name </a>
	</section>

</main>
<center>	<button type="submit" class="button">Save Changes </button>  </center>

</form>

<br>
<br>
<br>
<center>	build by <b>REGALIX</b>  </center>
