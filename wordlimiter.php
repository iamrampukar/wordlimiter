<?php 
/*
By: Ram Pukar Chaudhary
Date: 2015-06-27
*/
function words_limiter($text, $limit, $ellipsis = true) {
    $words = preg_split("/[\n\r\t ]+/", $text, $limit + 1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_OFFSET_CAPTURE);
    if (count($words) > $limit) {
        end($words); //ignore last element since it contains the rest of the string
        $last_word = prev($words);
        $ellip = ($ellipsis==true) ? '...': '';   
        $text =  substr($text, 0, $last_word[1] + strlen($last_word[0])) . $ellip;
    }
    return $text;
}
?>
<strong>Example:</strong><br/>
<?php 
	$getText="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
	echo words_limiter($getText,14,true);
 ?>
 <hr/>
 <?php 
	echo '<meta  charset="utf-8"/>';
    $getText="काठमाडौं– राष्ट्रिय विपत व्यवस्थापन, अनुगमन तथा निर्देशन विशेष समितिले भग्नावशेषमा पुरिएर वा अन्य कारणले उद्धार हुन नसकेका बेपत्ता नागरिकका परिवारलाई पनि मृत घोषित गरिएका परिवारसरह राहत उपलब्ध गराउन सरकारलाई।";
	echo words_limiter($getText,14,true);
 ?>