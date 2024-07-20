<?php

use App\Models\Address;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\ArticleGroup;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\CreditNote;
use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\Department;
use App\Models\Estimate;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\getpermission;
use App\Models\Goal;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\ItemGroup;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use App\Models\Note;
use App\Models\Payment;
use App\Models\PaymentMode;
use App\Models\PredefinedReply;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Reminder;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Task;
use App\Models\TaxRate;
use App\Models\Ticket;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Stripe\Stripe;

/**
 * @return int
 */


 //send mail  here


 function  char_length($text   ,  $characters){
    $string =  $text;
$maxLength = $characters;
if(strlen($string) > $maxLength) {
    $limitedString = substr($string, 0, $maxLength) . "..."; // Add dots if string is longer
} else {
    $limitedString = $string;
}
return $limitedString; // Output: "This is a..."
}



 function sendEmail($viewlocation  , $array =  [],  $to  ,  $subject  , $from     )
{

    $message = 'This is a test email message.';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Cutrico <$from>" . "\r\n";

    // Render the Blade template
    $bladeView = view($viewlocation   ,  $array)->render();

    // Send email using mail() function

    try{
    $mailSent = mail($to, $subject, $bladeView, $headers);

    if ($mailSent) {
        return "Email sent successfully";
    } else {
        return "Email sending failed";
    }

    }catch(\Exception $e){

    }


}

 function  permission_count($id  ,  $permission_id){

    $per   = getpermission::where( [[ 'model_id'  , $id]   ,  ["permission_id", $permission_id]] )->count();

    return  $per  ;

 }


  function   upload_files($file){

    if(isset($file)) {

        $targetDirectory = "uploads/";  // Directory where you want to store the uploaded files
        $targetFile = $targetDirectory . basename($file["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is a valid file
        //if(isset($_POST["submit"])) {
            $check = getimagesize($file["tmp_name"]);
            if($check !== false) {
                //echo("<h1> hello</h1>");
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
       // }

        // Check if the file already exists
        if (file_exists($targetFile)) {
            // echo "Sorry, the file already exists.";
            //$uploadOk = 0;
        }

        // Check file size (optional)
        if ($file["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            //$uploadOk = 0;
        }

        // Allow only specific file formats (optional)
        $allowedFormats = array("jpg", "png", "jpeg", "gif");
        if (!in_array($fileType, $allowedFormats)) {
            //echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            //$uploadOk = 0;
        }

        // If everything is okay, try to upload the file
        if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {


            return  ($file["name"]);

            //die();

            } else {
            //  echo "Sorry, there was an error uploading your file.";
            }
        }


    }
            return "";

    }



function getLoggedInUserId()
{
    return Auth::id();
}

/**
 * @return User
 */
function getLoggedInUser()
{
    return Auth::user();
}

/**
 * @return string
 */
function generateUniqueProposalNumber()
{
    return Proposal::generateUniqueProposalId();
}

/**
 * @return string
 */
function generateUniqueInvoiceNumber()
{
    return Invoice::generateUniqueInvoiceId();
}


function generateUniqueTicketNumber()
{
    return Ticket::generateUniqueTicketId();
}

/**
 * @return string
 */
function generateUniqueEstimateNumber()
{
    return Estimate::generateUniqueEstimateId();
}

/**
 * @return string
 */
function generateUniqueCreditNoteNumber()
{
    return CreditNote::generateUniqueCreditNoteId();
}

/**
 * @param  array  $tags
 * @param  Invoice  $owner
 * @return bool
 */
function attachTags($tags, $owner)
{
    $owner->tags()->sync($tags);

    return true;
}

/**
 * @param $number
 * @return float
 */
function formatNumber($number)
{
    return round((double) str_replace(',', '', $number), 2);
}

/**
 * @param $number
 * @return string|string[]
 */
function removeCommaFromNumbers($number)
{
    return (gettype($number) == 'string' && ! empty($number)) ? str_replace(',', '', $number) : $number;
}

/**
 * @param $phone
 * @return string|string[]
 */
function removeSpaceFromPhoneNumber($phone)
{
    return (gettype($phone) == 'string' && ! empty($phone)) ? str_replace(' ', '', $phone) : $phone;
}

/**
 * return avatar url.
 *
 * @return string
 */
function getAvatarUrl()
{
    return 'https://ui-avatars.com/api/';
}

/**
 * return avatar full url.
 *
 * @param  int  $userId
 * @param  string  $name
 * @return string
 */

function getUserImageInitial($userId, $name)
{
    return getAvatarUrl()."?name=$name&size=100&rounded=true&color=fff&background=".getRandomColor($userId);
}

/**
 * return random color.
 *
 * @param  int  $userId
 * @return string
 */
function getRandomColor($userId)
{
    $colors = ['329af0', 'fc6369', 'ffaa2e', '42c9af', '7d68f0'];
    $index = $userId % 5;

    return $colors[$index];
}

/**
 * @param  string|null  $currency
 * @return string
 */
function getCurrencyClass($currency = null)
{
    static $defaultCurrency;

    if (empty($defaultCurrency)) {
        if (! $currency) {
            $defaultCurrency = Setting::where('key', 'current_currency')->first()->value;
        }
    }

    switch ($defaultCurrency) {
        case 'inr':
            return 'fas fa-rupee-sign';
        case 'aud':
            return 'fas fa-dollar-sign';
        case 'usd':
            return 'fas fa-dollar-sign';
        case 'eur':
            return 'fas fa-euro-sign';
        case 'jpy':
            return 'fas fa-yen-sign';
        case 'gbp':
            return 'fas fa-pound-sign';
        case 'cad':
            return 'fas fa-dollar-sign';
        default:
            return 'fas fa-dollar-sign';

    }
}

/**
 * @param  string|null  $currency
 * @return string
 */
function getCurrencyClassFromIndex($currency)
{
    switch ($currency) {
        case 0:
            return 'fas fa-euro-sign';
           // return 'fas fa-rupee-sign';
        case 1:
            return 'fas fa-euro-sign';
            //return 'fas fa-dollar-sign';
        case 2:
            return 'fas fa-euro-sign';
            //return 'fas fa-dollar-sign';
        case 3:
            return 'fas fa-euro-sign';
        case 4:
            return 'fas fa-euro-sign';
            //return 'fas fa-yen-sign';
        case 5:
            return 'fas fa-euro-sign';
            //return 'fas fa-pound-sign';
        case 6:
            return 'fas fa-euro-sign';
            //return 'fas fa-dollar-sign';
        default:
            return 'fas fa-euro-sign';
            //return 'fas fa-dollar-sign';

    }
}

/**
 * @return mixed
 */
function getCurrentCurrency()
{
    static $currentCurrency;

    if (empty($currentCurrency)) {
        $currentCurrency = Setting::where('key', 'current_currency')->first()->value;
    }

    return $currentCurrency;
}

/**
 * @param  string  $currentCurrency
 * @return int
 */
function getCurrentCurrencyIndex($currentCurrency)
{
    return array_search(strtoupper($currentCurrency), Customer::CURRENCIES);
}

/**
 * @return mixed
 */
function getAppFavicon()
{
    static $settingValue;

    if (empty($settingValue)) {
        $settingValue = Setting::where('key', 'favicon')->value('value');
    }

    return $settingValue;
}

/**
 * @return mixed
 */
function getAppLogo()
{
    static $settingValue;

    if (empty($settingValue)) {
        $settingValue = Setting::where('key', 'logo')->value('value');
    }

    return $settingValue;
}

/**
 * @return mixed
 */
function getAppName()
{
    static $settingValue;

    if (empty($settingValue)) {
        $settingValue = Setting::where('key', 'company_name')->value('value');
    }

    return $settingValue;
}

/**
 * @return mixed
 */
function getWebsiteName()
{
    static $settingValue;

    if (empty($settingValue)) {
        $settingValue = Setting::where('key', 'website')->value('value');
    }

    return $settingValue;
}

/**
 * @return mixed
 */
function getDefaultCountryCode()
{
    static $defaultCountryCode;

    if (empty($defaultCountryCode)) {
        $defaultCountryCode = Setting::where('key', 'default_country_code')->value('value');
    }

    return $defaultCountryCode;
}

/**
 * @param  array  $input
 * @param  string  $key
 * @return string|null
 */
function preparePhoneNumber($input, $key)
{
    return (! empty($input[$key])) ? '+'.$input['prefix_code'].$input[$key] : null;
}

/**
 * @param  string|null  $currency
 * @return string
 */
function getCurrencyForPDF($currency = null)
{
    static $currencyForPDF;

    if (empty($currencyForPDF)) {
        if (! $currency) {
            $currency = Setting::where('key', 'current_currency')->first()->value;
        }
    }

    switch ($currency) {
        case 'inr':
            return 8377;
        case 'aud':
            return 36;
        case 'usd':
            return 36;
        case 'eur':
            return 8364;
        case 'jpy':
            return 165;
        case 'gbp':
            return 163;
        case 'cad':
            return 36;
    }
}

/**
 * @return string
 */
function getArticleDefaultImage()
{
    return asset('img/article/default-img.jpg');
}

/**
 * @param $url
 * @return string
 */
function mediaUrlEndsWith($url)
{
    if (substr($url, -strlen('pdf')) === 'pdf') {
        return asset('img/attachments_img/pdf.png');
    } elseif (substr($url, -strlen('doc')) === 'doc' || substr($url, -strlen('docx')) === 'docx') {
        return asset('img/attachments_img/doc.png');
    } elseif (substr($url, -strlen('xlsx')) === 'xlsx') {
        return asset('img/attachments_img/xlsx_icon.png');
    } elseif (substr($url, -strlen('csv')) === 'csv') {
        return asset('img/attachments_img/csv.png');
    } elseif (substr($url, -strlen('zip')) === 'zip') {
        return asset('img/attachments_img/zip_icon.png');
    } else {
        return $url;
    }
}

/**
 * @param $count
 * @return int
 */
function totalCountForDashboard($count): int
{
    if (empty($count)) {
        return 1;
    }

    return $count;
}

/**
 * @param  string  $datetime
 * @param  bool  $full
 * @return string
 *
 * @throws Exception
 */
function timeElapsedString($datetime, $full = false): string
{
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = [
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k.' '.$v.($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (! $full) {
        $string = array_slice($string, 0, 1);
    }

    return $string ? implode(', ', $string).' ago' : 'just now';
}

/**
 * @param $key
 * @return int|string
 */
function getCurrencyIcon($key): int|string
{
    switch ($key) {
        case 0:
            return 8377;
        case 1:
        case 2:
        case 6:
            return 36;
        case 3:
            return 8364;
        case 4:
            return 165;
        case 5:
            return 163;
        default:
            return 8377;
    }
}

/**
 * @param  int  $id
 * @return mixed
 */
function getAddressOfCustomer($id): mixed
{
    $address = Address::where('owner_id', '=', $id)->where('owner_type', '=', Customer::class)->where('type',  'Billing Address')->get();

    return $address;
}

function setStripeApiKey()
{
    Stripe::setApiKey(config('services.stripe.secret_key'));
}

/**
 * @param $model
 * @return string
 */
function activityLogIcon($model): string
{
    if ($model == CustomerGroup::class) {
        return 'fas fa-people-arrows';
    } elseif ($model == Customer::class) {
        return 'fas fa-street-view';
    } elseif ($model == User::class) {
        return 'fas fa-user';
    } elseif ($model == ArticleGroup::class) {
        return 'fas fa-edit';
    } elseif ($model == Article::class) {
        return 'fab fa-autoprefixer';
    } elseif ($model == Tag::class) {
        return 'fas fa-tags';
    } elseif ($model == LeadStatus::class) {
        return 'fas fa-blender-phone';
    } elseif ($model == LeadSource::class) {
        return 'fas fa-globe';
    } elseif ($model == Lead::class) {
        return 'fas fa-tty';
    } elseif ($model == Project::class) {
        return 'fas fa-layer-group';
    } elseif ($model == Task::class) {
        return 'fas fa-tasks';
    } elseif ($model == TicketPriority::class) {
        return 'fas fa-sticky-note';
    } elseif ($model == TicketStatus::class) {
        return 'fas fa-info-circle';
    } elseif ($model == PredefinedReply::class) {
        return 'fas fa-reply';
    } elseif ($model == Ticket::class) {
        return 'fas fa-ticket-alt';
    } elseif ($model == Invoice::class) {
        return 'fas fa-file-invoice';
    } elseif ($model == CreditNote::class) {
        return 'fas fa-clipboard';
    } elseif ($model == Proposal::class) {
        return 'fas fa-scroll';
    } elseif ($model == Estimate::class) {
        return 'fas fa-calculator';
    } elseif ($model == Payment::class) {
        return 'fas fa-money-check-alt';
    } elseif ($model == Department::class) {
        return 'fas fa-columns';
    } elseif ($model == ExpenseCategory::class) {
        return 'fas fa-list-ol';
    } elseif ($model == Expense::class) {
        return 'fab fa-erlang';
    } elseif ($model == PaymentMode::class) {
        return 'fab fa-product-hunt';
    } elseif ($model == TaxRate::class) {
        return 'fas fa-percent';
    } elseif ($model == Announcement::class) {
        return 'fas fa-bullhorn';
    } elseif ($model == Item::class) {
        return 'fas fa-sitemap';
    } elseif ($model == ItemGroup::class) {
        return 'fas fa-object-group';
    } elseif ($model == ContractType::class) {
        return 'fas fa-file-contract';
    } elseif ($model == Contract::class) {
        return 'fas fa-file-signature';
    } elseif ($model == Goal::class) {
        return 'fas fa-bullseye';
    } elseif ($model == Service::class) {
        return 'fab fa-stripe-s';
    } elseif ($model == Reminder::class) {
        return 'fas fa-bell';
    } elseif ($model == Note::class) {
        return 'fas fa-sticky-note';
    } elseif ($model == Comment::class) {
        return 'fas fa-comment';
    } elseif ($model == Contact::class) {
        return 'fas fa-user';
    }
    return '';
}

/**
 * @return array
 */
function getLanguages(): array
{
    $languages = File::directories(base_path().'/lang');
    $languagesArr = file_get_contents(storage_path('languages.json'));
    $languagesArr = json_decode($languagesArr, true);
    $allLanguagesArr = [];
    foreach ($languages as $language) {
        $lanCode = substr($language, -2);
        if (isset($languagesArr[$lanCode])) {
            $allLanguagesArr[$lanCode] = $languagesArr[$lanCode]['name'].'('.$languagesArr[$lanCode]['nativeName'].')' ?? $language;
        } else {
            $allLanguagesArr[$lanCode] = Str::camel($lanCode);
        }
    }

    return $allLanguagesArr;
}

/**
 * @param $language
 * @return mixed
 */
function setLanguage($language): mixed
{
    $languagesArr = file_get_contents(storage_path('languages.json'));
    $languagesArr = json_decode($languagesArr, true);
    if (isset($languagesArr[$language])) {
        $setLanguage = $languagesArr[$language]['name'] ?? $language;
    } else {
        $setLanguage = Str::camel($language);
    }

    return $setLanguage;
}

function version()
{
    $composerFile = file_get_contents('../composer.json');
    $composerData = json_decode($composerFile, true);
    $currentVersion = $composerData['version'];

    return $currentVersion;
}

if (! function_exists('ticketReplyRedirectUrl')) {
    function ticketReplyRedirectUrl($ticketID): string
    {
        if (getLoggedInUser()->hasRole('client')) {
            return route('client.tickets.show', $ticketID);
        } else {
            return route('ticket.show', $ticketID);
        }
    }
}
function country_script($country_tab , $locality_id){ ?>
            <script>

            $(document).ready(function() {

                // AJAX request to fetch localities based on the selected country
                $('#<?php echo $country_tab; ?>').change(function() {
                    //var country = $(this).val();
                    var country = $(this).find('option:selected').text();
                    //alert(country);

                    $.ajax({
                    url: '/get_localities',
                    type: 'GET',
                    data: { country: country },
                    dataType: 'json',
                    success: function(response) {
                        // Clear the locality dropdown
                        $('#<?php echo $locality_id ; ?>').empty();

                        // Populate the locality dropdown with options
                        $.each(response, function(index, locality) {
                        $('#<?php echo $locality_id ; ?>').append('<option value="' + locality + '">' + locality + '</option>');
                        });
                    }
                    });
                }); });

            </script>

<?php } ?>
