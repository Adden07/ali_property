<?php

use App\Models\Amenity;
use App\Models\PropertyType;

if (!function_exists('get_fulltime')) {

    function get_fulltime($date, $format = 'd, M Y @ h:i a')
    {
        $new_date = new \DateTime($date);
        return $new_date->format($format);
    }
}


if (!function_exists('get_date')) {

    function get_date($date)
    {
        return get_fulltime($date, 'd, M Y');
    }
}


if (!function_exists('get_time')) {

    function get_time($date, $format = 'h:i A')
    {
        $new_date = new \DateTime($date);
        return $new_date->format($format);
    }
}

if (!function_exists('get_price')) {

    function get_price($price)
    {
        return '$ ' . number_format($price, 2);
    }
}

if (!function_exists('currency_symbol')) {

    function currency_symbol()
    {
        return '$ ';
    }
}

if (!function_exists("newCount")) {

    function newCount($array)
    {
        if (is_array($array) || is_object($array)) {
            return count($array);
        } else {
            return 0;
        }
    }
}

if (!function_exists('dummy_image')) {

    function dummy_image($type = null)
    {
        switch ($type) {
            case 'property':
                return asset('frontend_assets/images/property_dummy.jpg');
            case 'user':
                return asset('admin_assets/images/users/user_img.png');
            case 'document':
                return asset('frontend_assets/images/document_upload.png');
            case 'cover':
                return asset('frontend_assets/images/cover.png');
            default:
                return asset('frontend_assets/images/property_dummy.jpg');
        }
    }
}

if (!function_exists('check_file')) {

    function check_file($file = null, $type = null)
    {
        if ($file && $file != '' && file_exists($file)) {
            return asset($file);
        } else {
            return dummy_image($type);
        }
    }
}

if (!function_exists('hashids_encode')) {

    function hashids_encode($str)
    {
        return \Hashids::encode($str);
    }
}

if (!function_exists('hashids_decode')) {

    function hashids_decode($str)
    {
        try {
            return \Hashids::decode($str)[0];
        } catch (Exception $e) {
            return abort(404);
        }
    }
}

if (!function_exists('ticket_priority')) {

    function ticket_priority($ind)
    {
        $arr = array(
            'low' => 'badge-secondary',
            'medium' => 'badge-warning',
            'high' => 'badge-danger',
        );
        return $arr[$ind] ?? 'danger';
    }
}

if (!function_exists('user_type_colors')) {

    function user_type_colors($ind)
    {
        $arr = array(
            'cash_buyer' => 'success',
            'wholesaler' => 'info',
        );

        return $arr[$ind] ?? 'info';
    }
}


if (!function_exists('get_country_list')) {

    function get_country_list()
    {
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote dIvoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        return $countries;
    }
}

if (!function_exists('get_timezone')) {
    function get_timezone($index, $short_name = true)
    {
        $timezones = App\Timezone::whereKey($index)->first();
        if (!$short_name) {
            return $timezones->long_name ?? $index;
        }
        return $timezones->short_name ?? $index;
    }
}


if (!function_exists('get_property_status_color')) {

    function get_property_status_color($ind)
    {
        $arr = array(
            'Recently Added' => 'badge-info',
            'Available' => 'badge-warning',
            'Booked' => 'badge-warning',
            'Sold' => 'badge-success',
            'Deleted'=>'badge-danger'
        );

        return $arr[$ind] ?? 'info';
    }
}


if (!function_exists('get_property_offer_status')) {

    function get_property_offer_status($ind)
    {
        $arr = array(
            'pending' => 'badge-warning',
            'accepted' => 'badge-success',
            'rejected' => 'badge-danger',
            'hold' => 'badge-info',
        );

        return $arr[$ind] ?? 'info';
    }
}

if (!function_exists('get_property_status')) {

    function get_property_status()
    {
        $arr = array(
            'Recently Added',
            'Available',
            'In Negotiation',
            'Sold',
        );

        return $arr;
    }
}

if (!function_exists('since')) {


    function since($timestamp, $level = 6)
    {
        global $lang;
        $date = new DateTime();
        $date->setTimestamp($timestamp);
        $date = $date->diff(new DateTime());
        // build array
        $since = array_combine(array('year', 'month', 'day', 'hour', 'minute', 'second'), explode(',', $date->format('%y,%m,%d,%h,%i,%s')));
        // remove empty date values
        $since = array_filter($since);
        // output only the first x date values
        $since = array_slice($since, 0, $level);
        // build string
        $last_key = key(array_slice($since, -1, 1, true));
        $string = '';
        foreach ($since as $key => $val) {
            // separator
            if ($string) {
                $string .= $key != $last_key ? ', ' : ' ' . $lang['and'] . ' ';
            }
            // set plural
            $key .= $val > 1 ? 's' : '';
            // add date value
            $string .= $val . ' ' . $lang[$key];
        }
        return $string;
    }
}


// if (!function_exists('get_property_types')) {

//     function get_property_types()
//     {
//         $arr = array(
//             'Single Family Residence',
//             'Multi Family Residence',
//             'Commercial',
//             'Land',
//             'Other'

//         );
//         return $arr;
//     }
// }

function getPaginationView()
{
    return 'vendor.pagination.front-pagination';
}



function getPaginationPerPage()
{
    return 15;
}
if (!function_exists('getLnt')) {
    function getLnt($zip){
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false&key=".config('app.map_key');
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);
        return @$result['results'][0]['geometry']['location'];
    }

}

function getAmenitiesView($item, $arr)
{
    if (!$arr) {
        return 'text-danger flaticon-close';
    }
    return in_array($item, $arr) ? 'flaticon-tick' : 'text-danger flaticon-close';
}

function timeSince($distant_timestamp, $max_units = 1) {
    $i = 0;
    $time = time() - $distant_timestamp; // to get the time since that moment
    $tokens = [
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    ];

    $responses = [];
    while ($i < $max_units && $time > 0) {
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) {
                continue;
            }
            $i++;
            $numberOfUnits = floor($time / $unit);

            $responses[] = $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
            $time -= ($unit * $numberOfUnits);
            break;
        }
    }

    if (!empty($responses)) {
        return implode(', ', $responses) . ' ago';
    }

    return 'Just now';
}


if (!function_exists('remove_symbol')) {
    function remove_symbol($string,$symbol){
        return trim(str_replace($symbol,'',$string));
    }

}


if (!function_exists('get_property_order_filters')) {

    function get_property_order_filters()
    {
        $arr = array(
            'price_asc' =>'Price low to high',
            'price_desc'=>'Price high to low',
            'pro_desc'  =>'Newest',
            'pro_asc'   =>'Oldest',
        );
        return $arr;
    }
}

if(!function_exists('api_response')){
    function api_response($status = false, $data = null, $msg = null){
        $data = [
            'status' => $status,
            'data' => $data ?? [],
            'msg' => $msg
        ];
        return response()->json($data, 200);
    }
}


if (!function_exists('get_price')) {
    function get_price($price, $symbol = null)
    {
        // $price = str_replace(',', '', $price);
        return  '$' . number_format($price, 2);
    }
}

if (!function_exists("newCount")) {

    function newCount($array)
    {
        if (is_array($array) || is_object($array)) {
            return count($array);
        } else {
            return 0;
        }
    }
}


if (!function_exists('get_title')) {
    function get_title($str)
    {
        return ucwords(str_replace('_', ' ', $str));
    }
}

if (!function_exists('dummy_image')) {
    function dummy_image($type = null)
    {
        switch ($type) {
            case 'categories':
                return get_asset('admin_assets/images/category_dummy.jpg');
            case 'user':
                return get_asset('frontend_assets/images/dummy_user.png');
            case 'blog':
                return get_asset('frontend_assets/images/dummy_blog.jpg');
            case 'shipment':
                return get_asset('frontend_assets/images/shipment_not_image_not_found.png');
            default:
                return get_asset('no_image.jpg');
        }
    }
}

if (!function_exists('get_asset')) {
    function get_asset($file)
    {
        if (app()->environment() == 'production') {
            return config('app.cdn_url') . $file;
        }
        return asset($file);
    }
}

if (!function_exists('check_file')) {
    function check_file($file = null, $type = null, $diff_type_pic = null)
    {
        if ($file && Storage::has($file)) {
            return get_asset($file);
        } else {
            if($diff_type_pic != null){
                return check_file($diff_type_pic, $type);
            }
            return dummy_image($type);
        }
    }
}

if(!function_exists('get_property_types')){
    function get_property_types($selected=null){

        $types = PropertyType::get();
        $html = '';
        foreach($types->groupBy('type') AS $type){
            $html .= "<optgroup label='".ucwords($type[0]->type)."'>";
            foreach($type AS $property_type){
                
                $html .= "<option value='$property_type->property_type' " . ($selected != null && $selected == $property_type->property_type ? 'selected' : '') . ">" . ucwords($property_type->property_type) . "</option>";
            } 
            $html .= "</option>";
        }
        return $html;
    }
}

if(!function_exists('get_amenities')){
    function get_amenities(){
        return Amenity::get()->pluck('amenity')->toArray();
    }
}