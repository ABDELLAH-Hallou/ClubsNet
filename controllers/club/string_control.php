<?php
function cut_description($description)
{
    if (strlen($description) > 150) {

        // truncate string
        $stringCut = substr($description, 0, 150);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        return $string;
    }
    return $description;
}
?>