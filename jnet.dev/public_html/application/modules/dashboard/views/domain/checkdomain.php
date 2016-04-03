<?php
require('AvailabilityService.php');
require('whoisClass.php');
$service = new HelgeSverre\DomainAvailability\AvailabilityService(true);
$domain = $_POST['domain'];

$tach = explode(".",$domain);
$select =  ($tach[0]);
$select_ex = ($tach[1]);
$ex = array(".net",".com",".biz",".org");

$testDomains = array(
    $domain,
    
);
foreach ($ex as $e) {
    if(".".$select_ex != $e) {
        array_push($testDomains,$select.$e);
    }
}




$i = 0;
foreach ($testDomains as $domain) {
    $available = $service->isAvailable($domain);
    $i++;
    if ($available) {
        ?>
        <p class="availabledomain alert alert-success">
                <span class="pull-left">
                    <?=$domain?> (Available)
                </span>
                <span class="pull-right" id="cart-button-<?=$i?>">
                     <a href="javascript:" onclick="return addCart('<?=$domain?>','<?=$i?>');"  title="Add <?=$domain?>" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </span>
                <span class="clearfix"></span>
                </p>
                
       <?php 
    } else {
        ?>
        
        <p class="alert alert-warning"><img height="16" width="16" src='http://www.google.com/s2/favicons?domain=<?=$domain?>' /> <?=$domain?> is registered. (<a href="whois.php?domain=<?=$domain?>" onClick="return popup(this, 'Whois Domain')">Whois</a>)</p>
        <?php 
        
        
	// echo $whois->whoislookup($domain);	
    }
}
