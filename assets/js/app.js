$(document).ready(function() {

    $itemsref = $('.itemsDisplayed select');
    $sortByref = $('.sortBy select');
    $directionref = $('.sortDirection select');
    $pageNumberref = $('.pageNumber select');

    $('#Sorting').find('select').on('change', function () {
        //get current settings
        $items = $itemsref.val();
        $sortBy = $sortByref.val();
        $direction = $directionref.val();
        $pageNumber = $pageNumberref.val();
        $currentUrl = window.location.href;
        $containsGet = $currentUrl.indexOf('?');

        if ($containsGet === -1){
            $url = $currentUrl;
        }else{
            $url = $currentUrl.substring(0,$currentUrl.indexOf('?'));
        }
        //construct url
        $url = $url + '?' + $items + "&" + $sortBy + "&" + $direction + "&" + $pageNumber;
        window.location.href = $url;

    });

});
